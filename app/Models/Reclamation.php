<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['rec_number','user_id','demande_id','offre_id','rdesc','rstatus','AdminDec',];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function demande()
    {
        return $this->belongsTo(demande::class);
    }
    public function offre()
    {
        return $this->belongsTo(offre::class);
    }

    public function adminrecs()
    {
        return $this->hasMany(AdminRec::class);
    }
}
