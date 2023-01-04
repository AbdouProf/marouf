<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;



class WishlistController extends Controller
{
    public function wishlist()
    {       

       return view('frontend.wishlist.wishlist');
    }

    public function  wishliststore(Request $request){
 
       
        $demande_id=$request->input('demande_id');
        $demande=Demande::getDemandeByCart($demande_id);
        $Bmin=$demande[0]['Bmin'];
        $Bmax=$demande[0]['Bmax'];
        $Ddesc=$demande[0]['Ddesc'];
      
        $wishlist_array=[];
      
         foreach(Cart::instance('wishlist')->content() as $item) 
          {
               $wishlist_array[]=$item->id;
          }
          if(in_array($demande_id,$wishlist_array))
          {
              $response['present']=true;
              $response['message']="Item is already in your wishlist";
          }
          else{
             $result=Cart::instance('wishlist')->add($demande_id,$demande[0]['title'],1,10.1478)->associate(Demande::class);
             if($result)
             {
                 $response['status']= true; 
                 $response['message']="It has been  saved in wishlist";
                 $response['wishlist_count']=Cart::instance('wishlist')->count();
 
                
             }
          }
          return $response ;
 
 
     }

     public function wishlistdelete(Request $request)
            {
                $id=$request->input('rowId');
                Cart::instance('wishlist')->remove($id);
                    $response['status']= true; 
                    $response['message']="Item successfully removed  from your wishlist";
                    $response['cart_count']=Cart::instance('shopping')->count();
                  

                if($request->ajax())
                {
                    $wishlist=view('frontend.wishlist._wishlist')->render();
                    $response['wislist_list']=$wishlist;

                    
                }
                return  $response;

            }

}
