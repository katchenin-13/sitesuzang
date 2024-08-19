<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'titre',
        'extrait',
        'title',
        'extraitang',
        'links1',
        // 'contenu',
        'imageUrl'
      
     
   ];
public $translatable = ['title,extraitang'];
   protected $table = "clients";
}
