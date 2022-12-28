<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/Boton.css">
  <link rel="stylesheet" href="Css/Fondo.css">
  <!-- ACOMODA EL CUADRITO DE ELEGIR ARCHIVOS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
// Llamar la base de datos desde el include_once.
include_once "Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
if (isset($_REQUEST['guardar'])) {

  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
  $precio = mysqli_real_escape_string($con, $_REQUEST['precio'] ?? '');
  $cantidad = mysqli_real_escape_string($con, $_REQUEST['cantidad'] ?? '');
  // RESPUESTA DEL SELECT DE LA TALLA
  $rtalla = $_REQUEST['talla'];
  // EL IMPLODE SE ENCARGA DE RECOGER TODOS LOS DATOS QUE SE ESCOGIERON Y ORDENARLOS CADA UNO MEDIANTE LA COMA (", ") SIEMPRE Y CUANDO SE ESCOGA MAS DE UN DATO
  $talla = implode(', ', $rtalla);
  $descripcion = mysqli_real_escape_string($con, $_REQUEST['descripcion'] ?? '');
  $proveedor = mysqli_real_escape_string($con, $_REQUEST['proveedor'] ?? '');

  // <SUBIR IMAGENES> 

  //print_r($_REQUEST); SIRVE PARA INPRIMIR LOS DATOS QUE SEAN ARCHIVOS
  $name_image = $_FILES['imagen']['name'];
  $type_image = $_FILES['imagen']['type'];
  $name_size = $_FILES['']['size'];
  $destino = $_SERVER['DOCUMENT_ROOT'] . '/Admin/Administrador/upload/';
  $ruta = $destino . $name_image;
  move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . $name_image);

  // </SUBIR IMAGENES>

  $query = "INSERT INTO productos (nombre, precio, cantidad,talla, descripcion, imagen, proveedor, estado) VALUES ('" . $nombre . "' , '" . $precio . "' , '" . $cantidad . "' , '" . $talla . "' , '" . $descripcion . "' ,'"  . $name_image . "' , '" . $proveedor . "', '1');";
  //resultados
  $res = mysqli_query($con, $query);

  if ($res) {
    echo '<meta http-equiv= "refresh" content="0; url=Panel.php?modulo=Productos&mensaje=Producto ' . $nombre . '  creado correctamente" />';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al agregar producto <?php echo mysqli_error($con) ?>
    </div>
<?php
  }
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong style="color: white;">Agregar Productos</strong></h1>
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

              <form action="Panel.php?modulo=CrearP" method="post" enctype="multipart/form-data">

                <div class="for-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" required="" pattern="[a-z A-Z]+" minlength="5">
                </div>

                <div>
                  <label>Precio</label>
                  <input type="number" name="precio" class="form-control precios" id="precio" required="" pattern="[0-9]+" min="5">
                  <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Dollar_Sign.svg/1200px-Dollar_Sign.svg.png" class="image_buscar">
                  <style>
                    input[type=number]::-webkit-inner-spin-button,
                    input[type=number]::-webkit-outer-spin-button {
                      -webkit-appearance: none;
                      margin: 0;
                    }

                    input.precios {
                      width: 100%;
                      position: relative;
                      background: transparent;
                      outline: none;
                      bottom: 4px;
                      padding: 2px;
                      text-indent: 20px;
                    }

                    input.image_buscar {
                      margin-left: 5px;
                      width: 15px;
                      border: 4px;
                      position: relative;
                      top: -29px;
                    }

                    div.cantidad {
                      margin-top: -20px;
                      margin-left: -1px;

                    }
                  </style>
                </div>
                <div class="for-group cantidad">
                  <label>Cantidad</label>
                  <input type="number" name="cantidad" class="form-control" required="" pattern="[0-9]+" maxlength="8" minlength="1">
                </div>

                <div class="for-group">
                  <label>Descripción</label>
                  <input type="text" name="descripcion" class="form-control" required="" maxlength="2000" minlength="10">
                </div>

                <!-- PROVEEDOR ➩ SE MOSTRARA UNA LISTA EN DONDE APARECERAN LOS NOMBRES DE LOS PROVEEDORES YA CREADOS Y ACTIVOS EN LA BASE DE DATOS -->
                <div class="for-group">
                  <?php
                  // SE HACE UNA CONSULTA Y SUS RESPECTIVAS RESPUESTAS DONDE SE RECOJAN LOS NOMBRES Y APELLIDOS DE LOS PROVEEDORES QUE SOLO ESTEN ACTIVOS
                  $queryp = "SELECT nombreproveedor, apellidoproveedor FROM proveedores WHERE estadoproveedor = 1;";
                  $resp = mysqli_query($con, $queryp);
                  $rowp = mysqli_num_rows($resp);
                  ?>
                  <label>Proveedor</label>
                  <!-- SE RECOGE LOS DATOS MEDIANTE UN SELECT DONDE LA PRIMERA OPCION NO VA A TENER UN VALUE PARA QUE NO LE RECOJA DATOS SOLAMENTE A ESTA 
                       Y TAMPOCO SE PUEDE ESCOGER (DISABLED) -->
                  <select name="proveedor" id="proveedor" class="form-control" aria-label="Default select example" required>
                    <option value="" disabled selected>Seleccione un proveedor</option>
                    <!-- SE LE DICE AL CODIGO QUE SI LA RESPUESTA DE LA CONSULTA ES MAYOR A CERO QUE HAGA UN WHILE DONDE RECOJA LOS DATOS, LOS MUESTRE CON
                         UN ARRAY Y PARE CUANDO YA NO HAYAN MAS DATOS -->
                    <?php
                    if ($rowp > 0) {
                      while ($proveedor = mysqli_fetch_array($resp)) {
                    ?>
                        <option value="<?php echo $proveedor['nombreproveedor'] . " " . $proveedor['apellidoproveedor'] ?>"><?php echo $proveedor['nombreproveedor'] . " " . $proveedor['apellidoproveedor'] ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="photo" style="width:450px">
                  <label>Imagen</label>
                  <input id="imagen" class="form-control" type="file" name="imagen" multiple="multiple" required="" accept="image/png, image/jpg, image/jpeg, image/pjpeg">
                </div>

                <center>
                  <div class="for-group">
                    <br>
                    <button class="glow-on-hover" type="submit" name="guardar">Crear Producto</button>
                  </div>
                </center>
                <a href="Panel.php?modulo=Productos"><i class="fas fa-reply-all fa-lg text-danger" aria-hidden="true" title="Regresar"></i></a>
            </div>

            </form>

          </div>
          <!-- /.card -->

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
<script src="Js/imagenproductos.js"></script>