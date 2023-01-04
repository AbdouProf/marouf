<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

use Brian2694\Toastr\Facades\Toastr;
use App\Mail\Contact;
use App\Models\{Country, State, UserReview};
use App\Models\Category;
use App\Models\offre;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;





class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('2fa', ['only' => ['registerSubmit']]);
    }

    public function home()
    {
        $user=Auth::user();
        $users=User::where(['status'=>'active']);
       // $demandes=Demande::where(['Dstatus'=>'en cours']);
        $demandes = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today());
        $demandet=Demande::where(['Dstatus'=>'Terminer']);
        $data['countries'] = Country::get(["name", "id"]);

        $a9thili = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('cat_id', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC');

        $livrili = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('cat_id', '=', 2)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC');

        $wasalni = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('cat_id', '=', 4)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC');



        //$demande=Demande::where(['approuved' => 1,'Dstatus'=>'en cours','Std_close', '>', Carbon::today()])->orderBy('created_at','DESC')->limit(5)->get();

        $demande = Demande::select('*')
        ->where('approuved', '=', 1)
        ->where('Dstatus', '=', 'en cours')
        ->where('Std_close', '>', Carbon::today())
        ->orderBy('created_at','DESC')->limit(5)->get();

        //$reviews = UserReview::where(['status' => 'accept','rate'=>'5'])->orderBy('created_at', 'DESC')->limit(5)->get();

        $reviews = UserReview::select('*')
        ->where('status', '=', 'accept')
        //->where('rate', '=', 5)
        ->whereBetween('rate', [4, 5])
        ->orderBy('created_at','DESC')->limit(5)->get();



        return view('welcome',$data,compact(['users','user','demandes','demande','demandet','reviews','a9thili','livrili','wasalni']));
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request,[
            'email' => 'email | required | exists:users,email',
            'password' => 'required | min:3'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            Session::put('user',$request->email);

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'))->with('success','Successfully login');
            }
            else{
                return redirect()->route('user-dash')->with('success','Successfully login');

            }
        }
        else{
            return back()->with('error','Invalid email & password !');
        }
    }

    
    public function registerSubmit(Request $request)
    {
        $this->validate($request,[
            'name'=>'nullable|string',
            'email'=>'required|email|unique:users,email',
            'phone'=> 'nullable|min:8|string',
            'password'=>'min:3|required|confirmed'
        ]);

        $data=$request->all();
        $check=$this->create($data);
        Session::put('user', $data['email']);
        Auth::login($check);
       
    }

    public function userAuth()       
    {
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.login');
    }


    private function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect()->home()->with('success','Successfully logout');
        toastr()->success('Success Message');

    }

    public function userAccount()
    {
        $user=Auth::user();
        return view('backend.profil.profil2', compact('user'));
    }

    public function updateAccount(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|min:8',
            'desc'=>'nullable|min:8',
            'fblink'=>'nullable|min:5',

        ]);
        if ($request->file('image') == true) {
        $image = $request->file ('image');
        $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('img/test/'. $name_gen);
        $save_url = 'img/test/' .  $name_gen;
        }
        else {
            $save_url =Auth::user()->image;

        }

        if($request->name !=null && $request->email !=null)
        {
            User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'desc'=>$request->desc,
                'fblink'=>$request->fblink,
                'image'=> $save_url,
            ]);
           
            return back()->with('success','Account successfully update');
        }
        else{
                return back()->with('error','Nothing to update');
            }
    }
    public function updateAccountt(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|min:8',
            'desc'=>'nullable|min:8',
            'fblink'=>'nullable|min:5',

        ]);

        if($request->name !=null && $request->email !=null)
        {
            User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'desc'=>$request->desc,
                'fblink'=>$request->fblink,
                'image'=>$request->image,
            ]);

            return back()->with('success','Account successfully update');
        }
        else{
                return back()->with('error','Nothing to update');
            }
    }


    public function updatePassword (Request $request,$id)
    {
        $this->validate($request,[
            'newpassword'=>'nullable|min:3',
            'oldpassword'=>'nullable|min:3',
            
        ]);

        $hashpassword=Auth::user()->password;
        
        if(Hash::check($request->oldpassword, $hashpassword))
            {
                if( !Hash::check($request->newpassword, $hashpassword))
                {
                    User::where('id',$id)->update([
                     
                        'password'=>Hash::make($request->newpassword),
                    ]);

                    return back()->with('success','Account successfully update');
                }
                else{
                    return back()->with('error','New password can not be same with old password');
                }
            }
            else{
                return back()->with('error','Old password does not macht');
            }
    }

    public function userAccountTest()
    {
        $user=Auth::user();
        return view('backend.profil.profiltest', compact('user'));
    }

    public function updateAccountTest(Request $request,$id)
    {
        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('storage'),$imageName);
    
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|min:8',
            'desc'=>'nullable|min:8',
            'fblink'=>'nullable|min:5',

        ]);

        if($request->name !=null && $request->email !=null)
        {
            User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'desc'=>$request->desc,
                'fblink'=>$request->fblink,
                'image'=>$image,
            ]);

            return back()->with('success','Account successfully update');
        }
        else{
                return back()->with('error','Nothing to update');
            }
    }

    public function contactUs()
    {
        return view('frontend.contactus');
    }

    public function contactSubmit(Request $request)
    {
        $this->validate($request,[
            'f_name'=>'string|required',
            'l_name'=>'string|required',
            'email'=>'email|required',
            'subject'=>'min:4|string|required',
            'message'=>'string|nullable|max:200'
        ]);

        $data=$request->all();

        //dd($data);
        Mail::to('marrouf8@gmail.com')->send(new Contact($data)); 
        
        return redirect()->route('home')->with('success','your message was sent successfully ');
        
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $country = $request->input('country');

        $demandes = Demande::query();
        $demandes = Demande::where(['approuved' => 1, 'Dstatus' => 'en cours'])->orderBy('created_at', 'DESC');

        if (!empty($_GET['query'])) {
            $demandes = $demandes->where('title', 'LIKE', '%' . $query . '%');
        }


        if (!empty($_GET['country'])) {
            $name = ($_GET['country']);
            $country_ids = Country::select('id')->whereIn('name', $name)->pluck('id')->toArray();
            $demandes = $demandes->whereIn('country_id', $country_ids);
        }
        

        if (!empty($_GET['category'])) {
            $title = ($_GET['category']);
            $cat_ids = Category::select('id')->whereIn('title', $title)->pluck('id')->toArray();

            $demandes = $demandes->whereIn('cat_id', $cat_ids);
        }

        $demandes = $demandes->paginate(10);

        $cats = Category::where(['status' => 'active'])->with('demandes')->get();
        $countrys = Country::all();

        return view('backend.demande.list', compact('demandes', 'cats', 'countrys'));
    }


    public function UserReview(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric',
            'review'=>'nullable|string',
        ]);

        $data=$request->all();
  

        $status=UserReview::create($data);
        if($status)
        {

            return back()->with('success','Thank you for your feedback');
        }
        else{
            return back()->with('error','Please try again !');
        }
    }

    public function ShowReview()
    {
 
 
        $reviews = UserReview::where(['status' => 'accept'])->orderBy('created_at', 'DESC')->paginate(5);
 
        return view('backend.avis.review', compact('reviews'));
    }
 

    public function userdash()
    {

       $demandes = Demande::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id', '=', auth()->user()->id)
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count'); 

        
       $months = Demande::select(DB::raw("Month(created_at) as month"))
       ->whereYear('created_at', date('Y'))
       ->where('user_id', '=', auth()->user()->id)
       ->groupBy(DB::raw("Month(created_at)"))
       ->pluck('month'); 

       $datas = array (0,0,0,0,0,0,0,0,0,0,0,0);
       foreach ($months as $index => $month) {
           $datas[$month -1 ] = $demandes[$index];
       }
                   

        $offres = offre::select('*')
        ->where('user_id', '=', auth()->user()->id)->orderBy('created_at','DESC')->limit(5)->get();
          
        return view('backend.userdash', compact('datas','demandes','offres'));
    }


}
