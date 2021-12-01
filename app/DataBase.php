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
        try {
            $response = Http::post('http://localhost:4000/api/predioValidacion', $request)->json();
        } catch (ConnectionException $failedConnection) {
            return null;
        }
        return $response;
    }

    public function obtenerPrediosOrganicos()
    {
        return Predio::where([['estatus', '=', 1], ['tipo_de_predio', '=', 1]])->get();
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
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    function forTable($id)
    {
        return Predio::find($id)->palmeras;
//        $query = "select p.id, a.nombre_actividad, app.fecha_programada from ActividadesPorPalmeras as app
//inner join Palmeras as p on p.id = app.palmera_id
//inner join Actividades as a on a.id = app.actividad_id
//inner join Predios as pred on pred.id = p.predio_id where pred.id = 'P009'";

    }


}


/*
CREATE VIEW test AS
SELECT app.id, app.palmera_id, app.actividad_id, app.anio, app.fecha_programada, app.fecha_ejecucion, app.empleado_programo, app.empleado_ejecuto, app.costo, app.estatus,
		pal.id,	pal.tipo_palmera, pal.predio_id, pal.tipo_datil, pal.estatus,
		cos.id,	cos.id_palmera,	cos.kilogramos,	cos.fecha_cosecha, cos.tipo_cosecha, cos.estatus,
		cpc.id,	cpc.id_contenedor, cpc.id_cosecha, cpc.cantidad_ingreso, cpc.cantidad_vendida, cpc.fecha_ingreso,
		con.id,	con.cantidad_maxima, con.cantidad_vendida, con.cantidad_actual, con.tipo_cosecha, con.estatus,
		tdd.id,	tdd.nombre_datil, tdd.descripcion, tdd.costo, tdd.tipo,	tdd.estatus
FROM ActividadesPorPalmeras as app
inner join Palmeras as pal on pal.id = app.palmera_id
inner join Cosecha as cos on cos.id_palmera = pal.id
inner join ContenedoresXCosecha as cpc on cpc.id_cosecha = cos.id
inner join Contenedores as con on con.id = cpc.id_contenedor
inner join TipoDeDatil as tdd on tdd.id = pal.tipo_datil

CREATE VIEW test AS
SELECT app.id, app.palmera_id, app.actividad_id, app.anio, app.fecha_programada, app.costo as 'APPCosto', app.estatus as 'APPEstatus',
		pal.id as 'PalmeraID',	pal.tipo_palmera, pal.predio_id, pal.tipo_datil, pal.estatus as 'PalmeraEstatus',
		cos.id as 'CosechaID',	cos.id_palmera,	cos.kilogramos,	cos.fecha_cosecha, cos.estatus as 'CosechaEstatus',
		cpc.id as 'CPCID',	cpc.id_contenedor, cpc.id_cosecha, cpc.cantidad_ingreso, cpc.fecha_ingreso as 'CPCEstatus',
		con.id as 'ContenedorID',	con.cantidad_maxima, con.cantidad_vendida, con.cantidad_actual, con.tipo_cosecha, con.estatus as 'ContenedorEstatus',
		tdd.id as 'TDDID',	tdd.nombre_datil, tdd.descripcion, tdd.costo as 'TDDCosto', tdd.tipo,	tdd.estatus as 'TDDEstatus'
FROM ActividadesPorPalmeras as app
inner join Palmeras as pal on pal.id = app.palmera_id
inner join Cosecha as cos on cos.id_palmera = pal.id
inner join ContenedoresXCosecha as cpc on cpc.id_cosecha = cos.id
inner join Contenedores as con on con.id = cpc.id_contenedor
inner join TipoDeDatil as tdd on tdd.id = pal.tipo_datil

select * from test;

select nombre_datil, tipo_cosecha, descripcion, cantidad_actual, sum(APPCosto)/cantidad_ingreso as 'Precio P/Kg' from test group by PalmeraID order by nombre_datil;
 */
