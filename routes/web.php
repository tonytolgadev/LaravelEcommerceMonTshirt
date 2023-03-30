<?php

use Illuminate\Support\Facades\Route; // la classe Illuminate\Support\Facades\Route est utilisée pour définir des routes dans l'application. Les routes sont utilisées pour diriger les requêtes HTTP reçues vers les contrôleurs appropriés de votre application.
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\MainController;

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

// Route::get('/', "App\Http\Controllers\Shop\MainController@index");




Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[MainController::class,'index'])->name('homepage');
Route::get('/produit/{id}',[MainController::class,'produit'])->name('voir_produit');
Route::get('/categorie/{id}',[MainController::class,'viewByCategory'])->name('voir_produit_par_cat');

Route::get('/tag/{id}',[MainController::class,'viewByTag'])->name('voir_produit_par_tag');
Route::post('/panier/add/{id}',[CartController::class,'add'])->name('cart_add');
Route::get('/panier',[CartController::class,'index'])->name('cart_index');
Route::get('/suppdupanier/{id}', [CartController::class, 'suppdupanier']);
Route::post('/modifier_quant/{id}', [CartController::class, 'modifier_quant']);
Route::get('/paiement', [CartController::class, 'paiement']);
Route::get('/login1', [CartController::class, 'login']);
Route::get('/signup', [CartController::class, 'signup']);

// Route::get('/admin',[AdminController::class,'dashboard']);

Route::post('/creer_compte', [ClientController::class, 'creer_compte']);
Route::post('/acceder_compte', [ClientController::class, 'acceder_compte']);
Route::get('/logout', [ClientController::class, 'logout']);
Route::post('/payer', [ClientController::class, 'payer']);




Route::group(['middleware' => 'auth'], function(){

    Route::get('/addcategory', [CategoryController::class, 'addcategory']);
    Route::get('/categories', [CategoryController::class, 'categories']);
    Route::post('/savecategory', [CategoryController::class, 'savecategory']);
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category']);
    Route::post('/updatecategory', [CategoryController::class, 'updatecategory']);
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category']);

    Route::get('/orders', [ClientController::class, 'commandes']);


    Route::get('/addproduct', [ProductController::class, 'addproduct']);
    Route::post('/saveproduct', [ProductController::class, 'saveproduct']);
    Route::get('/products', [ProductController::class, 'products']);
    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product']);
    Route::post('/updateproduct', [ProductController::class, 'updateproduct']);
    Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);

    Route::get('/delete_commandes/{id}', [CommandeController::class, 'delete_commandes']);


});

// Route::get('/ajouteraupanier/{id}', [ProductController::class, 'ajouteraupanier']);

// Route::get('/activer_product/{id}', [ProductController::class, 'activer_product']);
// Route::get('/desactiver_product/{id}', [ProductController::class, 'desactiver_product']);

// Route::get('/voircommandepdf/{id}', [PdfController::class, 'view_pdf']);

// Route::get('/delete_orders/{id}', [OrderController::class, 'delete_orders']);



// Route::get('/produit/{id}',[MainController::class,'produit'])->name('voir_produit');
// route::get('/category/{id}',[MainController::class,'category'])->name('voir_produits_par_cat');
// route::get('/tag/{id}',[MainController::class,'ByTag'])->name('voir_produits_par_tag');
// route::get('/panier/add',[CartController::class,'add'])->name('cart_add');
// route::get('/panier',[CartController::class,'index'])->name('cart_index');


