<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model {
  use HasFactory;
  public $timestaps = true;
  protected $table = 'Pagos';
  protected $primaryKey = 'folio';
  protected $keyType = 'int';
  protected $fillable = ['folio', 'fecha_pago', 'monto'];

  function __construct($pago = array()) {
    parten::__construct($pago);
  }

  function getFolio() {
    return $this->folio;
  }

  function setFolio($folio) {
    $this->folio = $folio;
  }

  function getFecha_pago() {
    return $this->fecha_pago;
  }

  function setFecha_pago($fecha_pago) {
    $this->fecha_pago = $fecha_pago;
  }

  function getMonto() {
    return $this->monto;
  }

  function setMonto($monto) {
    $this->monto = $monto;
  }
}