<?php
session_start();
require_once 'cnn.php';
require_once 'cdn.html';
?>
<?php
//Validar que el usuario hizo clik en el Boton enviar 
if (isset($_POST['enviar'])) {
	//Trae datos del formulario
	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$carrera = $_POST['carrera'];
	//Validar que las cajas no esten vacias
	if (!empty($matricula) && !empty($nombre) && !empty($carrera)) {
		//Insertar datos en la tabla de la db  
		$sql = $cnnPDO->prepare("INSERT INTO alumnoss
                (matricula, nombre, carrera) VALUES (:matricula, :nombre, :carrera )");

		//Asignar las variables a los campos de la tabla
		$sql->bindParam(':matricula', $matricula);
		$sql->bindParam(':nombre', $nombre);
		$sql->bindParam(':carrera', $carrera);

		//Ejecutar la variable $sql
		$sql->execute();
		unset($sql);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alumnos</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="img/logo.png" rel="icon">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3">
				<div class="form">
					<div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"></div>

					<form class="login-form" method="POST">
						<input type="text" placeholder="Matricula" name="matricula">
						<input type="text" placeholder="Nombre Completo" name="nombre">
						<label class="form-label " for="validationCustom03">
							&nbsp;Carrera
						</label>
						<select aria-label="Default select example" name="carrera" class="form-select" id="validationCustom03" required="">
							<option selected="">
							</option>
							<option value="TECNOLOGÍAS DE LA INFORMACIÓN">
								TECNOLOGÍAS DE LA INFORMACIÓN
							</option>
							<option value="PROCESOS DE PRODUCCIÓN">
								PROCESOS DE PRODUCCIÓN
							</option>
							<option value="DESARROLLO DE NEGOCIOS">
								DESARROLLO DE NEGOCIOS
							</option>
							<option value="PROCESOS Y OPERACIONES INDUSTRIALES">
								PROCESOS Y OPERACIONES INDUSTRIALES
							</option>
							<option value="REDES INTELIGENTES Y CIBERSEGURIDAD">
								REDES INTELIGENTES Y CIBERSEGURIDAD
							</option>
							<option value="ENERGÍAS RENOVABLES">
								ENERGÍAS RENOVABLES
							</option>
						</select>
						<div class="invalid-feedback">
							Por favor, indique el tipo de cuenta
						</div>
						<br>
						<button type="submit" name="enviar">Registrar</button>
						<br>
						<br>

						<div class=" offset-8 col-4">
							<a href="admin.php" style="letter-spacing: 3px;">
								<h5>Regresar</h5>
							</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>