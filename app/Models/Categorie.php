<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }
    protected $fillable=['titre' ];
    
    protected $table = "categories";
}
