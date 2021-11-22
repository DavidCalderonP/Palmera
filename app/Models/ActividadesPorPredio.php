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
    protected $fillable = ['id', 'id_palmera', 'id_actividad', 'anio', 'fecha_programada', 'fecha_ejecucion', 'costo', 'estatus'];

    function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getId(){
        return $this->id;
    }

    public function getIdPalmera(){
        return $this->id_palmera;
    }

    public function getIdActividad(){
        return $this->id_actividad;
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

    public function actividades(){
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }
}
