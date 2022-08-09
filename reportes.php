<?php
session_start();
ob_start();
require_once "cdn.html";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-1">

			</div>
			<div class="col-12">

				<!-- INICIO SESION-->
				<!-- FORM-->
				<form method="POST" id="loginform">
					<!-- Usuarios Registrados-->
					<div class="gris" class="input-group flex-nowrap">
						<span class="input-group-text" id="addon-wrapping">
							<i class="fas fa-user-graduate"></i>&nbsp;&nbsp;&nbsp;Alumnos

						</span>
					</div>
					<!-- TABLA-->
					<table class="table table-hover">
						<thead>
							<tr>

								<th scope="col">Matricula</th>
								<th scope="col">Nombre</th>
								<th scope="col">Carrera</th>

							</tr>
						</thead>

						<!--MOSTRAR DATOS EN TABLA-->
						<?php
						include 'cnn.php';
						$sentencia = $cnnPDO->query("SELECT * from alumnos");
						$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
						?>
						<?php
						foreach ($resultado as $dato) {
						?>
							<tr>

								<td><?php echo $dato->matricula; ?></td>
								<td><?php echo $dato->nombre; ?></td>
								<td><?php echo $dato->carrera; ?></td>


							</tr>
						<?php
						} ?>
					</table>
					<br>
				</form><!-- FORM-->


			</div><!-- COL-6-->
			<div class="col-12">

				<!-- INICIO SESION-->
				<!-- FORM-->
				<form method="POST" id="loginform">
					<!-- Usuarios Registrados-->
					<div class="gris" class="input-group flex-nowrap">
						<span class="input-group-text" id="addon-wrapping">
							<i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;&nbsp;Profesores

						</span>
					</div>
					<!-- TABLA-->
					<table class="table table-hover">
						<thead>
							<tr>

								<th scope="col">Numero de empleado</th>
								<th scope="col">Nombre completo</th>


							</tr>
						</thead>

						<!--MOSTRAR DATOS EN TABLA-->
						<?php
						include 'cnn.php';
						$sentencia = $cnnPDO->query("SELECT * from profesores");
						$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
						?>
						<?php
						foreach ($resultado as $dato) {
						?>
							<tr>

								<td><?php echo $dato->nempleado; ?></td>
								<td><?php echo $dato->nombre; ?></td>



							</tr>
						<?php
						} ?>
					</table>
					<br>
				</form><!-- FORM-->



			</div><!-- COL-6-->
			<div class="col-12">

				<!-- INICIO SESION-->
				<!-- FORM-->
				<form method="POST" id="loginform">
					<!-- Usuarios Registrados-->
					<div class="gris" class="input-group flex-nowrap">
						<span class="input-group-text" id="addon-wrapping">

							<i class="fas fa-address-book"></i>&nbsp;&nbsp;&nbsp;Materias

						</span>
					</div>
					<!-- TABLA-->
					<table class="table table-hover">
						<thead>
							<tr>

								<th scope="col">ID de la materia</th>
								<th scope="col">Nombre </th>


							</tr>
						</thead>

						<!--MOSTRAR DATOS EN TABLA-->
						<?php
						include 'cnn.php';
						$sentencia = $cnnPDO->query("SELECT * from materias");
						$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
						?>
						<?php
						foreach ($resultado as $dato) {
						?>
							<tr>

								<td><?php echo $dato->id; ?></td>
								<td><?php echo $dato->nombre; ?></td>



							</tr>
						<?php
						} ?>
					</table>
					<br>
				</form><!-- FORM-->


			</div><!-- COL-6-->
		</div><!-- ROW -->
</body>

</html>
<?php
$html = ob_get_clean();
//echo "$html";
require_once 'libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("archivo.pdf", array("Attachment" => false));

?>