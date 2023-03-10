<!DOCTYPE html>
<html lang="es">

<?php
session_start();
// Regenera el Id es decir lo cambia evaluadamente para seguridad de hackeos con el PHPSESSID.
session_regenerate_id(true);
// Si el usuario unde en el boton cerrar sesion direccionar al login.php //
if (isset($_REQUEST['sesion']) && $_REQUEST['sesion'] == "cerrar") {
  session_destroy();
  header("location: login.php");
}
// Si un usuario entra al panel sin un usuario existente re-direccionar al login.php //
if (isset($_SESSION['Idadmin']) == false) {
  header("location: login.php");
}
$modulo = $_REQUEST['modulo'] ?? '';


?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mau-s Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
   <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> 
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="./Css/Login.css">
  <link rel="stylesheet" href="./Css/Entradas.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper os-content">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>
      <!--  Menu -->
      <ul class="navbar-nav ml-auto">
        <!-- Regresar -->
        <a class="nav-link" href="Panel.php?modulo=&Panel" title="Inicio">
        <i class="fa fa-home" aria-hidden="true"></i>
        
        <!-- Editar el usuario de ADMIN desde su  caratula llamando la siguiente funcion. -->
        <a class="nav-link" title="Editar perfil" href="Panel.php?modulo=Editaradmin&Idadmin= <?php echo $_SESSION['Idadmin'] ?>">
          <i class="far fa-user"></i>

        </a>
        <a class="nav-link text-danger" href="Panel.php?modulo=&sesion=cerrar " title="Cerrar sesion">
         <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <!--poner logo-->
        <span class="brand-text font-weight-light"></span><h2 class="arregloMau">Mau's Home</h2>

      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/fondo.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="Panel.php?modulo=Editaradmin&Idadmin= <?php echo $_SESSION['Idadmin'] ?>" class="d-block" title="Editar mi perfil"><?php echo $_SESSION['nombreadmin']; ?> </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-shopping-cart nav-icon" adian-hidden="true"></i>
                <p>
                  Mau's Home 
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Estadisticas" class="nav-link <?php echo ($modulo == "Estadisticas" || $modulo == "") ? "active" : " "; ?>">
                  <i class="fa fa-signal" aria-hidden="true"></i>
                    <p>Estadisticas</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Inicio" class="nav-link <?php echo ($modulo == "Inicio" || $modulo == "") ? "active" : " "; ?>">
                  <i class="fa fa-signal" aria-hidden="true"></i>
                    <p>Inicio</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Administradores" class="nav-link <?php echo ($modulo == "Administradores" || $modulo == "Crear" || $modulo == "Editaradmin") ? "active" : " "; ?>">
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                    <p>Administradores</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Empleados" class="nav-link <?php echo ($modulo == "Empleados" || $modulo == "Crearempleado"|| $modulo == "Editarempleado") ? "active" : " "; ?>">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                    <p>Empleados</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Usuarios" class="nav-link <?php echo ($modulo == "Usuarios" || $modulo == "CrearU") || $modulo == "EditarU" ? "active" : " "; ?>">
                  <i class="fa fa-users" aria-hidden="true"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Proveedores" class="nav-link <?php echo ($modulo == "Proveedores" || $modulo == "Crearproveedor" || $modulo == "Editarproveedor") ? "active" : " "; ?>">
                  <i class="fa fa-truck" aria-hidden="true"></i>  
                    <p>Proveedores</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Productos" class="nav-link <?php echo ($modulo == "Productos" || $modulo == "EditarP" || $modulo == "CrearP") ? "active" : ""; ?> ">
                  <i class="fa fa-suitcase" aria-hidden="true"></i>
                        <p>Productos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <!-- Al dar a un clic de usuario o ventas se active -->
                  <a href="Panel.php?modulo=Ventas" class="nav-link <?php echo ($modulo == "Ventas" || $modulo == "") ? "active" : " "; ?> ">
                  <i class="fa fa-archive" aria-hidden="true"></i> 
                  
                    <p>Ventas</p>
                  </a>
                </li>
              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <?php
    // Sentencia de crar usuario lanzar un mensaje (SE CREO EL PERFIL EXITOSAMENTE) sentencia if
    if (isset($_REQUEST['mensaje'])) {
    ?>
      <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje'] ?>
      </div>
    <?php
    }


    // Llamar contenido, llamar la estadistica.
    if ($modulo == "Estadisticas" || $modulo == "") {
      include_once "Estadisticas.php";
    }
    if ($modulo == "Usuarios") {
      include_once "Usuarios.php";
    }
    if ($modulo == "Productos") {
      include_once "Productos.php";
    }
    if ($modulo == "Ventas") {
      include_once "Ventas.php";
    }
    if ($modulo == "CrearU") {
      include_once "CrearU.php";
    }
    if ($modulo == "EditarU") {
      include_once "EditarU.php";
    }
    if ($modulo == "CrearP") {
      include_once "CrearP.php";
    }
    if ($modulo == "EditarP") {
      include_once "EditarP.php";
    }
    if($modulo == "Proveedores"){
      include_once "proveedores.php";
    }
    if($modulo == "Editarproveedor"){
      include_once "Editarproveedor.php";
    }
    if($modulo == "Crearproveedor"){
      include_once "Crearproveedor.php";
    }
    if($modulo == "Administradores"){
      include_once "Administradores.php";
    }
    if($modulo == "Crear"){
      include_once "CrearAdmin.php";
    }
    if($modulo == "Editaradmin"){
      include_once "Editaradmin.php";
    }
    if($modulo == "Empleados"){
      include_once "Empleados.php";
    }
    if($modulo == "Crearempleado"){
      include_once "Crearempleado.php";
    }
    if($modulo == "Editarempleado"){
      include_once "Editarempleado.php";
    }
    if ($modulo == "Inicio"){
      include_once "Inicio.php";
    }
    if ($modulo == "Imagen"){
      include_once "image.php";
    }
    ?>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 
  <script>
    $(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      })
    });
    </script>
  <script>
    $(document).ready(function() {
      $(".borrar").click(function(e) {
        e.preventDefault();
        var res = confirm("??Seguro que quieres eliminar el usuario?");
        if (res == true) {
          var link = $(this).attr("href");
          //console.log(link); Metodo de prueba en busca de erorres.
          window.location = link;

        }
      });
    });
  </script>
  <footer class="main-footer" style=" background:#d100ff5c;">
    <strong style="color:black; font-family: Poppins;">Tienda virtual para mascotas &copy; 2022-2023</strong>
    <div class="float-right d-none d-sm-inline-block">
    <h2 class="arregloMau2">Mau's Home</h2>
    </div>
  </footer>
</body>

</html>
