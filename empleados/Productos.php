<?php
include_once "../Administrador/Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
if(isset($_REQUEST['IdBorrar'])){
$Id = mysqli_real_escape_string($con, $_REQUEST['IdBorrar']??''); 
$query = "DELETE from productos where Id= '".$Id."';";
$res = mysqli_query($con, $query);
if ($res){
  ?>

<div class="alert alert-warning float-right" role="alert">
     <?php
     echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=El producto ha sido borrado con exito" />';
    ?>
     </div>
<?php
  }
else {
     echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=No se pudo borrar el producto ' .  mysqli_error ($con) . ' " />';
  }
}
?>
<!-- ACTUALIZAR  -->
<?php

include_once "../Administrador/Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
if(isset($_REQUEST['IdEstado1'])){
$Id = mysqli_real_escape_string($con, $_REQUEST['IdEstado1']??''); 
$query = "UPDATE productos SET estado = '1' WHERE productos.Id = '".$Id."';";
$res = mysqli_query($con, $query);
if ($res){
echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=El productoha sido cambiado de estado con exito" />';
  }
else {
?>
     <?php
     echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=No se pudo cambiar de estado el producto ' .  mysqli_error ($con) . ' " />';
    ?>
    <?php
  }
}
?>
<?php
include_once "../Administrador/Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);

if(isset($_REQUEST['IdEstado2'])){
$Id = mysqli_real_escape_string($con, $_REQUEST['IdEstado2']??''); 
$query = "UPDATE productos SET estado = '0' WHERE productos.Id = '".$Id."';";
$res = mysqli_query($con, $query);
if ($res){
  echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=El productoha sido cambiado de estado con exito" />';
  }
else {
echo '<meta http-equiv= "refresh" content="0; url=Panel_empleados.php?modulo=Productos&mensaje=No se pudo cambiar de estado el producto ' .  mysqli_error ($con) . ' " />';
  }
}
?>
<div class="content-wrapper"  style="background-color: black;" >
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong style="color:white;">Tabla Productos</strong></h1> 
        </div>
      </div>
      <div>
            <br>
            <a href="Panel_empleados.php?modulo=CrearP" type="button" class="btn btn-success">Crear Producto</a>
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
             <!--  <?php //var_dump($_SERVER) ?> -->
             <div class="container">
              <form >
                <input type="search" data-table="table_id" class="form-control me-2 light-table-filter" placeholder="Buscador" required="">
              </form>
             </div>
             <br>
              <table  class="table table-bordered table-hover table_id">
                <thead>
                  <tr>
                    <th>Id</th>                
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Talla</th>
                    <th>Descripci??n</th>
                    <th>Imagen</th>
                    <th>Proveedor</th>
                    <th>Estado</th>
                    <th>Funciones<font size=2></font></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include_once "../Administrador/Basedata.php";
                    $con = mysqli_connect($host, $user, $pasword, $db);
                    $query = "SELECT Id, nombre, precio, cantidad, talla, descripcion, imagen, proveedor, estado FROM productos;";
                    $res = mysqli_query($con, $query);
                    
                    while ($row = mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                     <td><?php echo $row['Id']?></td>
                     <td><?php echo $row['nombre'] ?></td> 
                     <td><?php echo $row['precio'] ?></td> 
                     <td><?php echo $row['cantidad'] ?></td>
                     <td><?php echo $row['talla'] ?></td>
                     <td><?php echo $row['descripcion'] ?></td>
                     <td> <center><?php echo "<img width='80' height='80' src='../Administrador/upload/".$row['imagen']."'>"?></center> </td>
                     <td><?php echo $row['proveedor'] ?></td>
                     <?php 
                         if (isset($_REQUEST['guardar'])){
                          include_once "../Administrador/Basedata.php";
                          // Llamar la base de datos desde el include_once.
                          $con = mysqli_connect($host, $user, $pasword, $db);
                         }
                        if ($row['estado'] == 1) {
                          ?>
                              <center><td><button class="btn btn-success btn-xs">Activo</button></td></center>

                              <?php
                              }

                              else { 
                                ?>
                                  <center> <td><button class="btn btn-danger btn-xs">Inactivo</button></td> </center>
                              <?php
                              }
                              ?>
                       <td>
                            <a href="Panel_empleados.php?modulo=EditarP&Id= <?php echo $row['Id'] ?> " style="margin: 8px; color:#0092F1 "><i class="fas fa-pencil-alt" title="Editar Usuario"></i></a>

                            <a href="Panel_empleados.php?modulo=Productos&IdEstado1= <?php echo $row['Id'] ?> " class="btn btn-md" style="color:green;"><i class="fas fa-check" aria-hidden="true" title="Activo"></i></a>
                          
                            <a href="Panel_empleados.php?modulo=Productos&IdEstado2= <?php echo $row['Id'] ?> " class="btn btn-md" style="color:red;"><i class="fas fa-minus" aria-hidden="true" title="Inactivo"></i></a>

                            <a href="Panel_empleados.php?modulo=Productos&IdBorrar= <?php echo $row['Id'] ?> " class="btn btn-md" style="color:red;"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
                      </td>
                    </tr>
                  <?php
                  }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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

<script src="Js/Buscador.js"></script>
