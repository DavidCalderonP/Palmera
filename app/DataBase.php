<?php

namespace App;

use App\Models\ActividadesPorPredio;
use App\Models\ActPredNoOrg;
use App\Models\Palmera;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\DB;
use App\Models\Predio;
use App\Models\Actividad;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Http;

class DataBase
{
    function getPredios()
    {
        return Predio::with('suelos')->where('estatus', '=', 1)->paginate(15);
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

    function savePredio(Predio $predio)
    {
        try {
            $statement = "CALL addPredio({$predio->getMetrosCuadrados()},{$predio->getNumeroDePalmeras()},{$predio->getTipoDeSuelo()},{$predio->getPh()},{$predio->getSalinidad()},{$predio->getTipoDePredio()},'{$predio->getDescripcion()}', '{$predio->getFechaCreacion()}', {$predio->getEstatus()})";
            DB::select($statement);
        } catch (\Throwable $error) {
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
            $affectedRows = Predio::where([['id', $id],['estatus','=',1]])->update(['estatus' => 0]);
        } catch (\Throwable $e) {
            return null;
        }
        return $affectedRows;
    }

    public function getActividades()
    {
        return Actividad::where('estatus', '=', 1)->get();
    }

    public function obtenerPrediosOrganicos()
    {
        return Predio::where([['estatus', '=', 1], ['tipo_de_predio', '=', 1]])->get();
    }

    function saveActividades($actividades, $predio)
    {
        try {
            DB::transaction(function() use ($actividades, $predio) {
                $count = ActividadesPorPredio::count() + 1;
                $palmeras = Predio::where([['id', '=', $predio],['estatus', '=', 1]])->get()[0]->palmerasOrganicas;
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
            });
        } catch (\Throwable $error) {
            dd($error->getMessage());
            return false;
        }
        return true;
    }


    function forTable($id)
    {
        return Predio::find($id)->palmeras;
    }

    function obtenerPrediosNoOrganicos(){
        return Predio::where([['estatus', '=', 1], ['tipo_de_predio', '=', 0]])->get();
    }

    function obtenerPalmerasPorPredioNoOrganico($id){
        return Predio::where([['id', '=', $id],['estatus', '=', 1]])->get()[0]->palmerasOrganicas;
    }

    function obtenerActPalOrgPredNoOrg($id){
        return Palmera::where([['id', '=', $id],['estatus', '=', 1]])->get()[0]->actividades;
    }
    function saveActividadesPredNoOrg(ActPredNoOrg $actPredNoOrg){
        //identificador, id, palmera_id, actividad_id, anio, fecha_programada, fecha_ejecucion, empleado_programo, empleado_ejecuto, costo, estatus,
        $actividad = Actividad::where([['estatus','=',1],['id','=',$actPredNoOrg->getIdActividad()]])->get()[0];
        $query = "CALL addActividadPredNoOrg('{$actPredNoOrg->getIdPalmera()}',{$actPredNoOrg->getIdActividad()},'{$actPredNoOrg->getAnio()}','{$actPredNoOrg->getFechaProgramada()}',{$actPredNoOrg->getEmpleadoProgramo()},{$actividad->getCosto()},{$actPredNoOrg->getEstatus()});";
        try {
            DB::select($query);
        }catch (\Throwable $error){
            dd($error->getMessage());
        }
        return true;
    }

//    function forTableActPalOrgPredNoOrg($id){
//        return Palmera::where([['estatus', '=', 1],['tipo_palmera','=', 1],['id','=',$id]])->get()[0]->actividades;
//    }

    function forTableActPalOrgPredNoOrg($id){
        return ActPredNoOrg::where([['estatus', '=', 1],['palmera_id','=',$id]])->get();
    }

    function getProductos() {
        return Producto::paginate(10);
    }

    function getProductosFilter($search) {
        return Producto::where(['nombre_datil', 'like', $search])->get();
    }

    function getCarrito($userID) {
        
        return Carrito::where('id_cliente', $userID)
        ->join('VariedadDeDatil', 'id_variedad', '=', 'VariedadDeDatil.idVariedad')
        ->get();
    }

    function agregarCarrito($request) {
        try {
            $carrito = new Carrito();
            $carrito->cantidad = (int) $request->cantidad;
            $carrito->id_variedad = (int) $request->Id;
            $carrito->id_cliente = (int) $request->userID;
            $carrito->save();
        } catch (\Throwable $e) {
            return null;
        }
        return;
    }

    function deleteCarrito($id) {
        try {
            $a = Carrito::where('id', (int)$id)->delete();
        } catch (\Throwable $e) {
            return null;
        }
        return $a;
    }
}
