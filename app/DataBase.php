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

    function getPredio($id){
        try {
            $query = DB::select( 'SELECT p.id, metros_cuadrados, palmeras_destinadas,tipo_de_suelo, temperatura, nombre_clima, nivel_humedad, ph, salinidad, tipo_de_predio FROM predio as p INNER JOIN clima as c ON p.clima = c.id INNER JOIN humedad as h ON h.id = p.humedad where p.id = ?;', [$id])[0];
        } catch (\Throwable $e) {
            return null;
            //return false;
        }

        //dd($query);
        $predio = new Predio(
            $query->metros_cuadrados,
            $query->palmeras_destinadas,
            $query->tipo_de_suelo,
            $query->temperatura,
            $query->nombre_clima,
            $query->nivel_humedad,
            $query->ph,
            $query->salinidad,
            $query->tipo_de_predio,
            $query->id);
        return $predio;
    }

    function savePredio(Predio $predio){
        $stmtQuery = ("CALL addPredio({$predio->getMetrosCuadrados()}, {$predio->getPalmerasDestinadas()}, '{$predio->getTipoDeSuelo()}', {$predio->getTemperatura()}, {$predio->getClima()}, {$predio->getHumedad()}, {$predio->getPh()}, {$predio->getSalinidad()}, {$predio->getTipoDePredio()})");
        $aux = DB::select($stmtQuery);
        //dd(empty($aux)? [] : current((Array)$aux[0]));
        return $aux;
    }

    function updatePredio($predio, $id){
        $consulta = DB::select("Update predio set
                                metros_cuadrados = ?,
                                palmeras_destinadas = ?,
                                tipo_de_suelo = ?,
                                temperatura = ?,
                                clima = ?,
                                humedad = ?,
                                ph = ?,
                                salinidad = ?,
                                tipo_de_predio = ?
                                where id = ?",
            [
                $predio->getMetrosCuadrados(),
                $predio->getPalmerasDestinadas(),
                $predio->getTipoDeSuelo(),
                $predio->getTemperatura(),
                $predio->getClima(),
                $predio->getHumedad(),
                $predio->getPh(),
                $predio->getSalinidad(),
                $predio->getTipoDePredio(),
                $id
            ]);
            //dd($consulta);
        return $consulta;
    }


    function deletePredio($id){
        $delete = DB::delete('DELETE FROM predio WHERE id = ?', [$id]);
        return $delete;
    }
}
