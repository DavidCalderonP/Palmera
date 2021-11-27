<?php

namespace App;

use App\Models\ActividadesPorPredio;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\DB;
use App\Models\Predio;
use App\Models\Actividad;
use Illuminate\Support\Facades\Http;

class DataBase
{
    function getPredios()
    {
        return Predio::with('suelos')->where('estatus', '=', 1)->paginate(25);
    }

    function getPredio($id)
    {
        try {
            $query = Predio::findOrFail($id);
        } catch (\Throwable $e) {
            return null;
        }
        return $query;
    }

    function savePredio($predio)
    {
        try {
            DB::beginTransaction();
            $newKey = DB::select("CALL gk_getKey(@id)");
            $predio->setId($newKey[0]->id);
            $predio->save();
            DB::select("CALL ak_addKey('{$newKey[0]->id}')");
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    function updatePredio($newPredio)
    {
        try {
            $newPredio::where('id', $newPredio->getId())
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
        } catch (QueryException $e) {
            return false;
        }
        return true;
    }

    function deletePredio($id)
    {
        try {
            $a = Predio::where('id', $id)->update(['estatus' => 0]);
            //Predio::where('id', $id)->delete();
        } catch (\Throwable $e) {
            return null;
        }
        return $a;
    }

    public function getActividades()
    {
        return Actividad::where('estatus', '=', 1)->get();
    }

    public function validarPredio($request)
    {
        try{
            $response = Http::post('http://localhost:4000/api/predioValidacion', $request)->json();
        }catch (ConnectionException $failedConnection){
            return null;
        }
        return $response;
    }

    public function obtenerPrediosOrganicos()
    {
        return Predio::where([['estatus', '=', 1],['tipo_de_predio', '=', 1]])->get();
    }

    function saveActividades($actividades, $predio)
    {
        try {
            DB::beginTransaction();
            $count = ActividadesPorPredio::count() + 1;
            $palmeras = Predio::find($predio)->palmeras;
            $actividad = Actividad::find($actividades->getIdActividad());
            $data = [];
            foreach ($palmeras as $key => $palmera) {
                $data[] = [
                    'id' => $palmera->getId() . $actividades->getIdActividad() . $actividades->getAnio() . ($count + $key),
                    'palmera_id' => $palmera->getId(),
                    'actividad_id' => $actividades->getIdActividad(),
                    'anio' => $actividades->getAnio(),
                    'fecha_programada' => $actividades->getFechaProgramada(),
                    'fecha_ejecucion' => $actividades->getFechaEjecucion(),
                    'empleado_programo' => $actividades->getEmpleadoProgramo(),
                    'empleado_ejecuto' => $actividades->getEmpleadoEjecuto(),
                    'costo' => $actividad->getCosto(),
                    'estatus' => 1
                ];
            }
            ActividadesPorPredio::insert($data);
            DB::commit();
        }catch (\Throwable $e){
            DB::rollBack();
            return false;
        }
        return true;
    }

}
