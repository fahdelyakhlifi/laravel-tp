<?php

use App\Http\Controllers\MarquesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return view('welcome');
});

Route::get('/bonjour/{g}-{nom}', function ($g,$n) {
    $genre = "";
    if($g == "h")$genre= "monsieur";
    elseif($g == "f")$genre ="madame";
    else $genre =$g;

    return view('name',compact('genre','n') );
});



Route::get('/home',[PagesController::class,"home"])->name('accueil');


Route::get('/forum',[PagesController::class,"forum"])->name('forum');


Route::get('/contact-us', [PagesController::class,"contact_us"])->name('contact-us');
Route::get('/abs', [PagesController::class,"abs"])->name('abs');




//tp3
Route::get ('/products/{n}', [PagesController::class,"affichier"]);


//tp4
Route::get ('/nouveau', [PagesController::class,"formulaire"]);
Route::post ('/inserer', [PagesController::class,"inserer"]);
Route::get('/produit', [PagesController::class,"liste"]);
Route::get('/modifier/{id}', [PagesController::class,"modifier"]);
Route::post ('/enregister', [PagesController::class,"enregister"]);
Route::get('/delete/{id}', [PagesController::class,"delete"]);


//tp5
Route::resource('marque', MarquesController::class);



//Route::get('/contact-us', function () {
  //  return view('tp1/contact-us');
//})->name('contact-us');;

