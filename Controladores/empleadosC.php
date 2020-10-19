<?php
/**
 * Clase controladora de empleados.
 */
class EmpleadosC{
    /**
     * Permite registrar a los empleados a traves de los datos enviados por el formulario mediante POST.
     */
    public function RegistrarEmpleadosC(){
        //Si se recibe información mediante POST
        if(isset($_POST["nombreR"])){
            //Crear array mapeado con los valores del empleado.
            $empleado = array(
                "nombre"=>$_POST["nombreR"],
                "apellido"=>$_POST["apellidoR"],
                "email"=>$_POST["emailR"],
                "puesto"=>$_POST["puestoR"],
                "salario"=>$_POST["salarioR"]
            );
            //Enviar petición al modelo.
            $respuesta = EmpleadosM::RegistrarEmpleadosM($empleado);
            //Si la respuesta es "Bien" redireccionar a empleados, sino mostrar error.
            if($respuesta=="Bien"){
                header("location:index.php?ruta=empleados");
            }else{
                echo $respuesta[0].$respuesta[1].$respuesta[2];
            }
        }
    }
    /**
     * Muestra los empleados registrados en la base de datos.
     */
    public function MostrarEmpleadosC(){
        //Obtener empleados del modelo.
        $empleados = EmpleadosM::MostrarEmpleadosM();
        //Por cada empleado añadir una fila a la tabla con sus valores.
        foreach($empleados as $key=>$value){
            echo '<tr>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["apellido"].'</td>
            <td>'.$value["email"].'</td>
            <td>'.$value["puesto"].'</td>
            <td>$'.$value["salario"].'</td>
            <td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
            <td><a href="index.php?ruta=empleados&idB='.$value["id"].'"><button>Borrar</button></a></td>
          </tr>';
        }
    }
    /**
     * Obtiene el empleado a editar en el formulario de edición.
     */
    public function ObtenerEmpleadoC(){
        //Obtener id del empleado a editar de la ruta (GET).
        $id = $_GET["id"];
        //Solicitar información sobre el empleado a editar.
        $empleado = EmpleadosM::ObtenerEmpleadoM($id);
        //Mostrar formulario con los datos del empleado obtenido.
        echo '
        <input type="hidden" name="idE" value="'.$empleado["id"].'" required />

        <input type="text" name="nombreE" value="'.$empleado["nombre"].'" required/>

        <input type="text" name="apellidoE" value="'.$empleado["apellido"].'" required />
    
        <input type="email" name="emailE" value="'.$empleado["email"].'" required />
    
        <input type="text" name="puestoE" value="'.$empleado["puesto"].'" required />
    
        <input type="text" name="salarioE" value="'.$empleado["salario"].'" required />
      
        <input type="submit" value="Actualizar" />';
    }
    /**
     * Permite actualizar la información de un empleado.
     */
    public function ActualizarEmpleadoC(){
        //Si se ha enviado datos a través de una petición POST.
        if(isset($_POST["nombreE"])){
            //Obtener empleado recibido por POST y añadirlo a un array mapeado.
            $empleado = array(
                "id"=>$_POST["idE"],
                "nombre"=>$_POST["nombreE"],
                "apellido"=>$_POST["apellidoE"],
                "email"=>$_POST["emailE"],
                "puesto"=>$_POST["puestoE"],
                "salario"=>$_POST["salarioE"]
            );
            //Obtener respuesta del modelo.
            $respuesta = EmpleadosM::ActualizarEmpleadoM($empleado);
            //Si la respuesta es "Bien" redireccionar a empleados, sino mostrar error.
            if($respuesta=="Bien"){
                header("location:index.php?ruta=empleados");
            }else{
                echo $respuesta[0].$respuesta[1].$respuesta[2];
            }
        }
    }
    /**
     * Permite borrar un empleado.
     */
    public function BorrarEmpleadoC(){
        //Si se obtiene petición GET con al id de un usuario.
        if(isset($_GET["idB"])){
            $id = $_GET["idB"];
            //Solicitar la eliminación al modelo.
            $respuesta = EmpleadosM::BorrarEmpleadoM($id);
            //Si la respuesta es "Bien" se redirecciona a empleados, sino se muestra el error.
            if($respuesta=="Bien"){
                header("location:index.php?ruta=empleados");
            }else{
                echo $respuesta[0].$respuesta[1].$respuesta[2];
            }
        }
    }
}