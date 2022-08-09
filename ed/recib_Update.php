
<?php
include('config.php');
$idRegistros = $_REQUEST['id'];
$matricula      = $_REQUEST['matricula'];
$nombre 	 = $_REQUEST['nombre'];
$carrera 	 = $_REQUEST['carrera'];

$update = ("UPDATE alumnoss
	SET 
	nombre  ='" . $nombre . "',
	matricula  ='" . $matricula . "',
	carrera ='" . $carrera . "' 

WHERE id='" . $idRegistros . "'
");
$result_update = mysqli_query($con, $update);



echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
