<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {
  use HasFactory;

  public $timestaps = true;
  protected $table = 'Carrito';
  protected $primaryKey = 'id';
  protected $keyType = 'int';
  protected $fillable = ['id', 'cantidad', 'id_variedad', 'id_cliente'];

  function __construct($carrito = array()) {
    parent::__construct($carrito);
  }

  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }

  function getCantidad() {
    return $this->cantidad;
  }

  function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
  }

  function getIdVariedad() {
    return $this->id_variedad;
  }

  function setIdVariedad($idVariedad) {
    $this->id_variedad = $idVariedad;
  }

  function getIdCliente() {
    return $this->id_cliente;
  }

  function setIdCliente($idCliente) {
    $this->id_cliente = $idCliente;
  }

  function productos() {
    return $this->hasOne(Producto::class, 'idVariedad','id_variedad');
  }

  function clientes() {
    return $this->belongsTo(User::class, 'id_cliente');
  }
}