<?php

namespace App;

use App\Models\ActividadesPorPredio;
use App\Models\ActPredNoOrg;
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

    function savePredio(Predio $predio)
    {
        try {
            $statement = "CALL addPredio({$predio->getMetrosCuadrados()},{$predio->getNumeroDePalmeras()},{$predio->getTipoDeSuelo()},{$predio->getPh()},{$predio->getSalinidad()},{$predio->getTipoDePredio()},'{$predio->getDescripcion()}', '{$predio->getFechaCreacion()}', {$predio->getEstatus()})";
            DB::select($statement);
        } catch (\Throwable $error) {
            dd($error->getMessage());
            return false;
        }
        return true;
//        try {
//            DB::beginTransaction();
//            $newKey = DB::select("CALL gk_getKey(@id)");
//            $predio->setId($newKey[0]->id);
//            $predio->save();
//            DB::select("CALL ak_addKey('{$newKey[0]->id}')");
//            DB::commit();
//        } catch (\Throwable $e) {
//            DB::rollBack();
//            dd($e->getMessage());
//            return false;
//        }
//        return true;
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
            //if(Predio::where([['estatus','=',1],['id','=',$id]])->get()->count()) return null;
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

    public function validarPredio($request)
    {
        try {
            $response = Http::post('http://localhost:4000/api/predioValidacion', $request)->json();
        } catch (ConnectionException $failedConnection) {
            //dd("Esta fallando el servicio Web");
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
            DB::transaction(function() use ($actividades, $predio) {
                $count = ActividadesPorPredio::count() + 1;
                //$palmeras = Predio::find($predio)->palmeras;
                $palmeras = Predio::where([['id', '=', $predio],['estatus', '=', 1]])->get()[0]->palmerasOrganicas;
                //dd($palmeras);
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
//        $query = "select p.id, a.nombre_actividad, app.fecha_programada from ActividadesPorPalmeras as app
//inner join Palmeras as p on p.id = app.palmera_id
//inner join Actividades as a on a.id = app.actividad_id
//inner join Predios as pred on pred.id = p.predio_id where pred.id = 'P009'";

    }

    //------------------------------Palmeras Orgánicas En Predios No Orgánicos----------------------------------------

    function obtenerPrediosNoOrganicos(){
        return Predio::where([['estatus', '=', 1], ['tipo_de_predio', '=', 0]])->get();
    }

    function obtenerPalmerasPorPredioNoOrganico($id){
        //dd(Predio::where([['id', '=', $id],['estatus', '=', 1]])->get()[0]->palmerasNoOrganicas);
        return Predio::find($id)->palmeras;
    }

    function saveActividadesPredNoOrg(ActPredNoOrg $actividad){
        //identificador, id, palmera_id, actividad_id, anio, fecha_programada, fecha_ejecucion, empleado_programo, empleado_ejecuto, costo, estatus,
        $query = "CALL addActividadPredNoOrg('{$actividad->getIdPalmera()}',{$actividad->getIdActividad()},'{$actividad->getAnio()}',{$actividad->getFechaProgramada()},NULL,{$actividad->getEmpleadoProgramo()},NULL,{$actividad->getCosto()},{$actividad->getEstatus()});";
        dd($query);

        /*
         * desarrollando procedimiento para agregar actividad, falta consultar el costo de la actividad para hacer la insercion
         *DELIMITER ;;
CREATE PROCEDURE addActividadPredNoOrg(IN palmera_id VARCHAR(255), IN actividad_id INT, IN anio VARCHAR(255), IN fecha_programada DATE, IN empleado_programo INT, IN costo DOUBLE, IN estatus TINYINT)
BEGIN
	DECLARE incremental INT DEFAULT 0;
	DECLARE identificador varchar(255) default '';
 	DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
        	SELECT 'Ocurrio un error al registrar';
            ROLLBACK;
        END;
	SET @@AUTOCOMMIT = 0;
	START TRANSACTION;
	SELECT count(*) INTO incremental FROM ActividadesPorPalmeras FOR UPDATE;
	#SELECT CONVERT( SUBSTRING(id,2,3), UNSIGNED INTEGER) INTO lastPredio FROM predio WHERE (SELECT MAX(id) FROM predio)=id;
	set identificador = concat(palmera_id, actividad_id, anio, incremental);#concat('P', LPAD((lastPredio+1), 3, 0));
	INSERT INTO ActividadesPorPalmeras VALUES(identificador, palmera_id, actividad_id, anio, fecha_programada, NULL, empleado_programo, NULL, costo, estatus, CURRENT_TIMESTAMP, NULL, NULL);
	COMMIT;
END;;
DELIMITER ;

CALL addActividadPredNoOrg('PAL011',3,'2021',2021-12-24,NULL,1,NULL,276354,1);
         */
        try {
            DB::select($query);
        }catch (\Throwable $error){
            dd($error->getMessage());
        }
        return true;
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
