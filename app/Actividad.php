<?php

namespace App;

class Actividad{
    private $id;
    private $name;
    private $description;

    function __construct($name, $description, $id = 0){
        $this->$id;
        $this->name = $name;
        $this->description = $description;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
    }

    function getDescription(){
        return $this->description;
    }

    function setDescription($description){
        $this->description = $description;
    }

}


?>
