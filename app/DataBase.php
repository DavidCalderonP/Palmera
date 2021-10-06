<?php

namespace App;

use Illuminate\Support\Facades\DB;

class DataBase {

    function getPredios(){
        $predios = [];
        $query = DB::select('select * from predio');
        foreach ($query as $row) {
            $predios[] = new Predio(
                $row->metros_cuadrados,
                $row->palmeras_destinadas,
                $row->tipo_de_suelo,
                $row->temperatura,
                $row->clima,
                $row->humedad,
                $row->ph,
                $row->salinidad,
                $row->tipo_de_predio,
                $row->id
            );
        }

        return $predios;
    }
}
