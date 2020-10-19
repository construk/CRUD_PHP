<nav>
	<ul>
	<?php
	session_start();
	if(!isset($_SESSION["ingreso"])){
		echo '<li><a href="index.php?ruta=ingreso">Ingresar</a></li>';
	}else{
		echo '<li><a href="index.php?ruta=registrar">Registrar</a></li>
		<li><a href="index.php?ruta=empleados">Empleados</a></li>
		<li><a href="index.php?ruta=salir">Salir</a></li>';
	}
	?>
	</ul>
</nav>