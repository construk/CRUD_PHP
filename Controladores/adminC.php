<?php
/**
 * Clase controladora encargada de gestionar el inicio de sesión.
 */
class AdminC{
    /**
     * Comprueba si existe el usuario en la base de datos, y si existe crea una variable de sesión.
     */
    public function IniciarSesionC(){
        if(isset($_POST["usuarioI"])){
            //Obtener variables del formulario enviados mediante petición POST.
            $usuario = $_POST["usuarioI"];
            $clave = $_POST["claveI"];
            //Obtener el hash de la clave ingresada para comprobarlo con el almacenado en la base de datos.
            $hashClave = hash("sha512",$_POST["claveI"]);
            //Obtener información relativa al usuario ingresado 
            $respuestaDB = AdminM::IngresoM($usuario);
            $usuarioDB=$respuestaDB["usuario"];
            $claveDB=$respuestaDB["clave"];
            //Si coincide usuario y contraseña: crear variable de sesión, sino mostrar mensaje de error al ingresar.
            if($usuarioDB==$usuario&&$claveDB==$hashClave){
                session_start();
                $_SESSION["ingreso"]=true;
                header("location:index.php?ruta=empleados");
            }else{
                echo "ERROR AL INGRESAR";
            }
        }
    }
}