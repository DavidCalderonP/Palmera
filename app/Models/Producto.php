<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model {
  //use SoftDeletes;
  use HasFactory;

  public $timestamps = true;
  protected $table = 'VariedadDeDatil';
  protected $primaryKey= 'id';
  protected $keyType = 'int';
  protected $fillable = ['id',
  'nombre_datil',
  'descripcion',
  'costo',
  'tipo_datil',
  'estatus'];
 
  function __construct($producto = array()){
    parent::__construct($producto);
  }

  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }

  function getNombreDatil() {
    return $this->nombre_datil;
  }

  function setNombreDatil($nombre_datil) {
    $this->nombre_datil = $nombre_datil;
  }

  function getDescripcion() {
    return $this->descripcion;
  }

  function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  function getCosto() {
    return $this->costo;
  }

  function setCosto($costo) {
    $this->costo = $costo;
  }

  function getTipo_datil() {
    return $this->tipo_datil;
  }

  function setTipo_datil($tipo_datil) {
    $this->tipo_datil = $tipo_datil;
  }

  function getEstatus() {
    return $this->estatus;
  }

  function setEstatus($estatus) {
    $this->estatus = $estatus;
  }
}