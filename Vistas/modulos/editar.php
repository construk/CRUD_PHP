<br />
<h1>EDITAR UN EMPLEADO</h1>
<?php
  require __DIR__."/../../Controladores/redireccionAutorizados.php";
?>
<form method="post">
  <?php
  $editar = new EmpleadosC();
  $editar -> ObtenerEmpleadoC();
  $editar -> ActualizarEmpleadoC();
  
  ?>
</form>