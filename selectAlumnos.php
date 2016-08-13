<?php
	$conexion=mysqli_connect("localhost","root","","colegio") or
	die("Problemas con la conexión");

	$registros =  mysqli_query($conexion,"SELECT * FROM alumno")
  	or die("Problemas en el select".mysqli_error($conexion));

	//mysqli_close($conexion);
	while($row = mysqli_fetch_array($registros))
	{
		$rows[] =  $row;
	}
	echo json_encode($rows);

?>