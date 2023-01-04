<?php

namespace App\Http\Controllers;

use App\Mail\OffreMail;
use App\Models\CancelOffre;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Demande;
use App\Models\OffreReview;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use App\Models\Offre;
use App\Models\OffreContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;





class OffreController extends Controller
{
    public function store(Request $request)
    {
       $this->validate($request, [
            'Mnt_offre'=>'nullable|numeric',
            'Nbrj_offre'=>'nullable|numeric',
            'Date_offre'=>'string|nullable',

        ]); 
            $data=$request->all();
        
            $offre = new Offre();

            $offre->Mnt_offre=$data['Mnt_offre'];
            $offre->Nbrj_offre=$data ['Nbrj_offre'];
            $offre->Date_offre=$data['Date_offre'];
            $offre->demande_id=$data['demande_id'];

            $offre['user_id']=auth()->user()->id ;
            $offre['mail_offre']=auth()->user()->email ;
            $offre['offre_number']=Str::upper('OFF-'.Str::random(6));

            if ( $offre->Date_offre =='Jours') {
                $offre->Std_close_Offre = Carbon::now()->addDay( $offre->Nbrj_offre);
            } elseif ( $offre->Date_offre =='Mois') {
                $offre->Std_close_Offre = Carbon::now()->addMonths( $offre->Nbrj_offre);
            } else {
                $offre->Std_close_Offre = Carbon::now()->addHours( $offre->Nbrj_offre);
            }

            $status = $offre->save();

            if($status)
            {

                return redirect()->route('offre.show')->with('success','offre successfully sent ');
            }
            else{
               return back()->with('error','something went wrong');
            }

        }

        public function ListOffre($title)

        {
         
            $demande=Demande::where('title',$title)->first();
            $offres=offre::where(['demande_id'=>$demande->id])->orderBy('created_at', 'DESC')->get();
            $authuser = Auth::user();
    
            return view('backend.offre.liste',compact(['demande','offres','authuser']));
    
           
        }

        public function sendOrderConfirmationMail($offre)
    {
        Mail::to($offre->mail_offre)->send(new OffreMail($offre));
    }


   public function AcceptOffre(Request $request,$id)    
     {     
        //$offre_id = $request->input("offreid");

    

        $offre = offre::find($id);
        $userid = $request->input('user_id');
        $typepai = $request->input('radio');
        $user = user::find($userid);
        $usersolde = $user->solde;
        $demoffid = $offre->demande_id;


        if( $typepai == "carte") {
            return view('backend/checkout/carte',compact('offre'));

        }
        else {
       

            if($usersolde < $offre->Mnt_offre  )
            {     
                //dd($usersolde);
                return back()->with('success','votre solde insuffisant ');;
            }
            else {
            
            $usersolde -= ($offre->Mnt_offre+$offre->Mnt_offre*0.05);
                    
            DB::table('offres')->where('id', $id)->update(['ostatus' => 'Offre Accepte']);
            $user->update(['solde'=>$usersolde]);
            $offres=offre::where(['demande_id'=> $demoffid, 'ostatus' => 'En attente de validation'])->get();
            foreach ($offres as $item) {
                DB::table('offres')->where('id', $item->id)->update(['ostatus' => 'Offre refuse']);

            }

            //DB::table('users')->where('id',$userid)->update(['solde' => ])
        
            $this->sendOrderConfirmationMail($offre);
            return view('backend/checkout/confirmation');

            }
        }

    }
   

   public function OffreRefused(Request $request)
   {

        $id=$request->input('rowId');
        
            DB::table('offres')->where('id', $id)->update(['ostatus' => 'Offre refuse']);
            DB::table('offres')->where('id', $id)->update(['StatusOffreAccepter' => 'Offre cloturer']);
            return response()->json(['msg'=>'successfully update offre','status'=>true]);

   }

   public function destroy($id)

    {
        
        $offre = offre::find($id);
        if ($offre) {
            $status = $offre->delete();
            if ($status) {
                return back()->with('success', 'Offre successfully deleted');
            } else {
                return back()->with('error', 'something went wrong');
            }
        } else {
            return back() - with('error', 'Offre not found');
        }
    }

    public function OffreRefuse($id)
   {

         Offre::where('id',$id)->update([
        'ostatus'=>'Offre refuse',
       
    ]);
         return back()->with('success','Account successfully update');
   }


   public function ShowOffre()
   {


       $offres = offre::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'DESC')->paginate(5);


