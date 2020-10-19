<?php
  //Comprueba en la variable de sesión si ha iniciado sesión, si no lo ha hecho se redirecciona a la página para iniciar sesión.
  session_start();
  if(!isset($_SESSION["ingreso"])){
      header("location:index.php?ruta=ingreso");
  }
