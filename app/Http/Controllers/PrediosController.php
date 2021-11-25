<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrediosController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Model();
    }


    public function index(){
        $res = $this->model->getPredios();
        return view('predios/indexPredio', compact('res'));
    }

    public function create()
    {
        return !Auth::user('id') ? view('predios/needLogin') : view('predios.createPredio');
    }

    public function store(Request $request){
        $request->validate([
            'metros_cuadrados' => ['required'],
            'numero_palmeras' => ['required'],
            'tipo_de_suelo' => ['required'],
            'ph' => ['required'],
            'salinidad' => ['required'],
            'tipo_de_predio' => ['required'],
            'descripcion' => ['required'],
            'latitud' => ['required'],
            'longitud' => ['required'],
        ]);
        $aux = array_merge($request->all(), ['id' => NULL, 'fecha_creacion' => now('GMT-7')->format('Y-m-d'), 'estatus' => 1]);
//        if($aux['tipo_de_predio'] == 0){
//            dd($this->model->validarPredio($aux));
//        }
        $predio = new Predio($aux);
        $this->model->savePredio($predio);
        return redirect('predio');
    }

    public function show($id){}

    public function edit($id){
        $predio = $this->model->getPredio($id);
        if ($predio == null) {
            echo "<script>";
            echo "alert('El predio que seleccionó ya no existe');";
            echo "</script>";
            return redirect('predio');
        }
        return !Auth::user($id) ? view('predios/needLogin') : view('predios.editPredio', compact('predio'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'metros_cuadrados' => ['required'],
            'numero_palmeras' => ['required'],
            'tipo_de_suelo' => ['required'],
            'ph' => ['required'],
            'salinidad' => ['required'],
            'tipo_de_predio' => ['required'],
            'descripcion' => ['required'],
            'latitud' => ['required'],
            'longitud' => ['required']
        ]);
        $predio = new Predio($request->all());
        $this->model->updatePredio($predio);
        return redirect('predio');
    }

    public function destroy($id){
        if(!Auth::user('id')){
            return view('predios/needLogin');
        }
        $resp = $this->model->deletePredio($id);
        if($resp==0){
            echo "<script>";
            echo "alert('El predio que seleccionó ya no existe');";
            echo "</script>";
        }
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
