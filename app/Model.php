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
}
