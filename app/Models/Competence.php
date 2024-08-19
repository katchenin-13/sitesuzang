<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Competence extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'titre',
        'extrait',
        'title',
    
        
        // 'contenu',
        // 'imageUrl'
      

     
   ];
    public $translatable = ['title'];

   protected $table = "competences";
}
