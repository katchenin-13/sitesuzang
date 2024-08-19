<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Filiale extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'titre',
        'extrait',
        'contenu',
        'title',
        'extraitang',
        'contenus',
        'links1',
        'links2',
        'links3',
        'links4',
        'imageUrl'
      

     
   ];
   protected $table = "filiales";
    public $translatable = ['title,extraitang,contenus'];

}
