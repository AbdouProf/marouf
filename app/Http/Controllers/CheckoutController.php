<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Offre;
use App\Mail\OffreMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;




class CheckoutController extends Controller
{
    public function Index()
    {
        return view('backend/checkout/carte');
    }

    public function sendOrderConfirmationMail($offre)
    {
        Mail::to($offre->mail_offre)->send(new OffreMail($offre));
    }

    public function stripePost(Request $request)
    {
        $id = $request->input('offre_id');
        $offre = offre::find($id);
        $mnt =  $offre->Mnt_offre;
        $mnt += $mnt*0.05;
        $code = $offre->offre_number;
        $demoffid = $offre->demande_id;


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" =>  $mnt*100,
                "currency" => "EUR",
                "source" => $request->stripeToken,
                "description" => "Paiemment pour l'offre ".$code,
        ]);
        DB::table('offres')->where('id', $id)->update(['ostatus' => 'Offre Accepte']);
        $offres=offre::where(['demande_id'=> $demoffid, 'ostatus' => 'En attente de validation'])->get();
        foreach ($offres as $item) {
            DB::table('offres')->where('id', $item->id)->update(['ostatus' => 'Offre refuse']);

        }
        $this->sendOrderConfirmationMail($offre);

         return view('backend/checkout/confirmation');
    }
}
