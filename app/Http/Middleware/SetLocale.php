<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $language = 'fr'; // Default language

        // // Vérifier si la langue est spécifiée dans la requête
        // if ($request->has('language')) {
        //     $language = $request->input('language');
        //     Cache::put('language', $language);
        // } elseif (Cache::has('language')) {
        //     // Si la langue est mise en cache, la récupérer depuis le cache
        //     $language = Cache::get('language');
        // }
        
        /// Détection de la langue préférée du visiteur
        // $locale = $request->getPreferredLanguage(['en', 'fr']);

        // // Définition de la langue de l'application
        // app()->setLocale($locale);

        // return $next($request);

        // // Définir la langue de l'application
        // app()->setLocale($language);
        app()->setLocale($request->segment(1));
         return $next($request);
    }
}
