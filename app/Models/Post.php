<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
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
        'categorie_id'  
    ];
    public $translatable = ['title,extraitang,contenus'];

    protected $table = "posts";
    // public function candidats(){
    //     return $this->belongsToMany(User::class, "candidat_post", "post_id", "candidat_id");
    // }
    public function candidats(){
        return $this->hasMany(Candidat::class);
    }
    public function categorie(){
        return $this->belongsTo(Post::class, "categorie_id", "id");
    }
}
