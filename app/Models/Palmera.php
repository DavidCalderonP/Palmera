<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Palmera extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;
    protected $table = 'Palmeras';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id','tipo_palmera','predio_id','tipo_datil','estatus'];

    function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    function getId(){
        return $this->id;
    }
    function getTipoPalmera(){
        return $this->tipo_palmera;
    }
    function getPredioId(){
        return $this->predio_id;
    }
    function getTipoDatil(){
        return $this->tipo_datil;
    }
    function getEstatus(){
        return $this->estatus;
    }
    function predio(){
        return $this->belongsTo(Predio::class, 'predio_id');
    }

}
