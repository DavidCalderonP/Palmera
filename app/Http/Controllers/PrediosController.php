<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PrediosController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Model();
    }

    public function index()
    {
        if(!Auth::user('id')){
        return $this->needLogin();
    }
        if(!Auth::user('id')->validarTipoDeUsuario('@especialistapredio.com')){
            Alert::error('Algo salió mal', 'No cuentas con los permisos para acceder a esta sección');
            return redirect('home');
        }
        $res = $this->model->getPredios();
        return view('predios/indexPredio', compact('res'));
    }

    public function create()
    {
        if (!$this->isLogged()) {
            return $this->needLogin();
        }
        return view('predios.createPredio');
    }

    public function store(Request $request)
    {
        $request->validate([
            'metros_cuadrados' => ['required'],
            'numero_palmeras' => ['required'],
            'tipo_de_suelo' => ['required'],
            'ph' => ['required'],
            'salinidad' => ['required'],
            'tipo_de_predio' => ['required'],
            'descripcion' => ['required']
        ]);
        $aux = array_merge($request->all(), ['id' => NULL, 'fecha_creacion' => now('GMT-7')->format('Y-m-d'), 'estatus' => 1]);
        $predio = new Predio($aux);
        $res = $this->model->savePredio($predio);
        if ($res) {
            return $this->success();
        }
        return $this->error();
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $predio = $this->model->getPredio($id);
        if ($predio == null) {
            Alert::warning('Aviso!', 'El predio que ha solicitado ya no existe.');
            return redirect('predio');
        }
        return !$this->isLogged() ? $this->needLogin() : view('predios.editPredio', compact('predio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'metros_cuadrados' => ['required'],
            'numero_palmeras' => ['required'],
            'tipo_de_suelo' => ['required'],
            'ph' => ['required'],
            'salinidad' => ['required'],
            'descripcion' => ['required']
        ]);
////        dd("todo jalo bien");
//        dd("Entrando update", $request->all());
        $predio = new Predio($request->all());
        $this->model->updatePredio($predio);
        return redirect('predio');
    }

    public function destroy($id)
    {
        if (!$this->isLogged()) {
            return $this->needLogin();
        }
        $resp = $this->model->deletePredio($id);
        if ($resp == 0) {
            Alert::warning('Aviso!', 'El predio que ha solicitado ya no existe.');
        } else {
            Alert::success('Hecho!', 'Operación realizada exitosamente!');
        }
        return redirect('predio');
    }

    public function isLogged()
    {
        return Auth::id('id');
    }

    public function needLogin()
    {
        Alert::info(session('info', 'Incio de sesión necesario'), 'Es necesario inciar sesión para continuar.');
        return redirect('login');
    }

    public function error()
    {
        Alert::error('Algo salió mal', 'Ocurrió un error');
        return redirect('predio');
    }

    public function success()
    {
        Alert::success('Hecho!', 'Operación realizada exitosamente!');
        return redirect('predio');
    }
}




















//DROP PROCEDURE IF EXISTS gk_getKey;
//
//DELIMITER ;;
//CREATE PROCEDURE gk_getKey(OUT id varchar(4))
//BEGIN
//	DECLARE lockT INT DEFAULT 0;
//	DECLARE identificador varchar(4) default '';
//	DECLARE EXIT HANDLER FOR SQLEXCEPTION
//                             BEGIN
//                             SELECT 'Ocurrio un error';
//            ROLLBACK;
//        END;
//	SET @@AUTOCOMMIT = 0;
//	START TRANSACTION;
//	SELECT count(*) INTO lockT FROM PrediosControl FOR UPDATE;
//                                                       SET id = concat('P', LPAD((lockT+1), 3, 0));
//	SELECT id;
//	COMMIT;
//END;;
//DELIMITER ;
//
//CALL gk_getKey(@id)
