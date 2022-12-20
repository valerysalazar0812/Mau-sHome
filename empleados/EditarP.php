
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
  $precio = mysqli_real_escape_string($con, $_REQUEST['precio'] ?? '');
  $cantidad = mysqli_real_escape_string($con, $_REQUEST['cantidad'] ?? '');
  $descripcion = mysqli_real_escape_string($con, $_REQUEST['descripcion'] ?? '');
  // EN CASO DE QUE NO RECIBA RESPUESTA ALGUNA EL CAMPO DE TALLA 
  $restalla = mysqli_real_escape_string($con, $_REQUEST['talla'] ?? '');
  if (empty($restalla)) {
    $talla  = "No aplica";
  } else {
    $talla = mysqli_real_escape_string($con, $_REQUEST['talla'] ?? '');
  }
  // EN CASO DE QUE NO SE QUIERA CAMBIAR LA IMAGEN
  $resimagen = $_FILES['imagen']['name'];
  if (empty($resimagen)) {
    $imagen = mysqli_real_escape_string($con, $_REQUEST['imagenname'] ?? '');
  } else {
    $imagen = $_FILES['imagen']['name'];
    $type_image = $_FILES['imagen']['type'];
    $name_size = $_FILES['imagen']['size'];
    $destino = $_SERVER['DOCUMENT_ROOT'] . '/Admin/empleados/upload/';
    $ruta = $destino . $imagen;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . $imagen);
  }
  // ENRUTAR IMAGENES A LA CARPETA Y SUBIRLAS A LA DB  
  $query = "UPDATE productos SET nombre = '" . $nombre . "' ,precio = '" . $precio . "' ,cantidad = '" . $cantidad . "' ,talla = '" . $talla . "' ,descripcion = '" . $descripcion . "' ,imagen = '" . $imagen . "' WHERE Id = '" . $Id . "';";
  //Restultados 
  $res = mysqli_query($con, $query);
  if ($res) {
    echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=Producto ' . $nombre . ' Editado correctamente" />';
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
$query = "SELECT Id, nombre, precio, cantidad, talla, descripcion, imagen from productos WHERE  Id = '" . $Id . "';";
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
          <h1><strong style="color: white;">Editar Productos</strong></h1>
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
              <form action="Panel_empleados.php?modulo=EditarP" method="post" enctype="multipart/form-data">

                <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" pattern="[a-z A-Z]+" minlength="5">
                </div>
                <div class="for-group">
                  <label>Precio</label>
                  <input type="number" name="precio" class="form-control" value="<?php echo $row['precio'] ?>">
                </div>
                <div class="for-group">
                  <label>Cantidad</label>
                  <input type="number" name="cantidad" class="form-control" value="<?php echo $row['cantidad'] ?>"  pattern="[0-9]+" maxlength="8" minlength="1">
                </div>
                <div class="for-group">
                  <label>talla</label>
                  <input type="text" name="talla" class="form-control" value="<?php echo $row['talla'] ?>">
                </div>
                <div class="for-group">
                  <label>descripcion</label>
                  <input type="text" name="descripcion" class="form-control" value="<?php echo $row['descripcion'] ?>" maxlength="2000" minlength="9">
                </div>
                <div class="photo" style="width:1545px">
                  <label>Imagen(es)</label>
                  <input type="text" name="imagenname" class="form-control" value="<?php echo $row['imagen'] ?>" readonly>
                  <br>
                  <input type="file" class="form-control" name="imagen" accept="image/png, image/jpg, image/jpeg, image/pjpeg">
                </div>
                
              <hr>
              <div class="for-group">
                <center>
                <br>
                <input type="hidden" name="Id" value="<?php echo $row['Id'] ?>">
                <button type="submit" class="glow-on-hover" name="guardar">Guardar</button>
                </center>
              </div>
              </form>
            </div>
            <!-- LA CANTIDAD (EN EL FRONT) NO PUEDE SER MAYOR A LA CANTIDAD QUE HAY DE PORDUCTOS. ES DECIR NO SE PUEDE ESCOGER MAYOR CANTIDAD CIERTO PRODUCTO-->

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

