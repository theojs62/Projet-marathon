<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\OeuvreController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AccueilController::class, 'indexSansConnexion'])->name('accueil');

Route::get('/home', [AccueilController::class, 'indexAvecConnexion'])->middleware(['auth'])->name('home');

Route::resource('/salle',SalleController::class);

Route::POST("/addcomm/{id}", [CommentaireController::class, 'store'])->name("commentaire.store");

Route::get('/auteurs/{id}', [AuteurController::class, 'show'])->name('auteurs.show');

Route::resource('/users', UserController::class);

Route::resource('/oeuvres',OeuvreController::class);

#Route::resource('/commentaire',OeuvreController::class);
