<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MovilController extends Controller
{
    function index(){
        $query = "select nombre_datil as 'Nombre', tipo_cosecha as 'Tipo', descripcion as 'Descripcion', cantidad_actual as 'Actual', ROUND(sum(APPCosto)/cantidad_ingreso, 2) as 'Precio' from test group by PalmeraID order by nombre_datil;						 ";
        return DB::select($query);
    }
}
