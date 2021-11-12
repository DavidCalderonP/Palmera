<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predio;
use Illuminate\Support\Facades\Http;

class DataBase extends Model {
    function getPredios(){
        $predios = [];
        $response = Predio::all();
        foreach ($response as $data){
            $suelo = new SueloClass($data->suelos);
            $predios[] = new \App\Predio($data->metros_cuadrados, $data->numero_palmeras, $suelo, $data->ph, $data->salinidad, $data->tipo_de_predio, $data->descripcion, $data->fecha_creacion, $data->latitud, $data->longitud, $data->estatus, $data->id);
        }
        return $predios;
//        $query = DB::select('SELECT p.id, metros_cuadrados, palmeras_destinadas, s.tipo_de_suelo, temperatura, nombre_clima, nivel_humedad, ph, salinidad, tipo_de_predio FROM prediosSeeder as p
//        INNER JOIN clima as c ON c.id = p.clima
//        INNER JOIN humedad as h ON h.id = p.humedad
//        INNER JOIN suelos as s ON s.id = p.tipo_de_suelo
//        order by p.id');
//        foreach ($query as $row) {
//            $prediosSeeder[] = new Predio(
//                $row->metros_cuadrados,
//                $row->palmeras_destinadas,
//                $row->tipo_de_suelo,
//                $row->temperatura,
//                $row->nombre_clima,
//                $row->nivel_humedad,
//                $row->ph,
//                $row->salinidad,
//                $row->tipo_de_predio,
//                $row->id
//            );
//        }
    }
    function getPredio($id){
        try {
            $query = DB::select( 'SELECT p.id, metros_cuadrados, palmeras_destinadas, s.tipo_de_suelo, temperatura, nombre_clima, nivel_humedad, ph, salinidad, tipo_de_predio FROM predio as p
            INNER JOIN clima as c ON c.id = p.clima
            INNER JOIN humedad as h ON h.id = p.humedad
            INNER JOIN suelos as s ON s.id = p.tipo_de_suelo
            where p.id = ?;', [$id])[0];
        } catch (\Throwable $e) {
            return null;
        }
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
                                salinidad = ?
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
                $id
            ]);
        return $consulta;
    }
    function deletePredio($id){
        $delete = DB::delete('DELETE FROM predio WHERE id = ?', [$id]);
        return $delete;
    }

    public function validarPredio(){
        return Http::get('http://localhost:4000/api/predioValidacion')->json();
    }

}
