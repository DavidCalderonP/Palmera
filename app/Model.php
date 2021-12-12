<?php

namespace App;

class Model{

    private $DB;

    function __construct(){
        $this->DB = new DataBase();
    }

    function getPredios(){
        return $this->DB->getPredios();
    }

    function getPredio($id){
        return $this->DB->getPredio($id);
    }

    function savePredio($predio){
        $this->DB->savePredio($predio);
    }

    function deletePredio($id){
        return $this->DB->deletePredio($id);
    }

    function updatePredio($predio){
        $this->DB->updatePredio($predio);
    }

    function validarPredio($request){
        return $this->DB->validarPredio($request);
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
}
