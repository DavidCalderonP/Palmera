<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suelo extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'Suelos';
    protected $primaryKey = 'id';
    //protected $keyType = 'int'; Lo usamos cuando la llave primaria no es de tipo enteroexit

    function predios(){
        return $this->hasMany(Predio::class, 'tipo_de_suelo');
    }
}
