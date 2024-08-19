<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atout extends Model
{
    use HasFactory;
    


    protected $fillable = [
        'titre',
        'extrait',
        'contenu',
        'title',
        'extraitang', 
        'contenus'
        // 'imageUrl'
      

     
   ];
   protected $table = "atouts";


    public $translatable = ['title,extraitang,contenus'];
}
