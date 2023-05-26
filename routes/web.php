<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/**Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {//page d'accueil
    return view('cover_page');
});


Route::get('/admin/dashboard', function () {//tableau de bord administrateur
    return view('administrateur.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/menu', [\App\Http\Controllers\Administrateur\MenuController::class, 'index'])->name('menu');//liste des catégories
Route::post('/admin/ajout/categorie', [\App\Http\Controllers\Administrateur\MenuController::class, 'store'])->name('ajout.categorie');//ajouter une catégorie
Route::get('/admin/edit/categorie/{id}', [\App\Http\Controllers\Administrateur\MenuController::class, 'edit'])->name('edit.categorie');//afficher une catégorie
Route::post('/admin/update/categorie/{id}', [\App\Http\Controllers\Administrateur\MenuController::class, 'update'])->name('update.categorie');//modifier une catégorie
Route::get('/admin/delete/categorie/{id}', [\App\Http\Controllers\Administrateur\MenuController::class, 'destroy'])->name('delete.categorie');//supprimer une catégorie

Route::get('/admin/liste/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'index'])->name('produits');//liste de produits d'une catégorie
Route::post('/admin/ajout/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'store'])->name('ajout.produit');//ajouter d'un produit
Route::get('/admin/modif_statut/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'modif_statut'])->name('modif_statut.produit');//retirer ou afficher le produit au menu
Route::get('/admin/edit/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'edit'])->name('edit.produit');//afficher un produit
Route::post('/admin/update/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'update'])->name('update.produit');//modifier un produit
Route::get('/admin/delete/produit/{id}', [\App\Http\Controllers\Administrateur\Produit\ProduitController::class, 'destroy'])->name('delete.produit');//supprimer un produit



Route::get('/client/panel', [\App\Http\Controllers\Client\PanelController::class, 'index'])->name('client.panel');//liste des catégories
Route::post('/client/reservation', [\App\Http\Controllers\Client\PanelController::class, 'reservation'])->name('client.reservation');//faire une réservation
Route::post('/client/ajout/panier/produit/{id}', [\App\Http\Controllers\Client\PanierController::class, 'add'])->name('ajout.panier');//ajouter au panier
Route::get('/client/liste/panier', [\App\Http\Controllers\Client\PanierController::class, 'index'])->name('liste.panier');//liste des produit dans le panier
Route::post('/client/update/produit/panier/{id}', [\App\Http\Controllers\Client\PanierController::class, 'update'])->name('update_panier.produit');//modifier un produit du panier
Route::get('/client/delete/produit/panier/{id}', [\App\Http\Controllers\Client\PanierController::class, 'destroy'])->name('delete_panier.produit');//supprimer un produit du panier
Route::post('/client/commande', [\App\Http\Controllers\Client\PanierController::class, 'commande'])->name('client.commande');//supprimer un produit du panier

require __DIR__.'/auth.php';
