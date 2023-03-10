<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/Boton.css">
  <link rel="stylesheet" href="Css/Fondo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
</head>

<?php
include_once "../Administrador/Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
if (isset($_REQUEST['guardar'])) {
  $Id = mysqli_real_escape_string($con, $_REQUEST['Idempleado'] ?? '');
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombreempleado'] ?? '');
  $apellido = mysqli_real_escape_string($con, $_REQUEST['apellidoempleado'] ?? '');
  $email = mysqli_real_escape_string($con, $_REQUEST['emailempleado'] ?? '');
  $pasword = mysqli_real_escape_string($con, $_REQUEST['paswordempleado'] ?? '');
  $ciudad = mysqli_real_escape_string($con, $_REQUEST['ciudadempleado'] ?? '');
  $depar = mysqli_real_escape_string($con, $_REQUEST['deparempleado'] ?? '');
  $direccion = mysqli_real_escape_string($con, $_REQUEST['direccionempleado'] ?? '');
  $telefono = mysqli_real_escape_string($con, $_REQUEST['telefonoempleado'] ?? '');
  $tip_doc = mysqli_real_escape_string($con, $_REQUEST['tip_docempleado'] ?? '');
  $num_doc = mysqli_real_escape_string($con, $_REQUEST['num_docempleado'] ?? '');
  $fech_nac = mysqli_real_escape_string($con, $_REQUEST['fech_nacempleado'] ?? '');

  $query = "UPDATE empleados SET nombreempleado = '" . $nombre . "' ,apellidoempleado = '" . $apellido . "' ,emailempleado = '" . $email . "' ,paswordempleado = '" . $pasword . "' ,ciudadempleado = '" . $ciudad . "' ,deparempleado = '" . $depar . "' ,direccionempleado = '" . $direccion . "' ,telefonoempleado = '" . $telefono . "' ,tip_docempleado = '" . $tip_doc . "' ,num_docempleado = '" . $num_doc . "' ,fech_nacempleado = '" . $fech_nac . "' WHERE Idempleado = '" . $Id . "';";
  //Restultados 
  $res = mysqli_query($con, $query);
  if ($res) {
    echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Estadisticas&mensaje=Empleado ' . $nombre . ' Editado correctamente" />';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al editar  <?php echo mysqli_error($con) ?>
    </div>
<?php
  }
}
// Leer los usuarios 
// ((mysqli_real_escape_string)) Significado llama consultas preparadas 
$Id = mysqli_real_escape_string($con, $_REQUEST['Idempleado'] ?? '');
// Seleccionar los datos //
$query = "SELECT Idempleado, nombreempleado, apellidoempleado, emailempleado, paswordempleado, ciudadempleado, deparempleado, direccionempleado, telefonoempleado, tip_docempleado, num_docempleado, fech_nacempleado from empleados WHERE  Idempleado = '" . $Id . "';";
// Pasar la conexion $con, $query y almacenar en la variable $res. //
$res = mysqli_query($con, $query);
// (mysqli_fetch_assoc) Entregar un registro con el almacenamiento de la variable $res
$row = mysqli_fetch_assoc($res);

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong style="color: white;">Editar empleados</strong></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <form action="Panel_empleados.php?modulo=editarempleado" method="post">

                <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombreempleado" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['nombreempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Apellido</label>
                  <input type="text" name="apellidoempleado" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['apellidoempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Correo</label>
                  <input type="email" readonly name="emailempleado" class="form-control" required="" value="<?php echo $row['emailempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Contrase??a</label>
                  <input type="password" name="paswordempleado" class="form-control" minlength="7" maxlength="20" required="" value="<?php echo $row['paswordempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Departamento</label>
                  <select type="text" name="deparempleado" required="" class="form-control" value="<?php echo $row['deparempleado'] ?>">
                    <option value="<?php echo $row['deparempleado'] ?>"><?php echo $row['deparempleado'] ?></option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Antioquia">Antioquia</option>
                    <option value="Arauca">Arauca</option>
                    <option value="Atl??ntico">Atl??ntico</option>
                    <option value="Bol??var">Bol??var</option>
                    <option value="Boyac??">Boyac??</option>
                    <option value="Caldas">Caldas</option>
                    <option value="Caquet??">Caquet??</option>
                    <option value="Casanare">Casanare</option>
                    <option value="Cauca">Cauca</option>
                    <option value="Cesar">Cesar</option>
                    <option value="Choc??">Choc??</option>
                    <option value="C??rdoba">C??rdoba</option>
                    <option value="Cundinamarca">Cundinamarca</option>
                    <option value="Guain??a">Guain??a</option>
                    <option value="Guaviare">Guaviare</option>
                    <option value="Huila">Huila</option>
                    <option value="La Guajira">La Guajira</option>
                    <option value="Magdalena">Magdalena</option>
                    <option value="Meta">Meta</option>
                    <option value="Nari??o">Nari??o</option>
                    <option value="Norte de Santander">Norte de Santander</option>
                    <option value="Putumayo">Putumayo</option>
                    <option value="Quind??o">Quind??o</option>
                    <option value="Risaralda">Risaralda</option>
                    <option value="San Andr??s y Providencia">San Andr??s y Providencia</option>
                    <option value="Santander">Santander</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Tolima">Tolima</option>
                    <option value="Valle del Cauca">Valle del Cauca</option>
                    <option value="Vaup??s">Vaup??s</option>
                    <option value="Vichada">Vichada</option>
                  </select>
                </div>
                <div class="for-group">
                  <label>Ciudad</label>
                  <select class="form-control" name="ciudadempleado" required="" value="<?php echo $row['ciudadempleado'] ?>">
                    <option value="<?php echo $row['ciudadempleado'] ?>"><?php echo $row['ciudadempleado'] ?></option>
                    <option value="Arauca">Arauca</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bogot??">Bogot??</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Cali">Cali</option>
                    <option value="Cartagena">Cartagena</option>
                    <option value="C??cuta">C??cuta</option>
                    <option value="Florencia">Florencia</option>
                    <option value="Ibagu??">Ibagu??</option>
                    <option value="Leticia">Leticia</option>
                    <option value="Manizales">Manizales</option>
                    <option value="Medell??n">Medell??n</option>
                    <option value="Mit??">Mit??</option>
                    <option value="Mocoa">Mocoa</option>
                    <option value="Monter??a">Monter??a</option>
                    <option value="Neiva">Neiva</option>
                    <option value="Pasto">Pasto</option>
                    <option value="Pereira">Pereira</option>
                    <option value="Popay??n">Popay??n</option>
                    <option value="Puerto Carre??o">Puerto Carre??o</option>
                    <option value="Puerto In??rida">Puerto In??rida</option>
                    <option value="Quibd??">Quibd??</option>
                    <option value="Riohacha">Riohacha</option>
                    <option value="San Andr??s">San Andr??s</option>
                    <option value="San Jos?? del Guaviare">San Jos?? del Guaviare</option>
                    <option value="Santa Marta">Santa Marta</option>
                    <option value="Sincelejo">Sincelejo</option>
                    <option value="Tunja">Tunja</option>
                    <option value="Valledupar">Valledupar</option>
                    <option value="Villavicencio">Villavicencio</option>
                    <option value="Yopal">Yopal</option>
                  </select>
                </div>
                <div class="for-group">
                  <label>Direccion</label>
                  <input type="text" name="direccionempleado" class="form-control" required=""  minlength="5" value="<?php echo $row['direccionempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Telefono</label>
                  <input type="tel" name="telefonoempleado" class="form-control" required="" pattern="[0-9]+" minlength="10" maxlength="14" value="<?php echo $row['telefonoempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Tipo Documento</label>
                  <input type="text" readonly name="tip_docempleado" class="form-control" required="" value="<?php echo $row['tip_docempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Numero Documento</label>
                  <input type="text" readonly name="num_docempleado" required="" class="form-control" value="<?php echo $row['num_docempleado'] ?>">
                </div>
                <div class="for-group">
                  <label>Fecha Nacimiento</label>
                  <input type="date" readonly name="fech_nacempleado" rquired="" class="form-control" value="<?php echo $row['fech_nacempleado'] ?>">
                </div>
                <div class="for-group">
                  <br>
                  <input type="hidden" name="Idempleado" value="<?php echo $row['Idempleado'] ?>">
                  <center>
                    <div class="for-group">
                      <br>
                      <button class="glow-on-hover" type="submit" name="guardar">Guardar</button>
                    </div>
                  </center>
                  <a href="Panel_empleados.php"><i class="fas fa-reply-all fa-lg text-danger" aria-hidden="true" title="Regresar"></i></a>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
