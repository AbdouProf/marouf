<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreContact extends Model
{
    use HasFactory;
    protected $fillable=['user_id','offre_id','com','status'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function offre()
    {
        return $this->belongsTo(offre::class);
    }

}
