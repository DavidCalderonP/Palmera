<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\Suelo;
use App\Predio;
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

    public function index(Request $request){
        //Log::info(now('GMT-7')->format('Y-m-d'));
        $query = $this->model->getPredios();
        $res['res'] = $this->obtenerPaginador($request, $query);//Se envia el request y la informacion
//        $relation = \App\Models\Predio::find('P005')->suelos;
//        dd($relation);
//        $date = now();
//        var_dump($date->toDateTimeString());
//        foreach (Suelo::all() as $suelo){
//            var_dump(json_encode($suelo));
//        }
        //$this->model->validarPredio();
        return view('predios/indexPredio', $res);
    }

    public function create()
    {
//        if (!Auth::user('id')) {
//            return view('predios/needLogin');
//        }
//        return view('predios.createPredio');
        return !Auth::user('id') ? view('predios/needLogin') : view('predios.createPredio');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'metros_cuadrados' => ['required'],
//            'numero_palmeras' => ['required'],
//            'tipo_de_suelo' => ['required'],
//            'temperatura' => ['required'],
//            'clima' => ['required'],
//            'humedad' => ['required'],
//            'ph' => ['required'],
//            'salinidad' => ['required'],
//        ]);

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
        $predio = new \App\Predio(
                $request->metros_cuadrados,
                $request->numero_palmeras,
                $request->tipo_de_suelo,
                $request->ph,
                $request->salinidad,
                $request->tipo_de_predio,
                $request->descripcion,
                now('GMT-7')->format('Y-m-d'),
                $request->latitud,
                $request->longitud,
            1
            );
        $this->model->savePredio($predio);
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
//        $this->model->savePredio($predio);
//        return redirect('predio');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {

//        if (!Auth::user('id')) {
//            echo "<script>";
//            echo "alert('Es necesario inciar sesión.');";
//            echo "</script>";
//
//            return redirect('login');
//        }
//        $predio = $this->model->getPredio($id);
//        if ($predio == null) {
//            echo "<script>";
//            echo "alert('El predio que seleccionó ya no existe');";
//            echo "</script>";
//            return redirect('predio');
//        }
        $predio = $this->model->getPredio($id);
        if($predio == null){
            return view('predios/predioDoesntExist');
        }
        return !Auth::user($id) ? view('predios/needLogin') : view('predios.editPredio', compact('predio'));
    }

    public function update(Request $request, $id)
    {

        $predio = new Predio(
            (int)$request->metros_cuadrados,
            (int)$request->palmeras_destinadas,
            $request->tipo_de_suelo,
            (double)$request->temperatura,
            (int)$request->clima,
            (int)$request->humedad,
            (double)$request->ph,
            (double)$request->salinidad,
            (int)$request->tipo_de_predio
        );
        $this->model->updatePredio($predio, $id);
        return redirect('predio');
    }

    public function destroy($id)
    {
        if (!Auth::user('id')) {
            echo "<script>";
            echo "alert('Es necesario inciar sesión.');";
            echo "</script>";
            return redirect('login');
        }
        $this->model->deletePredio($id);
        return redirect('predio');
    }

    public function obtenerPaginador($req, $info)
    {
        $paginas = 2; // El numero de objetos(elementos) que se mostrarán
        $total = count($info); // Numero de elementos que contiene nuestra coleccion
        $actual = $req->page ?? 1;// Obtiene la pagina actual
        $offset = ($actual - 1) * $paginas;// Numero de elementos que serán omitidos en esta pagina
        $items = array_slice($info, $offset, $paginas);// Aqui es donde se recorta el arreglo
        // Fuentes:    https://stackoverflow.com/questions/27213453/laravel-5-manual-pagination
        return new LengthAwarePaginator($items, $total, $paginas, $actual, ['path' => $req->url()]);
    }
}
