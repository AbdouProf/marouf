<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreReview extends Model
{
    use HasFactory;

    protected $fillable=['user_id','offre_id','rate','rate2','rate3','review','status'];

}
