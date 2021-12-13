<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cosecha extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'Cosecha';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','id_palmera','kilogramos','fecha_cosecha','tipo_cosecha', 'estatus'];

    function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
    
    function getIdPalmera(){
        return $this->id_palmera;
    }
    function setIdPalmera($id_palmera){
        $this->id_palmera = $id_palmera;
    }

    function getKilogramos(){
        return $this->kilogramos;
    }
    function setKilogramos($kilogramos){
        $this->kilogramos = $kilogramos;
    }
    function getKilogramos(){
        return $this->kilogramos;
    }
    function setKilogramos($kilogramos){
        $this->kilogramos = $kilogramos;
    }
    function getTipo_cosecha(){
        return $this->tipo_cosecha;
    }
    function setTipo_cosecha($tipo_cosecha){
        $this->tipo_cosecha = $tipo_cosecha;
    }
    function getEstatus(){
        return $this->estatus;
    }
    function setEstatus($estatus){
        $this->estatus = $estatus;
    }
    function palmera(){
        return $this->belongsTo(Cosecha::class, 'id_palmera');
    }
}
