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

    public function index()
    {
        $res = $this->model->getPredios();
        return view('predios/indexPredio', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predios.createPredio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        //$serivicoDePredios = app(PredioAsociacionController::class)->store($request);
        $tipo_de_predio = "true"; //json_encode($serivicoDePredios->original['approved']);
        $tp = ($tipo_de_predio=="true");
        $predio = new Predio(
            (int)$request->metros_cuadrados,
            (int)$request->palmeras_destinadas,
            $request->tipo_de_suelo,
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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('predios.editPredio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predio = $this->model->getPredio($id);
        return view('predios.editPredio', compact('predio'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->deletePredio($id);
        return redirect('predio');
    }
}
