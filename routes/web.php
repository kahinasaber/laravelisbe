<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\panierController;
use App\Http\Controllers\categoriescontroller;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/produits', function () {
    return view('produit');
});*/

//declarer une route qui communique ave un controller TestController
Route::get('/test',[TestController::class,'index'])->name("test");

Route::get("/accueil/{x}/page/{y?}",[SiteController::class,'accueil'])->name("accueil");
Route::get("/contact",[SiteController::class,'contact'])->name("contact");

Route::get('/{date}/{num}', [OrderController::class, 'show'])
->name('order.show')
->where(["date"=>"[0-9]{2}-[0-9]{2}-[0-9]{4}","num"=>"[0-9]{1,4}"]);

Route::get("/",[WebsiteController::class,'accueil'])->name('website.accueil');
Route::get("/presentation",[WebsiteController::class,'presentation'])->name('website.presentation');
Route::get("/produits",[WebsiteController::class,'produits'])->name('website.produits');

Route::get("/contact",[WebsiteController::class,'contact'])->name('website.contact');
Route::post("/contact/save",[WebsiteController::class,'save'])->name("website.save");

//les route dedans seront accesseble que pour les utilisateurs uthentifies
//Route::middleware(['auth'])->group(function () {

    //cette ligne genere 7 routes
Route::resource('categories',categoriescontroller::class)->middleware("auth");
Route::resource('products',ProductsController::class)->middleware("auth");

//});

Route::post("panier/addtocart",[panierController::class,"addToCart"])->name("panier.addtocart");
Route::get("panier",[panierController::class,"panier"])->name("panier.panier");
Route::get("panier/delete/{indice}",[panierController::class,"delprodpanier"])->name("panier.delprodpanier");
Route::get("panier/vide",[panierController::class,"viderpanier"])->name("panier.viderpanier");


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
