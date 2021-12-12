<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActividadesPorPredio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        if(!Auth::user('id')){
            return $this->needLogin();
        }
        if(!Auth::user('id')->validarTipoDeUsuario('@especialistapalmera.com')){
            Alert::error('Algo salió mal', 'No cuentas con los permisos para acceder a esta sección');
            return redirect('home');
        }
        $predios = $this->model->obtenerPrediosOrganicos();
        if(!count($predios)){
            return $this->prediosOrganicosNoEncontrados();
        }
        $actividades = $this->model->getActividades();
        if(!count($actividades)){
            return $this->actividadesNoEncontradas();
        }

        return view('ActPalOrgPredOrg.assingActivity', compact( 'predios', 'actividades', 'cache', 'data'));
    }

    public function store(Request $request)
    {
        if ($request->id_predio != null && ($request->actividad_id == null) && ($request->fecha_programada == null)){
            return $this->create($request->id_predio, $this->model->forTable($request->id_predio));
        }
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
            $this->success();
        }else{
            $this->error();
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

    public function needLogin(){
        Alert::info(session('info', 'Incio de sesión necesario'), 'Es necesario inciar sesión para continuar.');
        return redirect('login');
    }

    public function error(){
        Alert::error('Algo salió mal', 'Ocurrió un error');
    }

    public function success(){
        Alert::success('Hecho!', 'Operación realizada exitosamente!');
    }

    public function prediosOrganicosNoEncontrados(){
        Alert::warning('Advertencia', 'No se encontró ningun predio orgánico');
        return redirect('home');
    }

    public function actividadesNoEncontradas(){
        Alert::warning('Advertencia', 'No se encontró ninguna actividad');
        return redirect('home');
    }
}
