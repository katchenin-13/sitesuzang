<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contenu extends Model
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
        'imageUrl',
        'type',
        'page',
        'user_id'

      
    ];
    public $translatable = ['title,extraitang,contenus'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $table = "contenus";
}
