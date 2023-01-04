<?php

namespace App\Http\Controllers;

use App\Models\AdminRec;
use App\Models\User;
use App\Models\Demande;
use App\Models\offre;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ReclamationController extends Controller
{
    public function store(Request $request)
    {
       $this->validate($request, [
            'robject'=>'string|required',
            'rdesc'=>'string|required',

        ]);
        $data=$request->all();
        
        $reclamation = new Reclamation();

        $reclamation->user_id=$data['user_id'];
        $reclamation->demande_id=$data['demande_id']; 
        $reclamation->offre_id=$data ['offre_id'];
        $reclamation->robject=$data['robject'];

        $reclamation->rdesc=$data ['rdesc'];


        $reclamation['rec_number'] = Str::upper('REC-' . Str::random(6));

        $status = $reclamation->save();

        if ($status) {
            return back()->with('success','reclamation sens');
        } else {
            return back()->with('error', 'something went wrong');
        }

    }

    public function AllRec()
    {
 
 
        $recs = Reclamation::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'DESC')->paginate(5);
 
        return view('backend.reclamation.allrec', compact('recs'));
    }

    public function AdminAllRec()
    {
 
 
        //$recs = Reclamation::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'DESC')->paginate(5);

        $recs = Reclamation::select('*')->orderBy('created_at','DESC')->paginate(5);;
 
        return view('admin.reclamations.allrec', compact('recs'));
    }


    public function RecDet($id)

    {   
            $recs = Reclamation::find($id);
            $offre=offre::where(['id'=>$recs->offre_id])->first();
            $demande=Demande::where('id',$recs->demande_id)->first();
            $adminrecs = AdminRec::where('rec_id',$id)->get();

            $user=user::where(['id'=>$recs->user_id])->first();



            return view('backend.reclamation.detrec',compact('recs','demande','offre','user','adminrecs'));
       
    }

    public function AdminRecDet($id)

    {   
            $recs = Reclamation::find($id);

            $offre=offre::where(['id'=>$recs->offre_id])->first();
            $demande=Demande::where('id',$recs->demande_id)->first();
            $user=user::where(['id'=>$recs->user_id])->first();
            $adminrecs = AdminRec::where('rec_id',$id)->get();




            return view('admin.reclamations.adminrec',compact('recs','demande','offre','user','adminrecs'));
       
    }

    public function AdminRecStore(Request $request)
    {
        $this->validate($request,[    
            'com'=>'nullable|string',
        ]);

        $data=$request->all();
        $data['admin_id']=auth('admin')->user()->id;

        $status=AdminRec::create($data);
        if($status)
        {
            return back()->with('success','Thank you for your feedback');
        }
        else{
            return back()->with('error','Please try again !');
        }
    }

    public function CloturerReclamation(Request $request)
    {
            $id=$request->input('rec_id');
         
             DB::table('reclamations')->where('id', $id)->update(['rstatus' => 'Terminer']);
             DB::table('reclamations')->where('id', $id)->update(['AdminDec' => 'cloturer']);
             return back()->with('success','Réclamation cloturer');
 
    }

    public function RefundReclamation(Request $request)
    {
            $id=$request->input('rec_id');

            $recs=Reclamation::find($id);

            $offre=offre::where(['id'=>$recs->offre_id])->first();

            $user=user::where(['id'=>$recs->user_id])->first();
            $usersolde = $user->solde ;
            $usersolde  += $offre->Mnt_offre ;

         
             DB::table('users')->where('id', $user->id)->update(['solde' =>  $usersolde]);
             DB::table('reclamations')->where('id', $id)->update(['rstatus' => 'Terminer']);
             DB::table('reclamations')->where('id', $id)->update(['AdminDec' => 'refund demandeur']);
             return back()->with('success','Réclamation ');
 
    }
}
