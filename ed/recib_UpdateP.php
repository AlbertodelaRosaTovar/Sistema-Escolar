<?php
include('config.php');
$idRegistros = $_REQUEST['id'];
$nempleado      = $_REQUEST['nempleado'];
$nombre 	 = $_REQUEST['nombre'];


$update = ("UPDATE profesoress
	SET 
	nempleado  ='" .$nempleado. "',
	nombre  ='" .$nombre. "'

WHERE id='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);


echo "<script type='text/javascript'>
      window.location='index.php';
</script>";
