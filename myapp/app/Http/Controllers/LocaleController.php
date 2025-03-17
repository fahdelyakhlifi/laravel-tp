<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /* -------------------------------------------------------------------------- */
    /*                     tp8 -- http://127.0.0.1:8000/locale                    */
    /* -------------------------------------------------------------------------- */
    public function setLocale(Request $request)
    {
        $lang = $request->query('lang');// Récupérer la langue depuis l'URL

        if (!in_array($lang, ['en', 'fr', 'ar'])) {

            // Retourner une erreur bad request (400) avec un message d'erreur personnalisé
            abort(400, "Langue non autorisée !");

        }


        // Si la langue est autorisee
        if (in_array($lang, ['en', 'fr', 'ar'])) {

            // Changer la langue de l'application
            App::setLocale($lang);

            // Stocke la langue dans la session
            Session::put('locale', $lang);
        }

        // Revenir à la page précédente
        return redirect()->back();
    }

    /* -------------------------------------------------------------------------- */
    /*                    tp7 -- http://127.0.0.1:8000/laptops                    */
    /* -------------------------------------------------------------------------- */
    // public function Locale(Request $request)
    // {

    //     $lang = $request->query('lang');// Récupérer la langue depuis l'URL


    //     //Vérifier si la langue est autorisée
    //     if (in_array($lang, ['en', 'fr', 'ar'])) {

    //         //changer la langue de l'application
    //         App::setLocale($lang);

    //         //stocke la langue dans la session
    //         Session::put('locale', $lang);
    //     }

    //     //Revenir à la page précédente
    //     return back();
    // }
}