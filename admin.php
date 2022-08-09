<?php
session_start();
require_once 'cnn.php';
require_once 'cdn.html';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="img/logo.png" rel="icon">
	<title>Administrador</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-3 ">
				<div class="card">

					<a href="alumnos.php"><img src="img/alumnno.png" class="card-img-top" alt="Fissure in Sandstone" /></a>
					<div class="card-body">
						<h4 class="card-title text-center text-uppercase">Alumnos</h4>
						<a href="alumnos.php">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>
				</div>
			</div>

			<div class="col-3">
				<div class="card">
					<a href="profesor.php"> <img src="img/proffe.png" class="card-img-top" alt="Fissure in Sandstone" height="238" width="258" /></a>
					<div class="card-body">
						<h4 class="card-title text-center text-uppercase">Profesor</h4>
						<a href="profesor.php">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card">
					<a href="materias.php"> <img src="img/mat.png" class="card-img-top" alt="Fissure in Sandstone" height="238" width="258" /></a>
					<div class="card-body">
						<h4 class="card-title text-center text-uppercase">Materias</h4>
						<a href="materias.php">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-3">
				<div class="card">
					<a href="ed/"> <img src="img/re.png" class="card-img-top" alt="Fissure in Sandstone" height="238" width="258" /></a>
					<div class="card-body">
						<h4 class="card-title text-center  text-uppercase">Reportes</h4>
						<a href="ed/">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>

				</div>
			</div>
			<div class="col-3">
				<div class="card">
					<a href="materiaprofe.php"> <img src="img/aM.png" class="card-img-top" alt="Fissure in Sandstone" height="238" width="258" /></a>
					<div class="card-body">
						<h4 class="card-title text-center  text-uppercase">Asignar Materia Profesor</h4>
						<a href="materiaprofe.php">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>

				</div>
			</div>
			<div class="col-3">
				<div class="card">
					<a href="alumnosMaterias.php"> <img src="img/MP.png" class="card-img-top" alt="Fissure in Sandstone" height="238" width="258" /></a>
					<div class="card-body">
						<h4 class="card-title text-center  text-uppercase">Alumnos Materias</h4>
						<a href="alumnosMaterias.php">
							<p class="card-text text-uppercase">Comenzar <i class="fas fa-cog offset-6"></i></p>
						</a>
					</div>

				</div>
			</div>
			<div class=" offset-9 col-3">
				<a href="cerrar.php" style="letter-spacing: 3px;">
					<button type="button" class="btn btn-outline-danger">Cerar Sesión <i class="ace-icon fa fa-power-off"></i></button>
				</a>
			</div>


		</div>
	</div>
</body>

</html>