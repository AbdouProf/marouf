<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offre extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','offre_number','demande_id','Mnt_offre','Nbrj_offre','Date_offre', 'ostatus','StatusOffreAccepter','mail_offre','Std_close_Offre',];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function demande()
    {
        return $this->belongsTo(demande::class);
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

