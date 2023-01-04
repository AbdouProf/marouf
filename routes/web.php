<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DemandeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('get-states-by-country', [DemandeController::class, 'getState']);



Route::get('/master', function () {
    return view('frontend/layouts/master');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('backend/profil/profiltest');
});



Route::get('/demandeee', function () {
    return view('backend/demande/index');
});

Route::get('/demandec', function () {
    return view('backend/demande/create');
});


Route::get('/myoff', function () {
    return view('backend/offre/mesoff');
});


Route::get('/listedemande', function () {
    return view('backend/demande/list');
});

Route::get('/avis', function () {
    return view('backend/avis/review');
});


/*Route::get('/review', function () {
    return view('backend/demande/detail');
});*/

Route::get('/mydemande', function () {
    return view('backend/demande/mesdemandes');
});

/*Route::get('/dashadmin', function () {
    return view('admin/admindash');
}); */


Route::get('/listeoffre', function () {
    return view('backend/offre/liste');
});



Auth::routes();

//Route::get('/', [App\Http\Controllers\Frontend\IndexController::class,'home'])->name('home')->middleware('2fa');

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class,'home'])->name('home');

Route::get('user/auth',[App\Http\Controllers\Frontend\IndexController::class,'userAuth'])->name('user.auth');
Route::post('user/register',[App\Http\Controllers\Frontend\IndexController::class,'registerSubmit'])->name('register.submit');
Route::post('user/login',[App\Http\Controllers\Frontend\IndexController::class,'loginSubmit'])->name('login.submit');
Route::get('user/logout',[App\Http\Controllers\Frontend\IndexController::class,'userLogout'])->name('user.logout');

//Route::get('/profiletest',[App\Http\Controllers\Frontend\IndexController::class,'userAccountTest'])->name('user.accountt');



Route::get('/det/{title}',[App\Http\Controllers\DemandeController::class,'DemandeDetail'])->name('det');




Route::post('paiement-paied',[App\Http\Controllers\PaiementController::class,'PaiedPaiement'])->name('paiement.paied');

Route::get('/export-pdf',[App\Http\Controllers\PaiementController::class,'downloadPdf'])->name('export-pdf');
Route::get('/export-allpdf',[App\Http\Controllers\PaiementController::class,'allPdf'])->name('export-allpdf');






Route::get('/All',[App\Http\Controllers\DemandeController::class,'ShowAllDemande'])->name('demande.showall');
Route::post('demande-filter',[App\Http\Controllers\DemandeController::class,'DemandeFilter'])->name('demande.filter');



Route::get('/detail/{title}', [App\Http\Controllers\DemandeController::class,'DemandeDetai'])->name('demande.detail');


/*Route::resource('/demande',DemandeController::class);
Route::post('productstatus',[App\Http\Controllers\DemandeController::class,'demandeStatus'])->name('demande.status');*/


Route::get('wishlist',[App\Http\Controllers\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[App\Http\Controllers\WishlistController::class,'wishliststore'])->name('wishlist.store');
Route::post('wishlist/delete',[App\Http\Controllers\WishlistController::class,'wishlistdelete'])->name('wishlist.delete');


Route::get('search',[App\Http\Controllers\DemandeController::class,'search'])->name('search');

Route::get('bannersearch',[App\Http\Controllers\Frontend\IndexController::class,'search'])->name('bannersearch');

Route::get('akthili',[App\Http\Controllers\DemandeController::class,'ShowAllDemandeAkthili'])->name('search.akthili');
Route::get('livrili',[App\Http\Controllers\DemandeController::class,'ShowAllDemandeLivrili'])->name('search.livrili');
Route::get('wasalni',[App\Http\Controllers\DemandeController::class,'ShowAllDemandeWasalni'])->name('search.wasalni');




Route::get('trier-filter',[App\Http\Controllers\DemandeController::class,'TrierFilter'])->name('Trier.Filter');


//contacter-nous
Route::get('contact-us', [App\Http\Controllers\Frontend\IndexController::class,'contactUs'])->name('contact.us');
Route::post('contact-us', [App\Http\Controllers\Frontend\IndexController::class,'contactSubmit'])->name('contact.submit');




Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

Route::get('forget-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');






//Route::get('/', [App\Http\Controllers\Frontend\IndexController::class,'home'])->name('home');


//admin login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>['admin']],
function()
{

    Route::get('/paiementadmin',[App\Http\Controllers\PaiementController::class,'ShowPaiementAdmin'])->name('paiement.admin');
    Route::get('/allpaiement',[App\Http\Controllers\PaiementController::class,'AllPaiementAdmin'])->name('paiement.all');
    Route::get('/demadmin',[App\Http\Controllers\DemandeController::class,'ShowDemandeAdmin'])->name('demande.admin');
    Route::post('demande-verified',[App\Http\Controllers\DemandeController::class,'DemandeVerified'])->name('demande.verified');

    Route::post('/demande_rapport/{id}',[App\Http\Controllers\DemandeController::class,'RapportDemande'])->name('demande.rap');

    Route::get('/adminrecdet/{id}',[App\Http\Controllers\ReclamationController::class,'AdminRecDet'])->name('admin.recdet');
    Route::post('adminrec/{id}',[App\Http\Controllers\ReclamationController::class,'AdminRecStore'])->name('admin.rec');   
    Route::get('/recs',[App\Http\Controllers\ReclamationController::class,'AdminAllRec'])->name('admin.allrec');  

    Route::post('/clorec/{id}',[App\Http\Controllers\ReclamationController::class,'CloturerReclamation'])->name('clo.rec');
    Route::post('/refund/{id}',[App\Http\Controllers\ReclamationController::class,'RefundReclamation'])->name('refund.rec');


    Route::get('/admindash',[App\Http\Controllers\AdminController::class,'index'])->name('admin-dash');



});


