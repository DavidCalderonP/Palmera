<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividad extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'Actividades';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = ['id', 'nombre_actividad', 'descripcion', 'costo', 'tipo_actividad', 'estatus'];

    function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    function getId()
    {
        return $this->id;
    }

    function getNombreActividad()
    {
        return $this->nombre_actividad;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getCosto()
    {
        return $this->costo;
    }

    function getTipoActividad()
    {
        return $this->tipo_actividad;
    }

    function getEstatus()
    {
        return $this->estatus;
    }

//    function obtenerAsignaciones()
//    {
//        return $this->hasMany(ActividadesPorPredio::class, 'id_actividad');
//    }

    function palmeras(){
        return $this->belongsToMany(Palmera::class, 'ActividadesPorPalmeras');
    }
}
