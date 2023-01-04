<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'paiement_number',    
        'p_name',
        'p_prenom',
        'p_email',
        'p_phone',
        'p_ville',
        'p_zip',
        'p_mnt',
        'p_com',
        'p_status',
        'p_DatePaiement',
        'user_id',
        'RIB',      
        

    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

}
