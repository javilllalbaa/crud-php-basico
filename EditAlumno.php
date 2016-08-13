<?php
	$conexion=mysqli_connect("localhost","root","","colegio") or
	die("Problemas con la conexión");
	$registros =  mysqli_query($conexion,'UPDATE alumno SET nombre="'.$_GET["valorCaja1"].'", apellido="'.$_GET["valorCaja2"].'" WHERE id='.$_GET["valorCaja3"])
  	or die("Problemas en el select".mysqli_error($conexion));
	
	mysqli_close($conexion);

	echo "Se actulizo el alumno";
		
?>