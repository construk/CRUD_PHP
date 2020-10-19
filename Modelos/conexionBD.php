<?php

class ConexionBD{
    public function cBD()
    {
        $bd= new PDO("mysql:host=yourHost;dbname=yourDBName","yourDBUser","yourDBPassword");
        return $bd;
    }
}