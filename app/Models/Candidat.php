<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Candidat extends Model
{
    use HasFactory;
    // public function posts(){
    //     return $this->belongsToMany(User::class, "candidat_post", "candidat_id", "post_id");
    // }
    
    public function posts(){
        return $this->belongsTo(Post::class, "post_id", "id");
    }
    protected $fillable=[
        'nom', 
       'telephone',
       'adresse',
       'post_id',
       'cv'
       
    ];
    
    protected $table = "candidats";
    public static function getCandidat(){
        $record = DB::table('candidats')->select('id','nom','telephone','adresse')->get()->toArray();
        return $record;
    }
}
