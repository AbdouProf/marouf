<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_codes extends Model
{
    use HasFactory;
    
    public $table = "user_codes";
  
    protected $fillable = [
        'user_id',
        'code',
    ];
}