       return view('backend.offre.mesoff', compact('offres'));
   }

   public function ShowOffreencours()
   {
       //$offresencours = offre::where(['user_id' => auth()->user()->id,'ostatus' => 'Offre Accepte','ostatus' => 'En attente annulation','StatusOffreAccepter' => 'Offre en cours'])->orderBy('created_at', 'DESC')->paginate(5);

       $offresencours = offre::select('*')
       ->where('user_id', '=',  auth()->user()->id )
       ->where('ostatus', '=', 'Offre Accepte')
       ->where('StatusOffreAccepter', '=', 'Offre en cours')
       ->orWhere('ostatus', '=', 'En attente annulation')
       
       ->orderBy('created_at','DESC')
       ->paginate(5); 

       return view('backend.offre.offreencours', compact('offresencours'));
   }

   public function ShowOffrrefuser()
   {
       $offrerefuser = offre::where(['user_id' => auth()->user()->id,'ostatus' => 'Offre refuse'])->orderBy('created_at', 'DESC')->paginate(5);
       return view('backend.offre.offrerefuser', compact('offrerefuser'));
   }

   public function ShowOffrrecloture()
   {
       $offrecloturer = offre::where(['user_id' => auth()->user()->id,'StatusOffreAccepter' => 'Offre cloturer'])->orderBy('created_at', 'DESC')->paginate(5);
       return view('backend.offre.offrecloturer', compact('offrecloturer'));
   }

   public function OffreReview(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric',
            'rate2'=>'required|numeric',
            'rate3'=>'required|numeric',
            'review'=>'nullable|string',
        ]);

        $data=$request->all();
        $id=$request->input('offre_id');
        $offre = offre::find($id);
        $userid = $offre->user_id;      
        $user = user::find($userid);
        $usersolde = $user->solde;
        $mnt =  $offre->Mnt_offre;
        $newsolde = $usersolde+$mnt;

        $status=OffreReview::create($data);
        if($status)
        {
            DB::table('offres')->where('id', $id)->update(['StatusOffreAccepter' => 'Offre cloturer']);
            DB::table('users')->where('id', $userid)->update(['solde' => $newsolde]);
            DB::table('demandes')->where('id', $offre->demande_id)->update(['Dstatus' => 'Terminer']);

            return back()->with('success','Thank you for your feedback');
        }
        else{
            return back()->with('error','Please try again !');
        }
    }

    public function OffreCancel(Request $request)
    {
        
        $this->validate($request,[
            'reason'=>'nullable|string',
        ]);


        $data=$request->all();
        $status=CancelOffre::create($data);
        $id=$request->input('offre_id');
        if($status)
        {
            DB::table('offres')->where('id', $id)->update(['ostatus' => 'En attente annulation']);
            return back()->with('success','Annulation en cours de traitement');
        }
        else{
            return back()->with('error','Please try again !');
        }
    }

    public function OffreCancelAccept ($id) {


        $canceloffre = CancelOffre::where(['offre_id'=>$id])->first();
        $offre = offre::find($id);
        $canceloffremnt = $offre -> Mnt_offre;
        $user= User::find( $canceloffre->user_id);
        $usermnt = $user->solde;
        $usernewsolde = $usermnt + $canceloffremnt;


        DB::table('offres')->where('id', $id)->update(['ostatus' => 'Offre refuse']);
        DB::table('offres')->where('id', $id)->update(['StatusOffreAccepter' => 'Offre annuler']);
        DB::table('cancel_offres')->where('offre_id', $id)->update(['Accepted' => 'accept']);
        DB::table('users')->where('id', $canceloffre->user_id)->update(['solde' => $usernewsolde]);


        return back()->with('success','Annulation accepter');

    }


    public function OffreCancelRefuse ($id) {

        DB::table('offres')->where('id', $id)->update(['ostatus' => 'Offre Accepte']);
        DB::table('cancel_offres')->where('offre_id', $id)->update(['Accepted' => 'reject']);


        return back()->with('success','Annulation Refuser');

    }

    public function OffreContact($id)

    {   
            $offre = offre::find($id);
            $commets=OffreContact::where(['offre_id'=>$id])->get();

            $demande=Demande::where('id',$offre->demande_id)->first();
            $user=user::where(['id'=>$offre->user_id])->first();



            return view('backend.demande.detail',compact('commets','demande','offre','user'));
       
    }

    public function OffrecontactStore(Request $request)
    {
        $this->validate($request,[    
            'rapport'=>'nullable|string',
        ]);

        $data=$request->all();
        
        $status=OffreContact::create($data);
        if($status)
        {
            return back()->with('success','Thank you for your feedback');
        }
        else{
            return back()->with('error','Please try again !');
        }
    }

    public function MyOffreReviews () 
    {
        $offres = offre::where(['user_id' => auth()->user()->id,'ostatus' => 'Offre Accepte','StatusOffreAccepter' => 'Offre cloturer'])->paginate(5);
        return view('backend.offre.myoffrereviews',compact('offres'));




    }

    

}
