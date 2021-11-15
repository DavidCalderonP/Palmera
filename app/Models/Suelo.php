<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suelo extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'Suelos';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nombre','descripcion'];
    //protected $keyType = 'int'; Lo usamos cuando la llave primaria no es de tipo enteroexit

    function __construct($suelo = array())
    {
        parent::__construct($suelo);
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setDescripcion($descripcion){
        $this->nombre = $descripcion;
    }

    function predios():HasMany{
        return $this->hasMany(Predio::class, 'tipo_de_suelo');
    }

}
