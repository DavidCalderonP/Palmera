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

    function savePredio(Predio $predio){
        $this->DB->savePredio($predio);
    }

    function deletePredio($id){
        $this->DB->deletePredio($id);
    }

    function updatePredio(Predio $predio, $id){
        $this->DB->updatePredio($predio, $id);
    }
}
