<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [     
        'title',
        'category_id',
        'status',  
    ];

    public function demandes()
    {
        return $this->hasMany('\App\Models\Demande','cat_id','id')->where('Dstatus','en cours');
    }

}
