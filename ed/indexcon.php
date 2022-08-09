<?php
ob_start();
require_once "cdn.html";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo.png" />
  <title>Registros</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <link rel="stylesheet" type="text/css" href="css/maquinawrite.css">

  <style>
    table tr th {
      background: rgba(0, 0, 0, .6);
      color: azure;
    }

    tbody tr {
      font-size: 12px !important;

    }

    h3 {
      color: crimson;
      margin-top: 100px;
    }

    a:hover {
      cursor: pointer;
      color: #333 !important;
    }
  </style>
</head>

<body>





  <div class="container mt-5 p-5">
    <?php
    include('config.php');
    $sqlCliente   = ("SELECT * FROM alumnoss   ");
    $queryCliente = mysqli_query($con, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    ?>

    <hr>
    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-11">
        <strong>Alumnos <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-12 p-2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Matricula</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Carrera</th>
                          <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <?php
                      while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                        <tr>
                          <td><?php echo $dataCliente['matricula']; ?></td>
                          <td><?php echo $dataCliente['nombre']; ?></td>
                          <td><?php echo $dataCliente['carrera']; ?></td>
                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['id']; ?>">
                              Eliminar
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['id']; ?>">
                              Modificar
                            </button>
                          </td>
                        </tr>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalEditar.php'); ?>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('ModalEliminar.php'); ?>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5 p-5">
    <?php
    include('config.php');
    $sqlCliente   = ("SELECT * FROM profesoress   ");
    $queryCliente = mysqli_query($con, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    ?>

    <hr>
    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-11">
        <strong>Profesores <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-12 p-2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Numero de empleado</th>
                          <th scope="col">Nombre</th>

                          <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <?php
                      while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                        <tr>
                          <td><?php echo $dataCliente['nempleado']; ?></td>
                          <td><?php echo $dataCliente['nombre']; ?></td>

                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresnP<?php echo $dataCliente['id']; ?>">
                              Eliminar
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresnP<?php echo $dataCliente['id']; ?>">
                              Modificar
                            </button>
                          </td>
                        </tr>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalEditarP.php'); ?>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('ModalEliminarP.php'); ?>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5 p-5">
    <?php
    include('config.php');
    $sqlCliente   = ("SELECT * FROM materias   ");
    $queryCliente = mysqli_query($con, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
    ?>

    <hr>
    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-11">
        <strong>Materias <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-12 p-2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nombre</th>

                          <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <?php
                      while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                        <tr>
                          <td><?php echo $dataCliente['idM']; ?></td>
                          <td><?php echo $dataCliente['nombre']; ?></td>

                          <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresnM<?php echo $dataCliente['id']; ?>">
                              Eliminar
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresnM<?php echo $dataCliente['id']; ?>">
                              Modificar
                            </button>
                          </td>
                        </tr>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalEditarM.php'); ?>
                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('ModalEliminarM.php'); ?>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $(window).load(function() {
        $(".cargando").fadeOut(1000);
      });

      //Ocultar mensaje
      setTimeout(function() {
        $("#contenMsjs").fadeOut(1000);
      }, 3000);



      $('.btnBorrar').click(function(e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        url = "recib_Delete.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function(data) {
            window.location.href = "index.php";
            $('#respuesta').html(data);
          }
        });
        return false;

      });


    });
  </script>

</body>

</html>
<?php
$html = ob_get_clean();
//echo "$html";
require_once '../libreria/dompdf/autoload.inc.php';

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