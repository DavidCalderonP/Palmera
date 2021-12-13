<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model {
  use SoftDeletes;
  use HasFactory;

  public $timestamps = true;
  protected $table = 'Ventas';
  protected $primaryKey = 'folio';
  protected $keyType= 'int';
  protected $fillable = ['folio', 'fecha_venta', 'fecha_entrega', 'id_cliente', 'id_empleado', 'estatus']

  function __construct($lineadeventa = array()) {
    parent:: __construct($lineadeventa);
  }

  function getFolio() {
    return $this->folio;
  }

  function setFolio($folio) {
    $this->folio = $folio;
  }

  function getFechaVenta() {
    return $this->fecha_venta;
  }

  function setFechaVenta($fecha_venta) {
    $this->fecha_venta = $fecha_venta;
  }

  function getFechaEntrega() {
    return $this->fecha_entrega;
  }

  function setFechaEntrega($fecha_entrega) {
    $this->fecha_entrega = $fecha_entrega;
  }

  function getIdCliente() {
    return $this->id_cliente;
  }

  function setIdCliente($id_cliente) {
    $this->id_cliente = $id_cliente;
  }

  function getIdEmpleado() {
    return $this->id_empleado;
  }

  function setIdEmpleado($id_empleado) {
    $this->id_empleado = $id_empleado;
  }

  function getEstatus() {
    return $this->estatus;
  }

  function setEstatus($estatus) {
    $this->estatus = $estatus;
  }
}