Route::group(['middleware'=>['user']],
function()
{
    Route::get('/userdash',[App\Http\Controllers\Frontend\IndexController::class,'userdash'])->name('user-dash');

    Route::get('/profile',[App\Http\Controllers\Frontend\IndexController::class,'userAccount'])->name('user.account');
    Route::post('/update/profile/{id}',[App\Http\Controllers\Frontend\IndexController::class,'updateAccount'])->name('update.account');
    Route::post('/update/password/{id}',[App\Http\Controllers\Frontend\IndexController::class,'updatePassword'])->name('update.password');



    Route::get('/demandecc',[App\Http\Controllers\DemandeController::class,'index'])->name('demande.create');
    Route::post('/demandeccc',[App\Http\Controllers\DemandeController::class,'store'])->name('demande.store');
    Route::get('/mesdem',[App\Http\Controllers\DemandeController::class,'ShowDemande'])->name('demande.show');


    
    Route::get('/offcontact/{id}',[App\Http\Controllers\OffreController::class,'OffreContact'])->name('off-contact');
    Route::post('offcontacts/{id}',[App\Http\Controllers\OffreController::class,'OffrecontactStore'])->name('offre.com');   
    
    Route::delete('/mesdem/{id}',[App\Http\Controllers\DemandeController::class,'destroy'])->name('demande.delete');

    Route::get('/list/{title}', [App\Http\Controllers\OffreController::class,'ListOffre'])->name('offre.list');

    Route::get('/offreuserreview', [App\Http\Controllers\OffreController::class,'MyOffreReviews'])->name('offre.userreview');



    Route::post('/accept/{id}',[App\Http\Controllers\OffreController::class,'AcceptOffre'])->name('offre.accept');

    Route::post('/refused',[App\Http\Controllers\OffreController::class,'OffreRefused'])->name('offre.refused');
    Route::delete('/list/{id}',[App\Http\Controllers\OffreController::class,'destroy'])->name('offre.delete');

    Route::post('offre-review/{id}',[App\Http\Controllers\OffreController::class,'OffreReview'])->name('offre.review');
    Route::post('offre-cancel/{id}',[App\Http\Controllers\OffreController::class,'OffreCancel'])->name('offre.cancel');

    Route::post('offre-rec/{id}',[App\Http\Controllers\ReclamationController::class,'store'])->name('offre.rec');


    Route::post('cancel-accept/{id}',[App\Http\Controllers\OffreController::class,'OffreCancelAccept'])->name('accept.cancel');

    Route::post('cancel-refuse/{id}',[App\Http\Controllers\OffreController::class,'OffreCancelRefuse'])->name('refuse.cancel');

    Route::post('/update/offre/{id}',[App\Http\Controllers\OffreController::class,'OffreRefuse'])->name('update.offre');


    Route::get('/edit/{id}', [App\Http\Controllers\DemandeController::class,'edit'])->name('demande.edit');
    Route::post('/update/demande/{id}',[App\Http\Controllers\DemandeController::class,'update'])->name('demande.update');


    Route::get('/checkout',[App\Http\Controllers\CheckoutController::class,'Index'])->name('checkout.offre');
    Route::post('/pay',[App\Http\Controllers\CheckoutController::class,'stripePost'])->name('stripe.post');


    Route::post('/offre',[App\Http\Controllers\OffreController::class,'store'])->name('offre.store');

    Route::get('/mesoffre',[App\Http\Controllers\OffreController::class,'ShowOffre'])->name('offre.show');  
    Route::get('/encours',[App\Http\Controllers\OffreController::class,'ShowOffreencours'])->name('offreencours.show');  
    Route::get('/refuser',[App\Http\Controllers\OffreController::class,'ShowOffrrefuser'])->name('offrerefuser.show');
    Route::get('/cloturer',[App\Http\Controllers\OffreController::class,'ShowOffrrecloture'])->name('offrecloturer.show');  
  



    Route::get('/userpay',[App\Http\Controllers\PaiementController::class,'userPaiement'])->name('userpay');
    Route::post('/paiements',[App\Http\Controllers\PaiementController::class,'store'])->name('paiement.store');
    Route::get('/paiement',[App\Http\Controllers\PaiementController::class,'index'])->name('pay');
    Route::post('user-review',[App\Http\Controllers\Frontend\IndexController::class,'UserReview'])->name('user.review');
    Route::get('/userreviews',[App\Http\Controllers\Frontend\IndexController::class,'ShowReview'])->name('users.reviews');


    Route::get('/allrec',[App\Http\Controllers\ReclamationController::class,'AllRec'])->name('all.rec');  
    Route::get('/recdet/{id}',[App\Http\Controllers\ReclamationController::class,'RecDet'])->name('rec-det');

    




});

