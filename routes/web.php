<?php

use App\Models\lang;
use App\Models\Categorie;
use App\Http\Livewire\PostComp;
use App\Http\Livewire\AtoutComp;
use App\Http\Livewire\ClientComp;
use App\Http\Livewire\ContactComp;
use App\Http\Livewire\ContenuComp;
use App\Http\Livewire\FilialeComp;
use App\Http\Livewire\ServiceComp;
use App\Http\Middleware\SetLocale;
use App\Http\Livewire\CandidatComp;
use App\Http\Livewire\DashbaodComp;
use App\Http\Livewire\Utilisateurs;
use App\Http\Livewire\CategorieComp;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\NewletterComp;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\AtoutComponent;
use App\Http\Livewire\CompetenceComp;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ClientComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\LangController;
use App\Http\Livewire\CarriereComponent;
use App\Http\Livewire\ServicesComponent;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/',HomeComponent::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'getStaticUser'])->name('home');
Route::post('newletter', [HomeComponent::class, 'index']);
Route::post('contact', [ContactComponent::class, 'addContacts']);
Route::post('carriere',[CarriereComponent::class,'index']);
Route::get(' lang', [LangController::class, 'lang'])->name('lang.change');

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
    Route::get('/', HomeComponent::class);
    
});
Route::middleware('setLocale')->group(function () {
   
    Route::get('/{locale}/about', AboutComponent::class)->name('about');
    Route::get('/{locale}/atout', AtoutComponent::class)->name("atout");
    Route::get('/{locale}/service', ServicesComponent::class)->name("service");
    Route::get('/{locale}/client', ClientComponent::class)->name("client");
    Route::get('/{locale}/carriere', CarriereComponent::class)->name("carriere");
    Route::get('/{locale}/contact', ContactComponent::class)->name("contact");
  
    // Ajoutez d'autres routes pour les pages supplémentaires
});

Route::get('/home', [App\Http\Controllers\HomeController::class,'getStaticUser'])->name('home');
// });

// Le groupe des routes relatives aux administrateurs uniquement

Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "compte",
        'as' => 'compte.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");

    });

    Route::group([
        "prefix" => "parametrages",
        'as' => 'parametrages.'
    ], function(){

        Route::get("/contenus", ContenuComp::class)->name("contenus");
        Route::get("/services", ServiceComp::class)->name("services");
        Route::get('/filiales',FilialeComp::class)->name("filiales");
        Route::get('/atouts',AtoutComp::class)->name("atouts");
        Route::get('/clients',ClientComp::class)->name("clients");
        Route::get('/competences',CompetenceComp::class)->name("competences");
    });
    
    Route::group([
        "prefix" => "carriere",
        'as' => 'carriere.'
    ], function(){
        Route::get("/categories", CategorieComp::class)->name("categories");
        Route::get("/posts", PostComp::class)->name("posts");
        Route::get("/candidats", CandidatComp::class)->name("candidats");
        Route::get("/download{file}", [CandidatComp::class,'downloadFile']);
       
       
    });


    Route::group([
        "prefix" => "contact",
        'as' => 'contact.'
    ], function(){

        Route::get("/contact", ContactComp::class)->name("contact");
        Route::get("/newletter", NewletterComp::class)->name("newletter");
        Route::get("/candidats", CandidatComp::class)->name("candidats");        
    });
 
});


Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){
    Route::group([
        "prefix" => "generale",
        'as' => 'generale.'
    ], function(){

        Route::get("/vue", DashbaodComp::class)->name("vue");

    });
});