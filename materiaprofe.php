<?php
session_start();
require_once 'cnn.php';
require_once 'cdn.html';
?>

<?php
//Validar que el usuario hizo clik en el Boton enviar 
if (isset($_POST['enviar'])) {
	//Trae datos del formulario
	$alumno = $_POST['alumno'];
	$profesor = $_POST['profesor'];
	$materia = $_POST['materia'];
	//Validar que las cajas no esten vacias
	if (!empty($alumno) && !empty($profesor) && !empty($materia)) {
		//Insertar datos en la tabla de la db  
		$sql = $cnnPDO->prepare("INSERT INTO materiaprofesor
                (alumno, profesor, materia) VALUES (:alumno, :profesor, :materia )");

		//Asignar las variables a los campos de la tabla
		$sql->bindParam(':alumno', $alumno);
		$sql->bindParam(':profesor', $profesor);
		$sql->bindParam(':materia', $materia);

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
						<label class="form-label " for="validationCustom03">
							&nbsp;Alumno
						</label>
						<select name="alumno" class="form-select" aria-label="Default select example">
							<option selected="">
							</option>
							<?php
							include 'cnn.php';
							$sentencia = $cnnPDO->query("SELECT * FROM alumnoss");
							$alumnos = $sentencia->fetchALL(PDO::FETCH_OBJ);
							?>
							<?php
							foreach ($alumnos as $dato) {
							?>
								<option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
							<?php
							}
							echo "</select>";
							?>
							<br>
						</select>
						<label class="form-label " for="validationCustom03">
							&nbsp;Profesor
						</label>
						<select class="form-select" name="profesor" aria-label="Default select example">
							<option selected> </option>
							<?php
							include 'cnn.php';
							$sentencia = $cnnPDO->query("SELECT * FROM profesoress");
							$profesores = $sentencia->fetchALL(PDO::FETCH_OBJ);
							?>
							<?php
							foreach ($profesores as $dato) {
							?>
								<option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
							<?php
							}
							echo "</select>";
							?>
							<br>

						</select>
						<label class="form-label " for="validationCustom03">
							&nbsp;Carrera
						</label>
						<select class="form-select" name="materia" aria-label="Default select example">
							<option selected> </option>
							<?php
							include 'cnn.php';
							$sentencia = $cnnPDO->query("SELECT * FROM materias");
							$materias = $sentencia->fetchALL(PDO::FETCH_OBJ);
							?>
							<?php
							foreach ($materias as $dato) {
							?>
								<option value="<?php echo $dato->nombre; ?>"><?php echo $dato->nombre; ?></option>
							<?php
							}
							echo "</select>";
							?>
							<br>
						</select>
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