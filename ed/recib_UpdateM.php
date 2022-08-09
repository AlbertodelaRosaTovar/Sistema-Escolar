<?php
include('config.php');
$idRegistros = $_REQUEST['id'];
$idM 	 = $_REQUEST['idM'];
$nombre 	 = $_REQUEST['nombre'];


$update = ("UPDATE materias
	SET 
	idM  ='" .$idM. "',
	nombre  ='" .$nombre. "'

WHERE id='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);


echo "<script type='text/javascript'>
      window.location='index.php';
</script>";
