<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelOffre extends Model
{
    use HasFactory;

    protected $fillable=['user_id','offre_id','reason','Accepted'];

}
