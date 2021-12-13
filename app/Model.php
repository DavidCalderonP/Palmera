<?php

namespace App;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use App\Models\Venta;

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
            $response = Http::post('http://f77e-2806-2f0-24a0-12b6-19c4-5958-53c2-aaf5.ngrok.io/api/predioValidacion', $request)->json();
        } catch (ConnectionException $failedConnection) {
            //dd("Esta fallando el servicio Web");
            return null;
        }
        return $response;
    }

    function obtenerProductos(){
        return $this->DB->obtenerProductos();
    }

    function getProductos() {
        return $this->DB->getProductos();
    }

    function getProductosFilter($search) {
        return $this->DB->getProductosFilter($search);
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

    function crearVenta($userID) {
        try {
            $venta = new Venta();
            $venta = $this->DB->asignaFolio($venta);
            $venta = $this->registrarFechaVenta($venta);
            $venta = $this->DB->guardarVenta($venta, $userID);
            return $venta;
        } catch (\Throwable $e) {
            dd($e);
            return null;
        }
    }

    function guardarCliente($venta, $userID) {
        try {
            $venta->setIdCliente((int)$userID);
            return $venta;
        } catch (\Throwable $e) {
            return null;
        }
    }
    function registrarFechaVenta($venta) {
        try {
            $venta->setFechaVenta(date('Y-m-d'));
            return $venta;
        } catch (\Throwable $e) {
            return null;
        }
    }
    function registrarLineaVenta($venta, $folio, $userID) {
        return $this->DB->registrarLineaVenta($venta, $folio, $userID);
    }
    function validaTDC($request) {
        return true;
    }

    function registrarPago($venta, $userID) {
        return $this->DB->registrarPago($request);
    }
}
