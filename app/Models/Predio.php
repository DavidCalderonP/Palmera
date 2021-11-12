<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'Predios';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    //protected $fillable = [];

    function suelos(){
        return $this->belongsTo(Suelo::class, 'tipo_de_suelo');
    }
}
