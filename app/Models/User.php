<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'desc',
        'fblink',
        'image',
        'status',
        'solde',
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(1000, 9999);
  
        user_codes::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );
  
        $receiverNumber = auth()->user()->phone;
        $message = "Your Maarouf verification code is :". $code;
    
        try {
   
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
    
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
    
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function offres()
    {
        return $this->hasMany(offre::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function offrecontacts()
    {
        return $this->hasMany(OffreContact::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

}
