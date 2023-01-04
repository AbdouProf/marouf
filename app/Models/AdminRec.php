<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRec extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'admin_id',   
        'rec_id', 
        'rapport',
        
       

    ];

    public function reclamtions()
    {
        return $this->belongsTo(Reclamation::class);
    }
}
