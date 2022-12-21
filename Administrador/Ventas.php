<?php
include_once "Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
?>
<div class="content-wrapper" style="background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-12">
          <h1><strong style="color:white;">Tabla de Ventas </strong></h1>
          <!-- <div>
            <hr>
            <a href="Panel.php?modulo=Crearempleado" type="button" class="btn btn-success">Crear Usuarios</a>
          </div> -->
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
              <!--  <?php //var_dump($_SERVER) 
                    ?> -->
                    <div class="container">
              <form >
                <input type="search" data-table="table_id" class="form-control me-2 light-table-filter" placeholder="Buscador" required="">
              </form>
             </div>
             <br>
              <table class="table table-bordered table-hover table_id">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Id del comprador</th>
                    <th>Id de la compra</th>
                    <th>Fecha de la compra</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once "Basedata.php";
                  $con = mysqli_connect($host, $user, $pasword, $db);
                  $query = "SELECT * FROM ventas";
                  $res = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['idCli']?></td>
                      <td><?php echo $row['idpago']?></td>
                      <td><?php echo $row['fecha'] ?></td>
                      
                      
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