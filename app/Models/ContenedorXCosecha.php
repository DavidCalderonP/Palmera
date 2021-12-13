<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContenedoresXCosecha extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'ContenedoresXCosecha';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','id_contenedor','id_cosecha','cantidad_ingreso','cantidad_vendida', 'fecha_ingreso'];

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
    
    function getIdContenedor(){
        return $this->id_contenedor;
    }
    function setIdContenedor($id_contenedor){
        $this->id_contenedor = $id_contenedor;
    }
    function getIdCosecha(){
        return $this->id_cosecha;
    }
    function setIdCosecha($id_cosecha){
        $this->id_cosecha = $id_cosecha;
    }

    function getCantidadIngreso(){
        return $this->cantidad_ingreso;
    }
    function setCantidadIngreso($cantidad_ingreso){
        $this->cantidad_ingreso = $cantidad_ingreso;
    }
    function getCantidadVendida(){
        return $this->cantidad_vendida;
    }
    function setCantidad_Vendida($cantidad_vendida){
        $this->cantidad_vendida = $cantidad_vendida;
    }
    function getFechaIngreso(){
        return $this->fecha_ingreso;
    }
    function setFechaIngreso($fecha_ingreso){
        $this->fecha_ingreso = $fecha_ingreso;
    }

    function contenedorXcosecha(){
        return $this->belongsTo(Contenedores::class, 'id_contenedor');
    }
    function contenedorXcosecha(){
        return $this->belongsTo(Cosecha::class, 'id_cosecha');
    }
}
