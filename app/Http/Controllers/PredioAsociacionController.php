<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredioAsociacionController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }
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
        if ($aux < $tamano_optimo_palmera && $aux > 0) {
            switch ($aux) {
                case 9:
                    $points += 0.8;
                    break;
                case 8:
                    $points += 0.6;
                    break;
                case 7:
                    $points += 0.4;
                    break;
                case 6:
                    $points += 0.2;
                    break;
            }
        } else {
            $points += 1.0;
        }
        $floor = $res['tipo_de_suelo'];
        switch ($floor) {
            case 1:
                $points += 1.0;
                break;
            case 2:
                $points += 0.8;
                break;
            case 3:
                $points += 0.6;
                break;
            case 4:
                $points += 0.4;
                break;
            case 5:
                $points += 0.2;
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
                break;
            case 2:
                $points += 0.6;
                break;
            case 3:
                $points += 0.8;
                break;
            case 4:
                $points += 1.0;
                break;
            case 5:
                $points += 0.2;
                break;
            case 6:
                $points += 0.0;
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
                break;
            case $ph >= 2 && $ph < 4:
                $points += 0.3;
                break;
            case $ph >= 4 && $ph < 6:
                $points += 0.7;
                break;
            case $ph >= 6 && $ph <= 7:
                $points += 1.0;
                break;
            case $ph > 7 && $ph < 9:
                $points += 0.7;
                break;
            case $ph >= 9 && $ph < 11:
                $points += 0.3;
                break;
            case $ph >= 11 && $ph < 13:
                $points += 0.0;
                break;
            case $ph >= 13:
                $points -= 0.3;
                break;
        }
        $salinidad = $res['salinidad'];
        switch ($salinidad) {
            case $salinidad >= 3.0 && $salinidad <= 3.5:
                $points += 1.0;
                break;
            case ($salinidad >= 2.5 && $salinidad <= 2.9) || ($salinidad >= 5.1 && $salinidad <= 5.5):
                $points += 0.8;
                break;
            case ($salinidad >= 2.0 && $salinidad <= 2.4) || ($salinidad >= 4.6 && $salinidad <= 5.0):
                $points += 0.6;
                break;
            case ($salinidad >= 1.5 && $salinidad <= 1.9) || ($salinidad >= 4.1 && $salinidad <= 4.5):
                $points += 0.4;
                break;
            case ($salinidad >= 1.0 && $salinidad <= 1.4) || ($salinidad >= 3.6 && $salinidad <= 4.0):
                $points += 0.2;
                break;
            case ($salinidad > 1.0) || ($salinidad > 5.6):
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
