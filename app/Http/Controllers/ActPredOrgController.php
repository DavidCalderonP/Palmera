<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActividadesPorPredio;
use App\Models\Palmera;
use App\Models\Predio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create($cache = null, $data=null)
    {
        $predios = $this->model->obtenerPrediosOrganicos();
        if(!count($predios)){
            return view('ActPalOrgPredOrg/prediosNotFound');
        }
        $actividades = $this->model->getActividades();
        if(!count($actividades)){
            return view('ActPalOrgPredOrg/actividadesNotFound');
        }

        return view('ActPalOrgPredOrg.assingActivity', compact( 'predios', 'actividades', 'cache', 'data'));
    }

    public function store(Request $request)
    {
        $finalData = [];

        //dd($request->actividad_id == null);
        if ($request->id_predio != null && ($request->actividad_id == null) && ($request->fecha_programada == null)){
            return $this->create($request->id_predio, $this->model->forTable($request->id_predio));
        }

        //dd($request->all());

        $palmeras =Predio::find('P009')->palmeras;
//        foreach ($palmeras as $key => $palmera){
            //$palmera->actividades = $palmeras[$key]->actividades;
//        }
//        dd($palmeras);
//        dd(Predio::with('palmeras')
//            ->where([['tipo_de_predio','=',1],['estatus','=',1]])->get()[0]->palmeras);

        $request->validate([
            'id_predio' => ['required'],
            'actividad_id' => ['required'],
            'fecha_programada' => ['required'],
        ]);
        $fieldsRemaining = (['id' => null, 'palmera_id' => null, 'anio' => substr($request->fecha_programada, 0, 4),'empleado_programo' => Auth::id(), 'empleado_ejecuto' => null, 'costo' => null, 'estatus' => 1, 'fecha_ejecucion' => null]);
        $data = array_merge($request->all(), $fieldsRemaining);
        $asignacionMasiva = new ActividadesPorPredio($data);
        $res = $this->model->saveActividades($asignacionMasiva, $request->id_predio);
        if($res){
            echo "<script>";
            echo "alert('Operación realizada exitosamente.')";
            echo "</script>";
        }else{
            echo "<script>";
            echo "alert('Algo salió mal. La operación falló.')";
            echo "</script>";
        }
        return $res ? $this->create($request->id_predio, $this->model->forTable($request->id_predio)) : $this->create();
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
