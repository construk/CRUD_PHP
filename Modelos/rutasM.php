<?php

class RutasM{
    static public function ObtenerVista($rutas){
        if($rutas=="Ingreso"||$rutas=="registrar"||$rutas=="empleados"||$rutas=="editar"||$rutas=="salir"){
            $pagina = "Vistas/modulos/".$rutas.".php";
        }else{
            $pagina = "Vistas/modulos/ingreso.php";
        }
        return $pagina;
    }
}