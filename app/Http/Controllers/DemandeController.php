<?php

namespace App\Http\Controllers;

use App\Mail\DemandeRapport;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\URL;
use App\Models\{Country, State};
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Offre;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;





class DemandeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data['countries'] = Country::get(["name", "id"]);
        return view('backend/demande/ccreate', $data, compact('user'));
    }

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'Dadress' => 'string|nullable',
            'cat_id' => 'required|exists:categories,id',
            'country_id' => 'nullable',
            'Bmin' => 'nullable|numeric',
            'Bmax' => 'nullable|numeric',
            'Nombred' => 'nullable|numeric',
            'Date' => 'string|nullable',
            'Ddesc' => 'string|nullable',
            'Dimage' => 'required',

        ]);
        $data = $request->all();

        $demande = new Demande();

        $demande->title = $data['title'];
        $demande->Dadress = $data['Dadress'];
        $demande->country_id = $data['country_id'];
        $demande->state_id = $data['state_id'];
        $demande->Bmin = $data['Bmin'];
        $demande->Bmax = $data['Bmax'];
        $demande->Nombred = $data['Nombred'];
        $demande->Date = $data['Date'];
        $demande->Dimage = $data['Dimage'];
        $demande->Ddesc = $data['Ddesc'];
        $demande->cat_id = $data['cat_id'];
        $demande->lat = $data['lat'];
        $demande->lng = $data['lng'];


        $demande['user_id'] = auth()->user()->id;
        $demande['demande_number'] = Str::upper('DEM-' . Str::random(6));

        if ($demande->Date == 'Jours') {
            $demande->Std_close = Carbon::now()->addDay($demande->Nombred);
        } elseif ($demande->Date == 'Mois') {
            $demande->Std_close = Carbon::now()->addMonths($demande->Nombred);
        } else {
            $demande->Std_close = Carbon::now()->addHours($demande->Nombred);
        }

        $close = Carbon::create($demande->Std_close);

        $demande->auto_close = $close->addDay(4);

        $status = $demande->save();

        if ($status) {
            return redirect()->route('demande.show')->with('success', 'Demande successfully created ');
        } else {
            return back()->with('error', 'something went wrong');
        }
    }

    public function ShowDemande()
    {


        $demandes = Demande::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'DESC')->paginate(3);

        return view('backend.demande.dem', compact('demandes'));
    }

    public function DemandeVerified(Request $request)
    {

        if ($request->mode == 'true') {
            DB::table('demandes')->where('id', $request->id)->update(['approuved' => 1]);
        } else {
            DB::table('demandes')->where('id', $request->id)->update(['approuved' => 0]);
        }
        return response()->json(['msg' => 'Demande Approuved', 'status' => true]);
    }


    public function ShowAllDemande(Request $request)

    {
        $query = $request->input('query');
        $demandes = Demande::query();
        //$demandes = Demande::where(['approuved' => 1, 'Dstatus' => 'en cours'])->orderBy('created_at', 'DESC');

        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC');



        if (!empty($_GET['category'])) {
            $title = explode(',', $_GET['category']);
            $cat_ids = Category::select('id')->whereIn('title', $title)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('cat_id', $cat_ids);
        }


        if (!empty($_GET['query'])) {
            $demandes = $demandes->where('title', 'LIKE', '%' . $query . '%');
        }


        if (!empty($_GET['country'])) {
            $name = explode(',', $_GET['country']);
            $country_ids = Country::select('id')->whereIn('name', $name)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('country_id', $country_ids);
        }

        $demandes = $demandes->paginate(10);


        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();



        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $country = $request->input('country');
        $price = $request->input('slide');

        $pieces = explode(",", $price);



        $demandes = Demande::query();
        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC');


        if (!empty($_GET['category'])) {
            $title = ($_GET['category']);
            $cat_ids = Category::select('id')->whereIn('title', $title)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('cat_id', $cat_ids);
            
        }

        if (!empty($_GET['query'])) {
            $demandes = $demandes->where('title', 'LIKE', '%' . $query . '%');
        }

        if (!empty($_GET['slide'])) {
            $demandes = $demandes->whereBetween('Bmin', [$pieces[0], $pieces[1]])->whereBetween('Bmax', [$pieces[0], $pieces[1]]);
        }


        if (!empty($_GET['country'])) {
            $name = ($_GET['country']);
            $country_ids = Country::select('id')->whereIn('name', $name)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('country_id', $country_ids);
        }

        if (!empty($_GET['state'])) {
            $name = ($_GET['state']);
            $state_ids = State::select('id')->whereIn('name', $name)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('state_id', $state_ids);
        }

        



        $demandes = $demandes->paginate(10);
        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();


        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }


    public function DemandeFilter(Request $request)
    {
        $data = $request->all();
        $catUrl = '';



        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }


        $countryUrl = '';
        if (!empty($data['country'])) {
            foreach ($data['country'] as $country) {
                if (empty($countryUrl)) {
                    $countryUrl .= '&country=' . $country;
                } else {
                    $countryUrl .= ',' . $country;
                }
            }
        }

        $motUrl = '';
        if (!empty($data['query'])) {
            $motUrl .= '&query=' . $data['query'];
        }


        return redirect()->route('demande.showall', $catUrl . $countryUrl . $motUrl);
    }


    public function TrierFilter(Request $request)
    {
        $demandes = Demande::query();


        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'new') {
                $demandes = Demande::select('*')
                ->where('approuved', '=', 1)
                ->where('Dstatus', '=', 'en cours')
                ->where('Std_close', '>', Carbon::today())
                ->orderBy('created_at','DESC');
            }
            if ($_GET['sortBy'] == 'old') {
                $demandes = Demande::select('*')
                ->where('approuved', '=', 1)
                ->where('Dstatus', '=', 'en cours')
                ->where('Std_close', '>', Carbon::today())
                ->orderBy('created_at','ASC');
            }
        }
        $demandes = $demandes->paginate(10);
        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();


        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $demande = Demande::find($id);
        if ($demande) {
            $status = $demande->delete();
            if ($status) {
                return redirect()->route('demande.show')->with('success', 'Demande successfully deleted');
            } else {
                return back()->with('error', 'something went wrong');
            }
        } else {
            return back() - with('error', 'Demande not found');
        }
    }


    public function DemandeDetail($title)

    {
        $demande = Demande::where('title', $title)->first();
        $user = User::where(['id' => $demande->user_id])->first();
        if ($demande) {
            return view('backend.demande.index', compact(['demande', 'user']));
        } else {
            return 'Demande detail not found';
        }
    }


    public function DemandeDetai($title)

    {
        $demande = Demande::where('title', $title)->first();
        $user = User::where(['id' => $demande->user_id])->first();
        return view('backend.demande.demandedet', compact(['demande', 'user']));
    }



    public function ShowDemandeAdmin()
    {


        $demandes = Demande::where(['approuved' => 0])->orderBy('created_at', 'DESC')->get();



        return view('backend.demande.admindemande', compact('demandes'));
    }

    public function edit($id)
    {
        $demande = Demande::find($id);
        $user = Auth::user();
        $data['countries'] = Country::get(["name", "id"]);
        $state = State::where(['id' => $demande->state_id])->first();
        if ($demande) {
            return view("backend.demande.edit", $data, compact(['demande', 'user', 'state']));
        } else {
            return back()->with('error', 'demande not found');
        }
    }

    public function update(Request $request, $id)
    {
        $demande = Demande::find($id);
        if ($demande) {

            $this->validate($request, [
                'title' => 'string|required',
                'Dadress' => 'string|nullable',
                'cat_id' => 'required|exists:categories,id',
                'country_id' => 'nullable',
                'Bmin' => 'nullable|numeric',
                'Bmax' => 'nullable|numeric',
                'Nombred' => 'nullable|numeric',
                'Date' => 'string|nullable',
                'Ddesc' => 'string|nullable',

            ]);

            $data = $request->all();

            $status = $demande->fill($data)->save();


            if ($status) {
                return redirect()->route('demande.show')->with('success', 'successfully update Demande');
            } else {
                return back()->with('error', 'something went wrong');
            }
        } else {
            return back()->with('error', 'Demande not found');
        }
    }

    public function ShowAllDemandeAkthili(Request $request)

    {
       /* $query = $request->input('query');
        $demandes = Demande::query();
       $demandes = Demande::where(['approuved' => 1, 'Dstatus' => 'en cours'])->orderBy('created_at', 'DESC'); */

        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('cat_id', '=', 1)
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC')->paginate(10);


        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();

        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }

    public function ShowAllDemandeLivrili(Request $request)

    {
       /* $query = $request->input('query');
        $demandes = Demande::query();
       $demandes = Demande::where(['approuved' => 1, 'Dstatus' => 'en cours'])->orderBy('created_at', 'DESC'); */

        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('cat_id', '=', 2)
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC')->paginate(10);


        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();

        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }

    public function ShowAllDemandeWasalni(Request $request)

    {
       /* $query = $request->input('query');
        $demandes = Demande::query();
       $demandes = Demande::where(['approuved' => 1, 'Dstatus' => 'en cours'])->orderBy('created_at', 'DESC'); */

        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('cat_id', '=', 4)
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC')->paginate(10);


        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();

        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }

    public function RapportDemande(Request $request,$id)
    {
        $this->validate($request,[
            'message'=>'string|nullable|max:200'
        ]);

        $data=$request->all();
        $demande = Demande::find($id);

        $user = User::where(['id' => $demande->user_id])->first();

        //dd($data);
        Mail::to($user->email)->send(new DemandeRapport($demande, $data)); 
        
        return redirect()->route('home')->with('success','your message was sent successfully ');
        
    }
}
