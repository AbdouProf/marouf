<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Demande extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 
        'demande_number',    
        'Titre',
        'category_id',
        'Dstatus',  
        'Dadress',
        'Bmin',
        'Bmax',
        'NombreDa',
        'Date',
        'Dimage',
        'Ddesc',
        'user_id',
        'approuved',
        'country_id',
        'state_id',
        'Std_close',
        'auto_close',
        'lat',
        'lng',

    ];
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }

    public function offres()
    {
        return $this->hasMany(offre::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

    public static  function getDemandeByCart($id)
 {
     return self::where('id',$id)->get()->toArray();
 }

}
