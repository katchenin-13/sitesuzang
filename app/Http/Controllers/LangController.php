<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class LangController extends Controller
{
    public function lang()
    {
        return view('lang');
    }
    public function changeLangStatus(Request $request)
    {
        //dd($request);
        // Logique pour changer le statut de la langue via jQuery
        $newLang = $request->input('lang');
       
        // Valider que la langue est valide
        if (!in_array($newLang, ['fr', 'en'])) {
            return response()->json(['error' => 'Langue invalide'], 400);
        }
         
        // Mettre à jour le statut de toutes les langues
        Lang::where('status', 'active')->update(['status' => 'inactive']);
        dd(Lang::where('status', 'active')->update(['status' => 'inactive']));
    
        // Mettre à jour le statut de la nouvelle langue
        Lang::where('langue', $newLang)->update(['status' => 'active']);
        //App::setLocale($request->lang);
        return response()->json(['success' => 'Langue changée avec succès'], 200);
       
    }
    

   
}
