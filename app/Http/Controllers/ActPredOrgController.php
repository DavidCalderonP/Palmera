<?php

namespace App\Http\Controllers;

use App\Model;
use App\Models\ActividadesPorPredio;
use App\Models\Palmera;
use App\Models\Predio;
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
    public function create($cache=null)
    {
        $number = 1;
        $word = "eowvbcielubcvie";
        $predios = $this->model->getAllPredios();
        $actividades = $this->model->getActividades();
        return view('ActPalOrgPredOrg.assingActivity', compact('number', 'word', 'predios', 'actividades'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_predio' => ['required'],
            'actividad_id' => ['required'],
            'fecha_programada' => ['required'],
        ]);
//        dd(substr($request->fecha_programada,0, 4));
        $fieldsRemaining = (['id' => null, 'palmera_id' => null, 'anio' => substr($request->fecha_programada, 0, 4), 'costo' => null, 'estatus' => 1, 'fecha_ejecucion' => null]);
//        dd($fieldsRemaining);
//        dd($request->all());
        $data = array_merge($request->all(), $fieldsRemaining);
        $asignacionMasiva = new ActividadesPorPredio($data);
        $res = $this->model->saveActividades($asignacionMasiva, $request->id_predio);
        return $res ? "Si jala" : "No jala";
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
