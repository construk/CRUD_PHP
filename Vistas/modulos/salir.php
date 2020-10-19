<?php
    session_start();
    if(isset($_SESSION["ingreso"])){
        session_destroy();
        header("location:index.php?ruta=salir");
    }
?>
<br />
<h1>Haz cerrado sesión</h1>
