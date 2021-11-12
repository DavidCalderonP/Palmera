<?php

namespace App;

class SueloClass
{
    private $id;
    private $nombre;
    private $descripcion;

    function __construct($data){
        $this->id = $data->id;
        $this->nombre = $data->nombre;
        $this->descripcion = $data->descripcion;
    }

    function getNombre(){
        return $this->nombre;
    }

}
