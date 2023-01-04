<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Paiement;
use PDF;
use Illuminate\Support\Carbon;


class PaiementController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $nbpay =  Paiement::where(['p_status' => 0,'user_id'=>$user->id])->get();
        return view('backend/checkout/paiement', compact('nbpay'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'p_name' => 'string|required',
            'p_email' => 'string|required',
            'p_phone' => 'string|required',
            'p_ville' => 'string|required',
            'p_zip' => 'string|required',
            'p_mnt' => 'nullable|numeric',
            'p_com' => 'string|nullable',
            'RIB' => 'string|required|min:20',


        ]);
        $data = $request->all();

        $user = Auth::user();
        $usersolde = $user->solde;
        $mntpay = Paiement::select('*')
        ->where('p_status', '=', 0)
        ->where('user_id', '=',  $user->id)
        ->sum('p_mnt');
        $usersolde -=  $mntpay ;

        if ($data['p_mnt'] < 100 || $usersolde < $data['p_mnt'] ) {

            return back()->with('error', 'Montant non valide');
        } else {

            $paiement = new Paiement();

            $paiement->p_name = $data['p_name'];
            $paiement->p_email = $data['p_email'];
            $paiement->p_phone = $data['p_phone'];
            $paiement->p_ville = $data['p_ville'];
            $paiement->p_zip = $data['p_zip'];
            $paiement->p_mnt = $data['p_mnt'];
            $paiement->p_com = $data['p_com'];
            $paiement->RIB = $data['RIB'];



            $paiement['user_id'] = auth()->user()->id;
            $paiement['paiement_number'] = Str::upper('DEM-' . Str::random(6));

            $status = $paiement->save();

            if ($status) {
                return redirect()->route('home')->with('success', 'Demande successfully sent ');
            } else {
                return back()->with('error', 'something went wrong');
            }
        }
    }

    public function ShowPaiementAdmin(Request $request)
    {
        $paiements = Paiement::where(['p_status' => 0])->orderBy('created_at', 'DESC')->get();

     /*      if($request->has('download'))
        {
            $pdf = PDF::loadView('backend.checkout._adminpaiement',compact('paiements'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('pdfview.pdf');
        }*/

        return view('backend.checkout.adminpaiement', compact('paiements'));
    }

    public function AllPaiementAdmin(Request $request)
    {
        $paiements = Paiement::where(['p_status' => 1])->orderBy('created_at', 'DESC')->paginate(10);

     /*      if($request->has('download'))
        {
            $pdf = PDF::loadView('backend.checkout._adminpaiement',compact('paiements'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('pdfview.pdf');
        }*/

        return view('backend.checkout.allpaiement', compact('paiements'));
    }

    public function downloadPdf()
    {
        $paiements = Paiement::where(['p_status' => 0])->orderBy('created_at', 'DESC')->get();

        // share data to view
        view()->share('users-pdf',$paiements);
        $pdf = PDF::loadView('backend.checkout._adminpaiement',compact('paiements'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('ListePaiement.pdf');
    }

    public function allPdf()
    {
        $paiements = Paiement::where(['p_status' => 1])->orderBy('created_at', 'DESC')->get();

        // share data to view
        view()->share('users-pdf',$paiements);
        $pdf = PDF::loadView('backend.checkout.allpaiementpdf',compact('paiements'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('AllPaiement.pdf');
    }


    public function PaiedPaiement(Request $request)
    {

      
        if ($request->mode == 'true') {


            $pay = Paiement::find($request->id);
            $paymnt = $pay->p_mnt;
            $user= User::find( $pay->user_id);
            $usermnt = $user->solde;
            $usernewsolde = $usermnt - $paymnt;
            DB::table('paiements')->where('id', $request->id)->update(['p_status' => 1]);
            DB::table('paiements')->where('id', $request->id)->update(['p_DatePaiement' => Carbon::now()]);
            DB::table('users')->where('id', $pay->user_id)->update(['solde' => $usernewsolde]);


        } else {
            DB::table('paiements')->where('id', $request->id)->update(['p_status' => 0]);
        }
        return response()->json(['msg' => 'Paiement paied', 'status' => true]);
    }

    public function userPaiement()
    {
        $user = Auth::user();
        $paiements = Paiement::where(['user_id' =>  $user->id])->orderBy('created_at', 'DESC')->paginate(5);

        // share data to view
        return view('backend.checkout.dashpay', compact('paiements'));
    }

    

    
  /*  public function PaiedPaiement(Request $request)
    {
        $userid = $request->input('user_id');
        $mnt =  $request->input('p_mnt');
        $user = user::find($userid);
        $usersolde = $user->solde;
        

        if ($request->mode == 'true') {
            $usersolde -= $mnt ;
            DB::table('paiements')->where('id', $request->id)->update(['p_status' => 1]);
            DB::table('paiements')->where('id', $request->id)->update(['p_DatePaiement' => Carbon::now()]);
            DB::table('users')->where('id',  $userid)->update(['solde' => $usersolde]);

        } else {
            DB::table('paiements')->where('id', $request->id)->update(['p_status' => 0]);
        }
        return response()->json(['msg' => 'Paiement paied', 'status' => true]);
    } */
}
