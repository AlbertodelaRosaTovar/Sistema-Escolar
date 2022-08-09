<?php
include('config.php');
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM materias WHERE id= '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);

header("location:index.php");
?>