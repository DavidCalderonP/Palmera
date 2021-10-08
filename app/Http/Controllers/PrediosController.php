<?php

namespace App\Http\Controllers;

use App\Model;
use App\Predio;
use Illuminate\Http\Request;

class PrediosController extends Controller{

    private $model;

    function __construct(){
        $this->model = new Model();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = $this->model->getPredios();
        print_r($res);
        dd($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $serivicoDePredios = app(PredioAsociacionController::class)->store($request);
        $tipo_de_predio =  json_encode($serivicoDePredios->original['approved']);
        print("tipo de bool");
        var_dump($tipo_de_predio);
        $tp = ($tipo_de_predio=="true");
        $predio = new Predio(
            (int)$request->tamano_del_predio,
            (int)$request->palmeras_estimadas,
            $request->tipo_de_suelo,
            (double)$request->temperatura,
            (int)$request->clima,
            (int)$request->humedad,
            (double)$request->ph,
            $request->salinidad,
            $tp ? 1 : 0
            );
        $this->model->savePredio($predio);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
