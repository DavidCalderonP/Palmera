<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contenedores extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'Contenedores';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','cantidad_maxima','cantidad_vendida','cantidad_actual','tipo_cosecha', 'estatus'];

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
    
    function getCantidad_Maxima(){
        return $this->cantidad_maxima;
    }
    function setCantidad_Maxima($cantidad_maxima){
        $this->cantidad_maxima = $cantidad_maxima;
    }

    function getCantidad_Vendida(){
        return $this->cantidad_vendida;
    }
    function setCantidad_Vendida($cantidad_vendida){
        $this->cantidad_vendida = $cantidad_vendida;
    }
    function getCantidad_Actual(){
        return $this->cantidad_actual;
    }
    function setCantidad_Vendida($cantidad_vendida){
        $this->cantidad_vendida = $cantidad_vendida;
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
    function contenedorXcosecha(){
        return $this->hasMany(ContenedorXCosecha::class, 'id');
    }
}
