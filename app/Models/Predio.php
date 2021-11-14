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
    protected $fillable = ['id',
        'metros_cuadrados',
        'numero_palmeras',
        'tipo_de_suelo',
        'ph',
        'salinidad',
        'tipo_de_predio',
        'descripcion',
        'fecha_creacion',
        'latitud',
        'longitud',
        'estatus'];

    function suelos()
    {
        return $this->belongsTo(Suelo::class, 'tipo_de_suelo');
    }

    function setId($id){
        $this->id = $id;
    }
}
