<?php

namespace App;

use Illuminate\Support\Facades\DB;

class DataBase {

    function getPredios(){
        $predios = [];
        $query = DB::select('SELECT p.id, metros_cuadrados, palmeras_destinadas,tipo_de_suelo, temperatura, nombre_clima, nivel_humedad, ph, salinidad, tipo_de_predio FROM predio as p INNER JOIN clima as c ON p.clima = c.id INNER JOIN humedad as h ON h.id = p.humedad;');
        foreach ($query as $row) {
            $predios[] = new Predio(
                $row->metros_cuadrados,
                $row->palmeras_destinadas,
                $row->tipo_de_suelo,
                $row->temperatura,
                $row->nombre_clima,
                $row->nivel_humedad,
                $row->ph,
                $row->salinidad,
                $row->tipo_de_predio,
                $row->id
            );
        }
        return $predios;
    }

    function savePredio(Predio $predio){

        //var_dump($predio);

        $stmtQuery = ("CALL addPredio({$predio->getMetrosCuadrados()}, {$predio->getPalmerasDestinadas()}, '{$predio->getTipoDeSuelo()}', {$predio->getTemperatura()}, {$predio->getClima()}, {$predio->getHumedad()}, {$predio->getPh()}, {$predio->getSalinidad()}, {$predio->getTipoDePredio()})");

        $aux = DB::select($stmtQuery);
        //dd($aux);
        return $aux;
    }
}
