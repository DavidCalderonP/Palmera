<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActividadesPorPredio extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'ActividadesPorPalmeras';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id', 'palmera_id', 'actividad_id', 'anio', 'fecha_programada', 'fecha_ejecucion', 'empleado_programo', 'empleado_ejecuto', 'costo', 'estatus'];

    function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getId(){
        return $this->id;
    }

    public function getIdPalmera(){
        return $this->palmera_id;
    }

    public function getIdActividad(){
        return $this->actividad_id;
    }

    public function getAnio(){
        return $this->anio;
    }

    public function getFechaProgramada(){
        return $this->fecha_programada;
    }

    public function getFechaEjecucion(){
        return $this->fecha_ejecucion;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getEstatus(){
        return $this->estatus;
    }

    public function getEmpleadoProgramo(){
        return $this->empleado_programo;
    }

    public function getEmpleadoEjecuto(){
        return $this->empleado_ejecuto;
    }
}
