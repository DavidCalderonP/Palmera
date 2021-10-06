<?php

namespace App;

class Predio{

    private $id;
    private $metros_cuadrados;
    private $palmeras_destinadas;
    private $tipo_de_suelo;
    private $temperatura;
    private $clima;
    private $humedad;
    private $ph;
    private $salinidad;
    private $tipo_de_predio;

    function __construct($metros_cuadrados,  $palmeras_destinadas,  $tipo_de_suelo,  $temperatura,  $clima,  $humedad,  $ph,  $salinidad,  $tipo_de_predio, $id = ''){

        $this->id = $id;
        $this->metros_cuadrados = $metros_cuadrados;
        $this->palmeras_destinadas = $palmeras_destinadas;
        $this->tipo_de_suelo = $tipo_de_suelo;
        $this->temperatura = $temperatura;
        $this->clima = $clima;
        $this->humedad = $humedad;
        $this->ph = $ph;
        $this->salinidad = $salinidad;
        $this->tipo_de_predio = $tipo_de_predio;
    }

    function getMetrosCuadrados(){
        return $this->metros_cuadrados;
    }

    function setMetrosCuadrados($metros_cuadrados){
        $this->metros_cuadrados = $metros_cuadrados;
    }

    function getPalmerasDestinadas(){
        return $this->palmeras_destinadas;
    }

    function setPalmerasDestinadas($palmeras_destinadas){
        $this->palmeras_destinadas = $palmeras_destinadas;
    }

    function getTipoDeSuelo(){
        return $this->tipo_de_suelo;
    }

    function setTipoDeSuelo($tipo_de_suelo){
        $this->tipo_de_suelo= $tipo_de_suelo;
    }

    function getTemperatura(){
        return $this->temperatura;
    }

    function setTemperatura($temperatura){
        $this->temperatura = $temperatura;
    }

    function getClima(){
        return $this->clima;
    }

    function setClima($clima){
        $this->clima = $clima;
    }

    function getHumedad(){
        return $this->humedad;
    }

    function setHumedad($humedad){
        $this->humedad = $humedad;
    }

    function getPh(){
        return $this->ph;
    }

    function setPh($ph){
        $this->ph = $ph;
    }
    function getSalinidad(){
        return $this->salinidad;
    }

    function setSalinidad($salinidad){
        $this->salinidad = $salinidad;
    }
    function get(){
        return $this->tipo_de_predio;
    }

    function set($tipo_de_predio){
        $this->tipo_de_predio = $tipo_de_predio;
    }

}

