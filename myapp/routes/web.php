<?php

use App\Http\Controllers\MarquesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
  return view('welcome');
});


/* -------------------------------------------------------------------------- */
/*                 tp0 -- http://127.0.0.1:8000/bonjour/h-name                */
/* -------------------------------------------------------------------------- */
Route::get('/bonjour/{g}-{nom}', function ($g, $n) {
  $genre = "";
  if ($g == "h")
    $genre = "monsieur";
  elseif ($g == "f")
    $genre = "madame";
  else
    $genre = $g;

  return view('tp0/name', compact('genre', 'n'));
});


/* -------------------------------------------------------------------------- */
/*                      tp1 -- http://127.0.0.1:8000/user                     */
/* -------------------------------------------------------------------------- */
Route::get('/user', [PagesController::class, "AfficherUsers"])->name('users');



/* -------------------------------------------------------------------------- */
/*             tp2    --    http://127.0.0.1:8000/home                        */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/*                         http://127.0.0.1:8000/forum                        */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/*                      http://127.0.0.1:8000/contact-us                      */
/* -------------------------------------------------------------------------- */

Route::get('/home', [PagesController::class, "home"])->name('accueil');
Route::get('/forum', [PagesController::class, "forum"])->name('forum');
Route::get('/contact-us', [PagesController::class, "contact_us"])->name('contact-us');
//Route::get('/contact-us', function () {
//  return view('tp1/contact-us');
//})->name('contact-us');;


/* -------------------------------------------------------------------------- */
/*                tp3 -- http://127.0.0.1:8000/category                */
/* -------------------------------------------------------------------------- */
Route::get('/category', [PagesController::class, 'AfficherCategories']);
Route::get('/category/{nom}', [PagesController::class, "Rechercher"]);



/* -------------------------------------------------------------------------- */
/*                    tp4 -- http://127.0.0.1:8000/products                   */
/* -------------------------------------------------------------------------- */
Route::middleware(['web'])->group(function () {
  Route::resource('products', ProductController::class);
});
/*
Route::get ('/nouveau', [PagesController::class,"formulaire"]);
Route::post ('/inserer', [PagesController::class,"inserer"]);
Route::get('/produit', [PagesController::class,"liste"]);
Route::get('/modifier/{id}', [PagesController::class,"modifier"]);
Route::post ('/enregister', [PagesController::class,"enregister"]);
Route::get('/delete/{id}', [PagesController::class,"delete"]);
*/


/* -------------------------------------------------------------------------- */
/*                     tp5 -- http://127.0.0.1:8000/marque                    */
/* -------------------------------------------------------------------------- */
Route::resource('marque', MarquesController::class);