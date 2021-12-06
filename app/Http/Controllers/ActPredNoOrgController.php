<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActPredNoOrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActPredNoOrgController extends Controller
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
    public function create($cache = null, $info = null, $data=null)
    {
        if(!Auth::user('id')){
            echo "<script>";
            echo "alert('Necesitas inciar sesión.')";
            echo "</script>";
            return redirect('http://localhost:8000/home');
        }
        $predios = $this->model->obtenerPrediosNoOrganicos();
        if(!count($predios)){
            return view('ActPalOrgPredOrg/prediosNotFound');
        }
        $actividades = $this->model->getActividades();
        if(!count($actividades)){
            return view('ActPalOrgPredOrg/actividadesNotFound');
        }

        return view('ActPalOrgPredNoOrg.assingActivity', compact( 'predios', 'info', 'actividades', 'cache', 'data'));
    }

    public function store(Request $request)
    {
//        $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio);
        if (($request->id_predio != null)  && ($request->actividad_id == null) && ($request->fecha_programada == null)){
            return $this->create([$request->id_predio, $request->palmera_id], $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio), $this->model->forTable($request->id_predio));
        }
        $request->validate([
            'id_predio' => ['required'],
            'palmera_id' => ['required'],
            'actividad_id' => ['required'],
            'fecha_programada' => ['required'],
        ]);
        $fieldsRemaining = (['id' => null, 'anio' => substr($request->fecha_programada, 0, 4),'empleado_programo' => Auth::id(), 'empleado_ejecuto' => null, 'costo' => null, 'estatus' => 1, 'fecha_ejecucion' => null]);
        $data = array_merge($request->all(), $fieldsRemaining);
        $actividad = new ActPredNoOrg($data);
        $res = $this->model->saveActividadesPredNoOrg($actividad);
        if($res){
            echo "<script>";
            echo "alert('Operación realizada exitosamente.')";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Algo salió mal. La operación falló.')";
            echo "</script>";
        }
        return $res ? $this->create([$request->id_predio, $request->palmera_id], $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio), $this->model->forTable($request->id_predio)) : $this->create();
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
