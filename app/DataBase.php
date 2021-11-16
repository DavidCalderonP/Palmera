<?php

namespace App;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\Predio;
use Illuminate\Support\Facades\Http;

class DataBase
{

    function getPredios()
    {
        return Predio::paginate(5);
    }
//    function getPredios(){
//        $predios = [];
//        $response = Predio::all();
//        foreach ($response as $data) {
//            $suelo = new SueloClass($data->suelos);
//            $predios[] = new \App\Predio($data->metros_cuadrados, $data->numero_palmeras, $suelo, $data->ph, $data->salinidad, $data->tipo_de_predio, $data->descripcion, $data->fecha_creacion, $data->latitud, $data->longitud, $data->estatus, $data->id);
//        }
//        return $predios;
//    }

    function getPredio($id)
    {
        try {
            $query = Predio::findOrFail($id);
        } catch (\Throwable $e) {
//            dd($e->getMessage());
            return null;
        }
        return $query;
    }

    function savePredio($predio)
    {
        DB::beginTransaction();
        try {
            $newKey = DB::select("CALL gk_getKey(@id)");
            $predio->id = $newKey[0]->id;
            $predio->save();
            DB::select("CALL ak_addKey('{$newKey[0]->id}')");
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

//    function savePredio(\App\Predio $predio){
//        DB::beginTransaction();
//        try {
//            $response = DB::select("CALL gk_getKey(@id)");
//            $predio->setId($response[0]->id);
//            $newPredio = new Predio([
//                'id' => $predio->getId(),
//                'metros_cuadrados' => $predio->getMetrosCuadrados(),
//                'numero_palmeras' => $predio->getNumeroDePalmeras(),
//                'tipo_de_suelo' => $predio->getTipoDeSuelo(),
//                'ph' => $predio->getPh(),
//                'salinidad' => $predio->getSalinidad(),
//                'tipo_de_predio' => $predio->getTipoDePredio(),
//                'descripcion' => $predio->getDescripcion(),
//                'fecha_creacion' => $predio->getFechaCreacion(),
//                'latitud' => $predio->getLatitud(),
//                'longitud' => $predio->getLongitud(),
//                'estatus' => $predio->getEstatus(),
//            ]);
//            $newPredio->save();
//            DB::commit();
//        }catch (\Throwable $e){
//            dd($e->getMessage());
//            DB::rollBack();
//            return false;
//        }
//        return true;
//        DB::beginTransaction();
//        try {
//            $newPredio = new Predio([
//                'id' => $predio->getId(),
//                'metros_cuadrados' => $predio->getMetrosCuadrados(),
//                'numero_palmeras' => $predio->getNumeroDePalmeras(),
//                'tipo_de_suelo' => $predio->getTipoDeSuelo(),
//                'ph' => $predio->getPh(),
//                'salinidad' => $predio->getSalinidad(),
//                'tipo_de_predio' => $predio->getTipoDePredio(),
//                'descripcion' => $predio->getDescripcion(),
//                'fecha_creacion' => $predio->getFechaCreacion(),
//                'latitud' => $predio->getLatitud(),
//                'longitud' => $predio->getLongitud(),
//                'estatus' => $predio->getEstatus(),
//            ]);
//            $newPredio->lockForUpdate()->get();
//            $key = $newPredio->withTrashed()->count();
//            $key = $key+1;
//            $newPredio->setId('P' . str_repeat('0',3-strlen((string)$key)) . $key);
////            dd($predio);
//            $newPredio->save();
//            DB::commit();
//        }catch (\Throwable $e){
//            Log::info($e->getMessage());
//            DB::rollBack();
//        }
//        $stmtQuery = ("CALL addPredio({$predio->getMetrosCuadrados()}, {$predio->getPalmerasDestinadas()}, '{$predio->getTipoDeSuelo()}', {$predio->getTemperatura()}, {$predio->getClima()}, {$predio->getHumedad()}, {$predio->getPh()}, {$predio->getSalinidad()}, {$predio->getTipoDePredio()})");
//        $aux = DB::select($stmtQuery);
//        return $aux;
//    }

    function updatePredio($newPredio){
        try {
            $newPredio::where('estatus', $newPredio->getId())
            ->update([
                'metros_cuadrados' => $newPredio->getMetrosCuadrados(),
                'numero_palmeras' => $newPredio->getNumeroDePalmeras(),
                'tipo_de_suelo' => $newPredio->getTipoDeSuelo(),
                'ph' => $newPredio->getPh(),
                'salinidad' => $newPredio->getSalinidad(),
                'tipo_de_predio' => $newPredio->getTipoDePredio(),
                'descripcion' => $newPredio->getDescripcion(),
                'fecha_creacion' => $newPredio->getFechaCreacion(),
                'latitud' => $newPredio->getLatitud(),
                'longitud' => $newPredio->getLongitud(),
                'estatus' => $newPredio->getEstatus()
            ]);
        }catch(QueryException $e){
            return false;
        }
        return true;
    }
//    function updatePredio($predio, $id){
//        $consulta = DB::select("Update predio set
//                                metros_cuadrados = ?,
//                                palmeras_destinadas = ?,
//                                tipo_de_suelo = ?,
//                                temperatura = ?,
//                                clima = ?,
//                                humedad = ?,
//                                ph = ?,
//                                salinidad = ?
//                                where id = ?",
//            [
//                $predio->getMetrosCuadrados(),
//                $predio->getPalmerasDestinadas(),
//                $predio->getTipoDeSuelo(),
//                $predio->getTemperatura(),
//                $predio->getClima(),
//                $predio->getHumedad(),
//                $predio->getPh(),
//                $predio->getSalinidad(),
//                $id
//            ]);
//        return $consulta;
//    }

    function deletePredio($id){
        try {
            $a = Predio::where('id', $id)->update(['estatus' => 0]);
            Predio::where('id', $id)->delete();
        } catch (\Throwable $e) {
            return null;
        }
        return $a;
    }

    public function validarPredio()
    {
        return Http::get('http://localhost:4000/api/predioValidacion')->json();
    }

}
