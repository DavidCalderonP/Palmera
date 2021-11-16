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

    function validarPredio(){
        $this->DB->validarPredio();
    }
}
