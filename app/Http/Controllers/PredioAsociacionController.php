<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredioAsociacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {

        dd($request);
    }
    */

    public function store(Request $request)
    {
        $tamano_optimo_palmera = 10; //m2
        $points = 0.0;
        $acceptable = 5.8;
        $res = [
            'metros_cuadrados' => $request->metros_cuadrados,
            'palmeras_destinadas' => $request->palmeras_destinadas,
            'tipo_de_suelo' => $request->tipo_de_suelo,
            'temperatura' => $request->temperatura,
            'clima' => $request->clima,
            'humedad' => $request->humedad,
            'ph' => $request->ph,
            'salinidad' => $request->salinidad
        ];
        $aux = floor($res['metros_cuadrados'] / $res['palmeras_destinadas']);
        //print($aux);
        if ($aux < $tamano_optimo_palmera && $aux > 0) {
            switch ($aux) {
                case 9:
                    $points += 0.8;
                    //print("Entro al 9 " . $aux);
                    break;
                case 8:
                    $points += 0.6;
                    //print("Entro al 8 " . $aux);
                    break;
                case 7:
                    $points += 0.4;
                    //print("Entro al 7 " . $aux);
                    break;
                case 6:
                    $points += 0.2;
                    //print("Entro al 6 " . $aux);
                    break;
            }
        } else {
            $points += 1.0;
        }
        $floor = $res['tipo_de_suelo'];
        switch ($floor) {
            case 'arenoso':
                $points += 1.0;
                break;
            case 'calizo':
                $points += 0.8;
                break;
            case 'fertil':
                $points += 0.6;
                break;
            case 'arcilloso':
                $points += 0.4;
                break;
            case 'predregoso':
                $points += 0.2;
                break;
            case 'mixto':
                $points += 0.0;
                break;
        }

        $temperature = round($res['temperatura']);
        $diff = abs(abs($temperature) - 30);
        switch ($temperature) {
            case $diff == 0:
                $points += 1.0;
                break;
            case $diff == 1:
                $points += 0.8;
                break;
            case $diff == 2:
                $points += 0.6;
                break;
            case $diff == 3:
                $points += 0.4;
                break;
            case $diff == 4:
                $points += 0.2;
                break;
            case $diff == 5:
                $points += 0.0;
                break;
            default:
                $points -= 0.3;
                break;
        }

        $clima = $res['clima'];

        switch ($clima) {
            case 1:
                $points += 0.4;
                //print('calido_humedo');
                break;
            case 2:
                $points += 0.6;
                //print('calido_subhumedo');
                break;
            case 3:
                $points += 0.8;
                //print('muy_seco_o_seco_desértico');
                break;
            case 4:
                $points += 1.0;
                //print('seco_o_semiseco');
                break;
            case 5:
                $points += 0.2;
                //print('templado_humedo');
                break;
            case 6:
                $points += 0.0;
            //print('templado_subhumedo');
        }
        $humedad = $res['humedad'];
        switch ($humedad) {
            case 1:
                $points += 1.0;
                break;
            case 2:
                $points += 0.5;
                break;
            case 3:
                $points += 0.0;
                break;
        }
        $ph = $res['ph'];
        switch ($ph) {
            case $ph > -1 && $ph < 2:
                $points += 0.0;
                //print("Caso 1");
                break;
            case $ph >= 2 && $ph < 4:
                $points += 0.3;
                //print("Caso 2");
                break;
            case $ph >= 4 && $ph < 6:
                $points += 0.7;
                //print("Caso 3");
                break;
            case $ph >= 6 && $ph <= 7:
                $points += 1.0;
                //print("Caso 4");
                break;
            case $ph > 7 && $ph < 9:
                $points += 0.7;
                //print("Caso 5");
                break;
            case $ph >= 9 && $ph < 11:
                $points += 0.3;
                //print("Caso 6");
                break;
            case $ph >= 11 && $ph < 13:
                $points += 0.0;
                //print("Caso 7");
                break;
            case $ph >= 13:
                $points -= 0.3;
                //print("Caso 8");
                break;
        }
        $salinidad = $res['salinidad'];
        switch ($salinidad) {
            case $salinidad >= 3.0 && $salinidad <= 3.5:
                //print("Entro al caso 1");
                $points += 1.0;
                break;
            case ($salinidad >= 2.5 && $salinidad <= 2.9) || ($salinidad >= 5.1 && $salinidad <= 5.5):
                //print("Entro al caso 2");
                $points += 0.8;
                break;
            case ($salinidad >= 2.0 && $salinidad <= 2.4) || ($salinidad >= 4.6 && $salinidad <= 5.0):
                //print("Entro al caso 3");
                $points += 0.6;
                break;
            case ($salinidad >= 1.5 && $salinidad <= 1.9) || ($salinidad >= 4.1 && $salinidad <= 4.5):
                //print("Entro al caso 4");
                $points += 0.4;
                break;
            case ($salinidad >= 1.0 && $salinidad <= 1.4) || ($salinidad >= 3.6 && $salinidad <= 4.0):
                //print("Entro al caso 5 ");
                ////print("actuales " . $points . " ");
                $points += 0.2;
                break;
            case ($salinidad > 1.0) || ($salinidad > 5.6):
                //print("Entro al caso 6");
                $points -= 0.3;
                break;
        }
        $result = [
            'acumulatedPoints' => $points,
            'neededPoints' => $acceptable,
            'approved' => $points >= $acceptable
        ];
        var_dump($result);
        return response($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
