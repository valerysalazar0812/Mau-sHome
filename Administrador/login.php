<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./Css/Login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  

</head>

<body class="hold-transition login-page" style="background-color: white;">
  <div class="video2">
    <video muted autoplay loop class="video">
      <source src="../Administrador/upload/pexels-kampus-production-8731064.mp4" type="video/mp4">
    </video>
  </div>
      <div id="container" class="tamano">

        <!-- Inicio de sesion -->

    <?php
        if (isset($_REQUEST['Ingresar'])) {
          session_start();
          $email = $_REQUEST['emailadmin'] ?? '';
          $passwordd = $_REQUEST['paswordadmin'] ?? '';
          // $pasword = sha1($_POST['paswordadmin']); Verificar contraseñas encriptadas par BD
          include_once "Basedata.php";
          $con = mysqli_connect($host, $user, $pasword, $db);
          $query = "SELECT Idadmin, emailadmin, nombreadmin  from administradores where emailadmin= '" . $email . "'  and paswordadmin= '" . $passwordd . "' ";
          $res = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($res);
          if ($row) {
            $_SESSION['Idadmin'] = $row['Idadmin'];
            $_SESSION['emailadmin'] = $row['emailadmin'];
            $_SESSION['nombreadmin'] = $row['nombreadmin'];
            header("location: Panel.php");
          } else {
        ?>
            <center>
              <div class="alert alert-danger color155" role="alert">Administrador no reconocido</div>
            </center>
        <?php
          }
        }
        ?>
          <!-- Inicio de sesion -->

        
      <h2>Mau's Home</h2>
      <p>Iniciar Sesion</p>
      <form>
        <input type="email" placeholder="Correo" name="emailadmin" required>
        <br>
        <br>
        <input type="password" placeholder="Contraseña" name="paswordadmin" required>
        <br>
        <button  type="submit" name="Ingresar" value="Ingresar">Iniciar Sesion</button>
        <div class="imagen">
          <img src="../Administrador/upload/perro.png" alt="" width="290vw" height="450vw">
        </div>

      </form>
<!-- </div>
      <center><a href="../empleados/login2.php" type="button" class="btn btn-outline-info"><b>Ingresar Empleado</b></a></center>
    </div> -->
    </div>
    <!-- Button trigger modal -->
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>