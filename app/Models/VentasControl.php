<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasControl extends Model {
  public $timestamps = false;
  protected $table = 'VentasControl';
  protected $primaryKey= 'id';
  protected $keyType = 'int';
  protected $fillable = ['id'];

  function __construct($ventasControl = array()) {
    parent::__construct($ventasControl);
  }

  function getId() {
    return $this->id;
  }

  function setId($id) {
    $this->id = $id;
  }
}