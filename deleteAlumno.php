<?php
	$conexion=mysqli_connect("localhost","root","","colegio") or
	die("Problemas con la conexión");
	$registros =  mysqli_query($conexion,'DELETE FROM alumno WHERE id='.$_GET["id"])
  	or die("Problemas en el select".mysqli_error($conexion));
	
	mysqli_close($conexion);

	echo '<script type="text/javascript"> 
		alert("Se ha eliminado el Alumno");
	</script>';

	header("Location: index.php");
	exit();
		
?>