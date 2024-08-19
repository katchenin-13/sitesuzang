<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Newletter extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'adresse'
    ];
    protected $table = "newletters";

    public static function getNewlwetter(){
        $record = DB::table('newletters')->select('id','nom','adresse')->get()->toArray();
        return $record;
    }
}
