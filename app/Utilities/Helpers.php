<?php

class Helper{

    public static function userDefaultImage()
    {
        return asset('frontend/img/default.png');
    }

    public static function minPrice()
    {
        return floor(\App\Models\Demande::min('Bmin'));
    }
   
    public static function maxPrice()
    {
        return floor(\App\Models\Demande::max('Bmax'));
    }

}

   