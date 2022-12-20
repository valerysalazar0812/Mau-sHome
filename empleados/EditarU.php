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
  $Id = mysqli_real_escape_string($con, $_REQUEST['Id'] ?? '');
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
  $apellido = mysqli_real_escape_string($con, $_REQUEST['apellido'] ?? '');
  $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
  $pasword = mysqli_real_escape_string($con, $_REQUEST['pasword'] ?? '');
  $ciudad = mysqli_real_escape_string($con, $_REQUEST['ciudad'] ?? '');
  $depar = mysqli_real_escape_string($con, $_REQUEST['departamento'] ?? '');
  $direccion = mysqli_real_escape_string($con, $_REQUEST['direccion'] ?? '');
  $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
  $tip_doc = mysqli_real_escape_string($con, $_REQUEST['tip_doc'] ?? '');
  $num_doc = mysqli_real_escape_string($con, $_REQUEST['num_doc'] ?? '');
  $fech_nac = mysqli_real_escape_string($con, $_REQUEST['fech_nac'] ?? '');

  $query = "UPDATE usuario SET nombre = '" . $nombre . "' ,apellido = '" . $apellido . "' ,email = '" . $email . "' ,pasword = '" . $pasword . "' ,ciudad = '" . $ciudad . "' ,departamento = '" . $depar . "' ,direccion = '" . $direccion . "' ,telefono = '" . $telefono . "' ,tip_doc = '" . $tip_doc . "' ,num_doc = '" . $num_doc . "' ,fech_nac = '" . $fech_nac . "' WHERE Id = '" . $Id . "';";
  //Restultados 
  $res = mysqli_query($con, $query);
  if ($res) {
    echo '<meta http-equiv= "refresh" content="0; url=Panel.php?modulo=Usuarios&mensaje= ' . $nombre . ' Editado correctamente" />';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al editar producto <?php echo mysqli_error($con) ?>
    </div>
<?php
  }
}
// Leer los usuarios 
// ((mysqli_real_escape_string)) Significado llama consultas preparadas 
$Id = mysqli_real_escape_string($con, $_REQUEST['Id'] ?? '');
// Seleccionar los datos //
$query = "SELECT Id, nombre, apellido, email, pasword, ciudad, departamento, direccion, telefono, tip_doc, num_doc, fech_nac from usuario WHERE  Id = '" . $Id . "';";
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
          <h1><strong style="color: white;">Editar usuario</strong></h1>
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
              <form action="Panel.php?modulo=EditarU" method="post">

                <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['nombre'] ?>">
                </div>
                <div class="for-group">
                  <label>Apellido</label>
                  <input type="text" name="apellido" class="form-control" pattern="[a-z A-Z]+" required="" value="<?php echo $row['apellido'] ?>">
                </div>
                <div class="for-group">
                  <label>Correo</label>
                  <input type="email" name="email" class="form-control" readonly required="" value="<?php echo $row['email'] ?>">
                </div>
                <div class="for-group">
                  <label>Contraseña</label>
                  <input type="password" name="pasword" class="form-control" minlength="7" maxlength="20" required="" value="<?php echo $row['pasword'] ?>">
                </div>
                <div class="for-group">
                  <label>Departamento</label>
                  <select type="text" name="departamento" required="" class="form-control" value="<?php echo $row['departamento'] ?>">
                    <option value="<?php echo $row['departamento'] ?>"><?php echo $row['departamento'] ?></option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Antioquia">Antioquia</option>
                    <option value="Arauca">Arauca</option>
                    <option value="Atlántico">Atlántico</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Boyacá">Boyacá</option>
                    <option value="Caldas">Caldas</option>
                    <option value="Caquetá">Caquetá</option>
                    <option value="Casanare">Casanare</option>
                    <option value="Cauca">Cauca</option>
                    <option value="Cesar">Cesar</option>
                    <option value="Chocó">Chocó</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Cundinamarca">Cundinamarca</option>
                    <option value="Guainía">Guainía</option>
                    <option value="Guaviare">Guaviare</option>
                    <option value="Huila">Huila</option>
                    <option value="La Guajira">La Guajira</option>
                    <option value="Magdalena">Magdalena</option>
                    <option value="Meta">Meta</option>
                    <option value="Nariño">Nariño</option>
                    <option value="Norte de Santander">Norte de Santander</option>
                    <option value="Putumayo">Putumayo</option>
                    <option value="Quindío">Quindío</option>
                    <option value="Risaralda">Risaralda</option>
                    <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                    <option value="Santander">Santander</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Tolima">Tolima</option>
                    <option value="Valle del Cauca">Valle del Cauca</option>
                    <option value="Vaupés">Vaupés</option>
                    <option value="Vichada">Vichada</option>
                  </select>
                </div>
                <div class="for-group">
                  <label>Ciudad</label>
                  <select class="form-control" name="ciudad" required="" value="<?php echo $row['ciudad'] ?>">
                    <option value="<?php echo $row['ciudad'] ?>"><?php echo $row['ciudad'] ?></option>
                    <option value="Arauca">Arauca</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Cali">Cali</option>
                    <option value="Cartagena">Cartagena</option>
                    <option value="Cúcuta">Cúcuta</option>
                    <option value="Florencia">Florencia</option>
                    <option value="Ibagué">Ibagué</option>
                    <option value="Leticia">Leticia</option>
                    <option value="Manizales">Manizales</option>
                    <option value="Medellín">Medellín</option>
                    <option value="Mitú">Mitú</option>
                    <option value="Mocoa">Mocoa</option>
                    <option value="Montería">Montería</option>
                    <option value="Neiva">Neiva</option>
                    <option value="Pasto">Pasto</option>
                    <option value="Pereira">Pereira</option>
                    <option value="Popayán">Popayán</option>
                    <option value="Puerto Carreño">Puerto Carreño</option>
                    <option value="Puerto Inírida">Puerto Inírida</option>
                    <option value="Quibdó">Quibdó</option>
                    <option value="Riohacha">Riohacha</option>
                    <option value="San Andrés">San Andrés</option>
                    <option value="San José del Guaviare">San José del Guaviare</option>
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
                  <input type="text" name="direccion" class="form-control" required="" minlength="5" value="<?php echo $row['direccion'] ?>">
                </div>
                <div class="for-group">
                  <label>Telefono</label>
                  <input type="tel" name="telefono" class="form-control" required="" pattern="[0-9]+" minlength="10" maxlength="14" value="<?php echo $row['telefono'] ?>">
                </div>
                <div class="for-group">
                  <label>Tipo Documento</label>
                  <input type="text" name="tip_doc" readonly required="" class="form-control" value="<?php echo $row['tip_doc'] ?>">
                </div>
                <div class="for-group">
                  <label>Numero Documento</label>
                  <input type="text" name="num_doc" readonly  class="form-control" required="" value="<?php echo $row['num_doc'] ?>">
                </div>
                <div class="for-group">
                  <label>Fecha Nacimiento</label>
                  <input type="date" name="fech_nac" readonly required="" class="form-control" value="<?php echo $row['fech_nac'] ?>">
                </div>
                <div class="for-group">
                  <br>
                  <input type="hidden" name="Id" value="<?php echo $row['Id'] ?>">
                  <center>
                    <div class="for-group">
                      <br>
                      <button class="glow-on-hover" type="submit" name="guardar">Guardar</button>
                    </div>
                  </center>
                  <a href="Panel.php?modulo=Usuarios"><i class="fas fa-reply-all fa-lg text-danger" aria-hidden="true" title="Regresar"></i></a>
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
