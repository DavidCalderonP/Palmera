<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Predio extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'Predios';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id', 'metros_cuadrados', 'numero_palmeras', 'tipo_de_suelo', 'ph', 'salinidad', 'tipo_de_predio', 'descripcion', 'fecha_creacion', 'latitud', 'longitud', 'estatus'];

//    private $id;
//    private $metros_cuadrados;
//    private $numero_palmeras;
//    private $tipo_de_suelo;
//    private $ph;
//    private $salinidad;
//    private $tipo_de_predio;
//    private $descripcion;
//    private $fecha_creacion;
//    private $latitud;
//    private $longitud;
//    private $estatus;

    function __construct($predio = array())
    {
        parent::__construct($predio);
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getMetrosCuadrados()
    {
        return $this->metros_cuadrados;
    }

    function setMetrosCuadrados($metros_cuadrados)
    {
        $this->metros_cuadrados = $metros_cuadrados;
    }

    function getNumeroDePalmeras()
    {
        return $this->numero_palmeras;
    }

    function setNumeroDePalmeras($numero_palmeras)
    {
        $this->numero_palmeras = $numero_palmeras;
    }

    function getTipoDeSuelo()
    {
        return $this->tipo_de_suelo;
    }

    function setTipoDeSuelo($tipo_de_suelo)
    {
        $this->tipo_de_suelo = $tipo_de_suelo;
    }

    function getPh()
    {
        return $this->ph;
    }

    function setPh($ph)
    {
        $this->ph = $ph;
    }

    function getSalinidad()
    {
        return $this->salinidad;
    }

    function setSalinidad($salinidad)
    {
        $this->salinidad = $salinidad;
    }

    function getTipoDePredio()
    {
        return $this->tipo_de_predio;
    }

    function setTipoDePredio($tipo_de_predio)
    {
        $this->tipo_de_predio = $tipo_de_predio;

    }

    function getLatitud()
    {
        return $this->latitud;
    }

    function getLongitud()
    {
        return $this->longitud;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    function getEstatus()
    {
        return $this->estatus;
    }

    function suelos()
    {
        return $this->belongsTo(Suelo::class, 'tipo_de_suelo');
    }

}
