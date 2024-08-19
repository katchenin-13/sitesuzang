<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'telephone',
        'objet',
        'adresse', 
        'msg' 
     ];
    protected $table = "contacts";

    public static function getContact(){
        $record = DB::table('contacts')->select( 'id','nom', 'telephone','objet','adresse' )->get()->toArray();
        return $record;
    }
   
}
