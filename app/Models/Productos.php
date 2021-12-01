<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['nombre_datil','tipo_cosecha','descripcion','cantidad_actual','precio'];

}
