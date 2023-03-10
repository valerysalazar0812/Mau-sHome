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
include_once "Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
if (isset($_REQUEST['guardar'])) {
  $Id = mysqli_real_escape_string($con, $_REQUEST['Idadmin'] ?? '');
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombreadmin'] ?? '');
  $apellido = mysqli_real_escape_string($con, $_REQUEST['apellidoadmin'] ?? '');
  $email = mysqli_real_escape_string($con, $_REQUEST['emailadmin'] ?? '');
  $pasword = mysqli_real_escape_string($con, $_REQUEST['paswordadmin'] ?? '');
  $ciudad = mysqli_real_escape_string($con, $_REQUEST['ciudadadmin'] ?? '');
  $depar = mysqli_real_escape_string($con, $_REQUEST['deparadmin'] ?? '');
  $direccion = mysqli_real_escape_string($con, $_REQUEST['direccionadmin'] ?? '');
  $telefono = mysqli_real_escape_string($con, $_REQUEST['telefonoadmin'] ?? '');
  $tip_doc = mysqli_real_escape_string($con, $_REQUEST['tip_docadmin'] ?? '');
  $num_doc = mysqli_real_escape_string($con, $_REQUEST['num_docadmin'] ?? '');
  $fech_nac = mysqli_real_escape_string($con, $_REQUEST['fech_nacadmin'] ?? '');

  $query = "UPDATE administradores SET nombreadmin = '" . $nombre . "' ,apellidoadmin = '" . $apellido . "' ,emailadmin = '" . $email . "' ,paswordadmin = '" . $pasword . "' ,ciudadadmin = '" . $ciudad . "' ,deparadmin = '" . $depar . "' ,direccionadmin = '" . $direccion . "' ,telefonoadmin = '" . $telefono . "' ,tip_docadmin = '" . $tip_doc . "' ,num_docadmin = '" . $num_doc . "' ,fech_nacadmin = '" . $fech_nac . "' WHERE Idadmin = '" . $Id . "';";
  //Restultados 
  $res = mysqli_query($con, $query);
  if ($res) {
    echo '<meta http-equiv= "refresh" content="0; url=Panel.php?modulo=Administradores&mensaje=Administrador ' . $nombre . ' Editado correctamente" />';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al editar usuario <?php echo mysqli_error($con) ?>
    </div>
<?php
  }
}
// Leer los usuarios 
// ((mysqli_real_escape_string)) Significado llama consultas preparadas 
$Id = mysqli_real_escape_string($con, $_REQUEST['Idadmin'] ?? '');
// Seleccionar los datos //
$query = "SELECT Idadmin, nombreadmin, apellidoadmin, emailadmin, paswordadmin, ciudadadmin, deparadmin, direccionadmin, telefonoadmin, tip_docadmin, num_docadmin, fech_nacadmin from administradores WHERE  Idadmin = '" . $Id . "';";
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
          <h1><strong style="color: white;">Editar Administrador</strong></h1>
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
              <form action="Panel.php?modulo=Editaradmin" method="post">

                <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombreadmin" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['nombreadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Apellido</label>
                  <input type="text" name="apellidoadmin" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['apellidoadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Correo</label>
                  <input type="email" name="emailadmin" class="form-control" required="" readonly value="<?php echo $row['emailadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Contrase??a</label>
                  <input type="password" name="paswordadmin" class="form-control" minlength="7" maxlength="20" required="" value="<?php echo $row['paswordadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Departamento</label>
                  <select type="text" name="deparadmin" class="form-control" required="" value="<?php echo $row['deparadmin'] ?>">
                    <option value="<?php echo $row['deparadmin'] ?>"><?php echo $row['deparadmin'] ?></option>
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
                  <select class="form-control" name="ciudadadmin" required="" value="<?php echo $row['ciudadadmin'] ?>">
                    <option value="<?php echo $row['ciudadadmin']?>"><?php echo $row['ciudadadmin'] ?></option>
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
                  <input type="text" name="direccionadmin" class="form-control" required="" minlength="5" value="<?php echo $row['direccionadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Telefono</label>
                  <input type="tel" name="telefonoadmin" class="form-control" required="" pattern="[0-9]+" minlength="10" maxlength="14" value="<?php echo $row['telefonoadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Tipo Documento</label>
                  <input type="text" name="tip_docadmin" class="form-control" readonly required="" value="<?php echo $row['tip_docadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Numero Documento</label>
                  <input type="text" name="num_docadmin" readonly class="form-control" required="" pattern="[0-9]+" value="<?php echo $row['num_docadmin'] ?>">
                </div>
                <div class="for-group">
                  <label>Fecha Nacimiento</label>
                  <input type="date" name="fech_nacadmin" readonly required class="form-control" value="<?php echo $row['fech_nacadmin'] ?>">
                </div>
                <div class="for-group">
                  <br>
                  <input type="hidden" name="Idadmin" value="<?php echo $row['Idadmin'] ?>">
                  <center>
                    <div class="for-group">
                      <br>
                      <button class="glow-on-hover" type="submit" name="guardar">Guardar</button>
                    </div>
                  </center>
                  <a href="Panel.php?modulo=Estadisticas"><i class="fas fa-reply-all fa-lg text-danger" aria-hidden="true" title="Regresar"></i></a>
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
