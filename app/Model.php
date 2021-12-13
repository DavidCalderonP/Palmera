<?php

namespace App;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class Model
{

    private $DB;

    function __construct()
    {
        $this->DB = new DataBase();
    }

    function getPredios()
    {
        return $this->DB->getPredios();
    }

    function getPredio($id)
    {
        return $this->DB->getPredio($id);
    }

    function savePredio(\App\Models\Predio $predio)
    {
        if ($predio->getTipoDePredio() == 1) {
            $respuestaServicio = $this->validarPredio([
                "metros_cuadrados" => $predio->getMetrosCuadrados(),
                "numero_palmeras" => $predio->getNumeroDePalmeras(),
                "tipo_de_suelo" => $predio->getTipoDeSuelo(),
                "ph" => $predio->getPh(),
                "salinidad" => $predio->getSalinidad()
            ]);
            if(!$respuestaServicio){
                return false;
            }
            $predio->setTipoDePredio($respuestaServicio['approved']);
        }
        return $this->DB->savePredio($predio);
    }

    function deletePredio($id)
    {
        return $this->DB->deletePredio($id);
    }

    function updatePredio($predio)
    {
        $this->DB->updatePredio($predio);
    }

    function obtenerPrediosOrganicos()
    {
        return $this->DB->obtenerPrediosOrganicos();
    }

    function getActividades()
    {
        return $this->DB->getActividades();
    }

    function saveActividades($actividades, $predio)
    {
        return $this->DB->saveActividades($actividades, $predio);
    }

    function forTable($id)
    {
        return $this->DB->forTable($id);
    }

    //Palmeras Organicas en Predios No Organicos
    function obtenerPrediosNoOrganicos()
    {
        return $this->DB->obtenerPrediosNoOrganicos();
    }

    function obtenerPalmerasPorPredioNoOrganico($id)
    {
        return $this->DB->obtenerPalmerasPorPredioNoOrganico($id);
    }

    function saveActividadesPredNoOrg($actividad)
    {
        return $this->DB->saveActividadesPredNoOrg($actividad);
    }

    function forTableActPalOrgPredNoOrg($id)
    {
        return $this->DB->forTableActPalOrgPredNoOrg($id);
    }

    public function validarPredio($request)
    {
        try {
            $response = Http::post('http://localhost:4000/api/predioValidacion', $request)->json();
        } catch (ConnectionException $failedConnection) {
            //dd("Esta fallando el servicio Web");
            return null;
        }
        return $response;
    }

    function getProductos() {
        return $this->DB->getProductos();
    }

    function agregarCarrito($request) { 
        return $this->DB->agregarCarrito($request);
    }

    function getCarrito($userID) { 
        return $this->DB->getCarrito($userID);
    }

    function deleteCarrito($id) { 
        return $this->DB->deleteCarrito($id);
    }

    function getImporte($carrito) {
        $importe = 0.0;
        foreach($carrito as $item) {
            $importe = $importe + ($item->getCantidad() * $item->productos->getCosto());
        }
        $importe = $importe * 1.16;
       return $importe;
    }

    function validaTDC($request) {
        return true;
    }

    function registrarPago($request) {
        dd($request);
    }
}
