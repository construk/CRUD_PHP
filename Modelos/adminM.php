<?php

require_once "conexionBD.php";

class AdminM extends conexionBD{
    public static function IngresoM($usuario){
        $pdo=ConexionBD::cBD()->prepare("SELECT usuario, clave FROM administradores WHERE usuario= :usuario");
        $pdo->bindParam(":usuario",$usuario,PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
    }
}