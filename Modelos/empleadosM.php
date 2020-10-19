<?php

require_once "conexionBD.php";

class EmpleadosM extends ConexionBD{
    const TABLA="empleados";
    public static function RegistrarEmpleadosM($datosC){
        $TABLA=EmpleadosM::TABLA;
        $pdo=ConexionBD::cBD()->prepare("INSERT INTO $TABLA (nombre,apellido,email,puesto,salario) VALUES (:nombre, :apellido, :email, :puesto, :salario)");
        $pdo->bindParam(":nombre",$datosC["nombre"],PDO::PARAM_STR);
        $pdo->bindParam(":apellido",$datosC["apellido"],PDO::PARAM_STR);
        $pdo->bindParam(":email",$datosC["email"],PDO::PARAM_STR);
        $pdo->bindParam(":puesto",$datosC["puesto"],PDO::PARAM_STR);
        $pdo->bindParam(":salario",$datosC["salario"],PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }else{
            return $pdo-> errorInfo();
        }
        $pdo->close();
    }
    public function MostrarEmpleadosM(){
        $TABLA=EmpleadosM::TABLA;
        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $TABLA");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
    }
    public static function ObtenerEmpleadoM($id){
        $TABLA=EmpleadosM::TABLA;
        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $TABLA WHERE id=:id");
        $pdo->bindParam(":id",$id,PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
    }
    public static function ActualizarEmpleadoM($empleado){
        $TABLA=EmpleadosM::TABLA;
        $pdo=ConexionBD::cBD()-> prepare("UPDATE $TABLA SET nombre=:nombre, apellido=:apellido, email=:email, puesto=:puesto,salario=:salario WHERE id=:id");
        $pdo->bindParam(":id",$empleado["id"],PDO::PARAM_INT);
        $pdo->bindParam(":nombre",$empleado["nombre"],PDO::PARAM_STR);
        $pdo->bindParam(":apellido",$empleado["apellido"],PDO::PARAM_STR);
        $pdo->bindParam(":email",$empleado["email"],PDO::PARAM_STR);
        $pdo->bindParam(":puesto",$empleado["puesto"],PDO::PARAM_STR);
        $pdo->bindParam(":salario",$empleado["salario"],PDO::PARAM_STR);
        if($pdo->execute()){
            return "Bien";
        }else{
            return $pdo-> errorInfo();
        }
        $pdo->close();
    }
    public static function BorrarEmpleadoM($id){
        $TABLA=EmpleadosM::TABLA;
        $pdo=ConexionBD::cBD()->prepare("DELETE FROM $TABLA WHERE id=:id");
        $pdo->bindParam(":id",$id,PDO::PARAM_INT);
        if($pdo->execute()){
            return "Bien";
        }else{
            return $pdo-> errorInfo();
        }
        $pdo->close();
    }
}

