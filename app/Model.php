<?php

namespace App;

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

    function savePredio($predio)
    {
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

    function getActividades(){
        return $this->DB->getActividades();
    }

    function saveActividades($actividades, $predio){
        return $this->DB->saveActividades($actividades, $predio);
    }

    function validarPredio($request)
    {
        return $this->DB->validarPredio($request);
    }

    function forTable($id){
        return $this->DB->forTable($id);
    }

    //Palmeras Organicas en Predios No Organicos
    function obtenerPrediosNoOrganicos(){
        return $this->DB->obtenerPrediosNoOrganicos();
    }

    function obtenerPalmerasPorPredioNoOrganico($id){
        return $this->DB->obtenerPalmerasPorPredioNoOrganico($id);
    }

    function saveActividadesPredNoOrg($actividad){
        return $this->DB->saveActividadesPredNoOrg($actividad);
}

}
