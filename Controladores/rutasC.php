<?php

class RutasC
{
    public function Plantilla()
    {
        include "./Vistas/plantilla.php";
    }
    
    public function IncluirVista(){
        if(isset($_GET["ruta"])){
            $rutas = $_GET["ruta"];
        }else{
            $rutas="index";
        }

        $vista = RutasM::ObtenerVista($rutas);
        include $vista; 
    }
}
