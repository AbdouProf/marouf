<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\offre;
use Illuminate\Http\Request;
use DB;



class AdminController extends Controller
{
    public function index()
    {
        $demandes = Demande::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $offres = offre::select('*')->orderBy('created_at','DESC')->limit(5)->get();
          
        return view('admin.admindash', compact('demandes','offres'));
    }
}
