<?php

namespace App\Http\Controllers;

use App\Model;
use App\Predio;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PrediosController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = new Model();
    }

    public function index()
    {
        $res = $this->model->getPredios();
        $date = now();
        Log::info($date->toDateTimeString());
        //$this->model->validarPredio();
        return view('predios/indexPredio', compact('res'));
    }

    public function create()
    {
        if (!Auth::user('id')) {
            echo "<script>";
            echo "alert('Es necesario inciar sesión.');";
            echo "</script>";

            return redirect('login');
        }
        return view('predios.createPredio');
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
            'metros_cuadrados' => ['metros_cuadrados'],
            'numero_palmeras' => ['numero_palmeras'],
            'tipo_de_suelo' => ['tipo_de_suelo'],
            'ph' => ['ph'],
            'salinidad' => ['salinidad'],
            'tipo_de_predio' => ['tipo_de_predio'],
            'descripcion' => ['descripcion'],
            'fecha_creacion' => ['fecha_creacion'],
            'latitud' => ['latitud'],
            'longitud' => ['longitud'],
            'estatus' => ['estatus'],
        ]);


        $serivicoDePredios = app(PredioAsociacionController::class)->store($request);
        $tipo_de_predio = json_encode($serivicoDePredios->original['approved']);
        $tp = ($tipo_de_predio == "true");
        $predio = new Predio(
            (int)$request->metros_cuadrados,
            (int)$request->palmeras_destinadas,
            (int)$request->tipo_de_suelo,
            (double)$request->temperatura,
            (int)$request->clima,
            (int)$request->humedad,
            (double)$request->ph,
            $request->salinidad,
            $tp ? 1 : 0
        );
        $this->model->savePredio($predio);
        return redirect('predio');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        if (!Auth::user('id')) {
            echo "<script>";
            echo "alert('Es necesario inciar sesión.');";
            echo "</script>";

            return redirect('login');
        }
        $predio = $this->model->getPredio($id);
        if ($predio == null) {
            echo "<script>";
            echo "alert('El predio que seleccionó ya no existe');";
            echo "</script>";
            return redirect('predio');
        }
        return view('predios.editPredio', compact('predio'));
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
}
