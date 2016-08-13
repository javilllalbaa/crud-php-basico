<?php
	error_reporting(0);
	if($_REQUEST[nombre] != "" and $_REQUEST[apellido] != "")
	{
		$conexion=mysqli_connect("localhost","root","","colegio") or
    	die("Problemas con la conexión");

		mysqli_query($conexion,"insert into Alumno(nombre, apellido) values 
	                       ('$_REQUEST[nombre]','$_REQUEST[apellido]')")
	  	or die("Problemas en el select".mysqli_error($conexion));

		mysqli_close($conexion);

		echo '<script type="text/javascript"> 
			alert("Se ha creado el Alumno");
		</script>';
		
	}else if($_GET["id"] != ""  and $_GET["nom"] != "" and $_GET["ape"] != "")
	{
		$conexion=mysqli_connect("localhost","root","","colegio") or
    	die("Problemas con la conexión");
    	$id = $_GET["id"];
    	$valor1 = $_GET["nom"];
    	$valor2 = $_GET["ape"];


		/*mysqli_query($conexion,'UPDATE TABLE alumno SET nombre='.$_GET["nom"].' apellido='.$_GET["ape"])
	  	or die("Problemas en el select".mysqli_error($conexion));

		mysqli_close($conexion);*/
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Prueba para desarrollador php</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
</head>
<body>
<div class="titulo">
	<h1>prueba para el desarrollador</h1>	
</div>

<div class="form" id="form">
<form action="index.php" method="post">
  <div class="form-group">
    <label>Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $valor1; ?>" placeholder="Ingrese su nombre">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
  </div>
  <div class="form-group">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $valor2 ?>" placeholder="Ingrese su apellido">
  </div>
  <div id="btn">
  <?php
  	if($valor1 != ""  and $valor2 != "")
  	{
  ?>
	<button class="btn btn-success" id="actualizar" >Actulizar</button>  	
  <?php
  	}else
  	{
  ?>
  	<button type="submit" class="btn btn-success">Crear</button>  	
  <?php
  	}
  ?>	
  </div>
  
</form>	

<table class="table table-condensed">
	<tr>
		<td>
			Nombre
		</td>
		<td>
			Apellido
		</td>
		<td>
			Editar
		</td>
		<td>
			Borrar
		</td> </a>
	</tr>
</table>

</div>

<script>
$(document).ready(function(){
	registros();
	function registros() 
	{
		$.ajax({
	    // En data puedes utilizar un objeto JSON, un array o un query string
	    //data: {"parametro1" : "valor1", "parametro2" : "valor2"},
	    //Cambiar a type: POST si necesario
	    type: "GET",
	    // Formato de datos que se espera en la respuesta
	    dataType: "json",
	    // URL a la que se enviará la solicitud Ajax
	    url: "selectAlumnos.php",
		})
		 .done(function( data, textStatus, jqXHR ) 
		 {
		     if ( console && console.log ) 
		     {
		         console.log( "La solicitud se ha completado correctamente." );
		         console.log(data);
		         $.each(data, function(i, field){
	             //$("div").append(field + " ");
	             $("table").append('<tr><td>'+field.nombre+'</td><td>'+field.apellido+'</td><td><a href="index.php?id='+field.id+'&nom='+field.nombre+'&ape='+field.apellido+'">Editar</a></td><td><a href="deleteAlumno.php?id='+field.id+'">Borrar</a></td></tr>');
	             //console.log(field.nombre);
	        });
		 	 }
	 	})
	}

 	$("#actualizar").click(function(){

 		$("#form").submit(function(){
 			return false;
 		})

 		var parametros = {
                "valorCaja1" : $("#nombre").val(),
                "valorCaja2" : $("#apellido").val(),
                "valorCaja3" : $("#id").val(),
        };

		$.ajax({
	    // En data puedes utilizar un objeto JSON, un array o un query string
	    data: parametros,
	    //Cambiar a type: POST si necesario
	    type: "GET",
	    // Formato de datos que se espera en la respuesta
	    //dataType: "json",
	    // URL a la que se enviará la solicitud Ajax
	    url: "EditAlumno.php",
		})
		 .done(function( data, textStatus, jqXHR ) 
		 {
		     if ( console && console.log ) 
		     {
		         console.log( "La solicitud se ha completado correctamente." );
		         window.location.href = "index.php";
		         alert(data);
		 	 }
	 	})

 	})    
});
</script>

</body>
</html>