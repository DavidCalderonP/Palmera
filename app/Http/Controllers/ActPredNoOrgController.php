<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActPredNoOrg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
            return $this->needLogin();
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
//        dd($this->model->forTableActPalOrgPredNoOrg('PAL009'));
        if (($request->id_predio != null && $request->palmera_id == null) && ($request->fecha_programada == null)){
            $palmerasDisponibles = $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio);
            return $this->create([$request->id_predio, $request->palmera_id],$palmerasDisponibles, null);
        }

        if (($request->id_predio != null && $request->palmera_id != null) && ($request->fecha_programada == null)){
            $palmerasDisponibles = $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio);
            return $this->create([$request->id_predio, $request->palmera_id],$palmerasDisponibles, $this->model->forTableActPalOrgPredNoOrg($request->palmera_id));
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
            $this->success();
        }else{
            $this->error();
        }
        return $res ? $this->create([$request->id_predio, $request->palmera_id], $this->model->obtenerPalmerasPorPredioNoOrganico($request->id_predio), $this->model->forTableActPalOrgPredNoOrg($request->palmera_id)) : $this->create();
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
    public function needLogin(){
        Alert::info(session('info', 'Incio de sesión necesario'), 'Es necesario inciar sesión para continuar.');
        return redirect('login');
    }

    public function error(){
        Alert::error('Algo salió mal', 'Ocurrió un error');
        return redirect('asignarActividadesPredNoOrg');
    }

    public function success(){
        Alert::success('Hecho!', 'Operación realizada exitosamente!');
        return redirect('asignarActividadesPredNoOrg');
    }
}
