<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PrediosController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = new Model();
    }

    public function index(Request $request)
    {
        //Log::info(now('GMT-7')->format('Y-m-d'));
        $res = $this->model->getPredios();
        //$res['res'] = $this->obtenerPaginador($request, $query);//Se envia el request y la informacion
//        $relation = \App\Models\Predio::find('P005')->suelos;
//        dd($relation);
//        $date = now();
//        var_dump($date->toDateTimeString());
//        foreach (Suelo::all() as $suelo){
//            var_dump(json_encode($suelo));
//        }
        //$this->model->validarPredio();
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
        $predio = new Predio($aux);
        $this->model->savePredio($predio);
//        dd($predio);
//        $metros_cuadrados
//        $numero_palmeras
//        $tipo_de_suelo
//        $ph
//        $salinidad
//        $tipo_de_predio
//        $descripcion
//        $fecha_creacion
//        $latitud
//        $longitud
//        $estatus
//        $id = ''){
//        $now = now();
//        var_dump($now->toDateString());
//        $predio = new \App\Predio(
//                $request->metros_cuadrados,
//                $request->numero_palmeras,
//                $request->tipo_de_suelo,
//                $request->ph,
//                $request->salinidad,
//                $request->tipo_de_predio,
//                $request->descripcion,
//                now('GMT-7')->format('Y-m-d'),
//                $request->latitud,
//                $request->longitud,
//            1
//            );
        //$this->model->savePredio($predio);
//        dd($predio);


//        $serivicoDePredios = app(PredioAsociacionController::class)->store($request);
//        $tipo_de_predio = json_encode($serivicoDePredios->original['approved']);
//        $tp = ($tipo_de_predio == "true");
//        $predio = new Predio(
//            (int)$request->metros_cuadrados,
//            (int)$request->palmeras_destinadas,
//            (int)$request->tipo_de_suelo,
//            (double)$request->temperatura,
//            (int)$request->clima,
//            (int)$request->humedad,
//            (double)$request->ph,
//            $request->salinidad,
//            $tp ? 1 : 0
//        );

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

    public function update(Request $request, $id)
    {
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
        $resp = $this->model->deletePredio($id);
        if($resp == 0){
            echo "<script>";
            echo "alert('El predio que seleccionó ya no existe');";
            echo "</script>";
        }
        return !Auth::user('id') ? view('predios/needLogin') : redirect('predio');
    }

//    public function obtenerPaginador($req, $info)
//    {
//        $paginas = 15; // El numero de objetos(elementos) que se mostrarán
//        $total = count($info); // Numero de elementos que contiene nuestra coleccion
//        $actual = $req->page ?? 1;// Obtiene la pagina actual
//        $offset = ($actual - 1) * $paginas;// Numero de elementos que serán omitidos en esta pagina
//        $items = array_slice($info, $offset, $paginas);// Aqui es donde se recorta el arreglo
//        // Fuentes:    https://stackoverflow.com/questions/27213453/laravel-5-manual-pagination
//        return new LengthAwarePaginator($items, $total, $paginas, $actual, ['path' => $req->url()]);
//    }
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
