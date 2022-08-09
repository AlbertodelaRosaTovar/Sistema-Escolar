<?php
session_start();
require_once 'cnn.php';
require_once 'cdn.html';
?>
<?php
//Validar que el usuario hizo clik en el Boton enviar 
if (isset($_POST['enviar'])) {
	//Trae datos del formulario
	$idM = $_POST['idM'];
	$nombre = $_POST['nombre'];

	//Validar que las cajas no esten vacias
	if (!empty($idM) && !empty($nombre)) {
		//Insertar datos en la tabla de la db  
		$sql = $cnnPDO->prepare("INSERT INTO materias
                (idM, nombre) VALUES (:idM, :nombre )");

		//Asignar las variables a los campos de la tabla
		$sql->bindParam(':idM', $idM);
		$sql->bindParam(':nombre', $nombre);


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
	<title>Materias</title>
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
						<input type="text" placeholder="ID de la materia" name="idM">
						<input type="text" placeholder="Nombre " name="nombre">

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
			<div class="col-6">

			</div>

		</div>
	</div>
</body>

</html>