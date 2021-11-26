<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActividadesPorPredio;
use App\Models\Palmera;
use App\Models\Predio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActPredOrgController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Model();
    }
    public function index()
    {
        return $this->create();
    }
    public function create($data=null)
    {
        $predios = $this->model->obtenerPrediosOrganicos();
        if(!count($predios)){
            return view('ActPalOrgPredOrg/prediosNotFound');
        }
        $actividades = $this->model->getActividades();
        if(!count($actividades)){
            return view('ActPalOrgPredOrg/actividadesNotFound');
        }

        return view('ActPalOrgPredOrg.assingActivity', compact( 'predios', 'actividades', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_predio' => ['required'],
            'actividad_id' => ['required'],
            'fecha_programada' => ['required'],
        ]);
        $fieldsRemaining = (['id' => null, 'palmera_id' => null, 'anio' => substr($request->fecha_programada, 0, 4), 'costo' => null, 'estatus' => 1, 'fecha_ejecucion' => null]);
        $data = array_merge($request->all(), $fieldsRemaining);
        $asignacionMasiva = new ActividadesPorPredio($data);
        $res = $this->model->saveActividades($asignacionMasiva, $request->id_predio);
        $msg = $res ? 'Operación realizada exitosamente.' : 'La operación falló. No se realizaron las asignaciones.';
        return $res ? $this->create($request->id_predio) : $this->create();

    }

    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
