<?php
ob_start();
require_once "cdn.html";
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
			<div class="col-10">

				<!-- INICIO SESION-->
				<!-- FORM-->
				<form method="POST">
					<!-- Usuarios Registrados-->
					<div class="gris" class="input-group flex-nowrap">
						<span class="input-group-text" id="addon-wrapping">
							Alumnos-Materias
						</span>
					</div>
					<!-- TABLA-->
					<table class="table table-striped">
						<thead>
							<tr>

								<th scope="col">Alumno</th>
								<th scope="col">Profesor</th>
								<th scope="col">Materia</th>

							</tr>
						</thead>

						<!--MOSTRAR DATOS EN TABLA-->
						<?php
						include 'cnn.php';
						$sentencia = $cnnPDO->query("SELECT * from materiaprofesor");
						$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
						?>
						<?php
						foreach ($resultado as $dato) {
						?>
							<tr>

								<td><?php echo $dato->alumno; ?></td>
								<td><?php echo $dato->profesor; ?></td>
								<td><?php echo $dato->materia; ?></td>


							</tr>
						<?php
						} ?>
					</table>
					<div class=" offset-10 col-4">
						<a href="admin.php" style="letter-spacing: 3px;">
							<h5>Regresar</h5>
						</a>
					</div>
					<br>
				</form><!-- FORM-->
			</div>


		</div>
	</div>
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