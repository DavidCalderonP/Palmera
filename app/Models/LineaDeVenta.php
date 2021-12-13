<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineaDeVenta extends Model {
  use SoftDeletes;
  use HasFactory;

  public $timestamps = true;
  protected $table = 'LineaDeVenta';
  protected $primaryKey = 'folio';
  protected $keyType= 'int';
  protected $fillable = ['folio', 'id_contenedor', 'cantidad', 'precio']

  function __construct($lineadeventa = array()) {
    parent:: __construct($lineadeventa);
  }

  function getFolio() {
    return $this->folio;
  }

  function setFolio($folio) {
    $this->folio = $folio;
  }

  function getIdContenedor() {
    return $this->id_contenedor;
  }

  function setIdContenedor($id_contenedor) {
    $this->id_contenedor = $id_contenedor;
  }

  function getCantidad() {
    return $this->cantidad;
  }

  function setFolio($cantidad) {
    $this->cantidad = $cantidad;
  }

  function getPrecio() {
    return $this->precio;
  }

  function setPrecio($precio) {
    $this->precio = $precio;
  }

  function contenedor() {
    return $this->hasOne(Contenedor::class, 'id', 'id_contenedor');
  }
}