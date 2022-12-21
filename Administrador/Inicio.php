
<?php
include_once "Basedata.php";
$con = mysqli_connect($host, $user, $pasword, $db);
$queryNumVentas = "SELECT COUNT(id) AS num from ventas 
where fecha BETWEEN DATE( DATE_SUB(NOW(),INTERVAL 7 DAY) ) AND NOW(); ";
$resNumVentas = mysqli_query($con, $queryNumVentas);
$rowNumVentas = mysqli_fetch_assoc($resNumVentas);

$queryNumClientes = "SELECT COUNT(Id) AS num from usuario; ";
$resNumClientes = mysqli_query($con, $queryNumClientes);
$rowNumClientes = mysqli_fetch_assoc($resNumClientes);

$queryVentasDia = "SELECT
sum(detalleventa.subTotal) as total,
ventas.fecha
FROM
ventas
INNER JOIN detalleventa ON detalleventa.idVenta = ventas.id
GROUP BY DAY(ventas.fecha);";
$resVentasDia = mysqli_query($con, $queryVentasDia);
$labelVentas = "";
$datosVentas = "";

echo $datosVentas;

while ($rowVentasDia = mysqli_fetch_assoc($resVentasDia)) {
    $labelVentas = $labelVentas . "'" . date_format(date_create($rowVentasDia['fecha']), "Y-m-d") . "',";
    $datosVentas = $datosVentas . $rowVentasDia['total'] . ",";
}
$labelVentas = rtrim($labelVentas, ",");
$datosVentas = rtrim($datosVentas, ",");
?>

<script>
    var labelVentas = [<?php echo $labelVentas; ?>]
    var datosVentas = [<?php echo $datosVentas; ?>]
</script>

<div class="content-wrapper" style="background-color: white;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong>
                        <h1 class="m-0" style="color:white;">Tabla Estadisticas
                    </strong></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Tabla </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $rowNumVentas['num']; ?></h3>
                            <p>Ventas en los ultimos 7 dias</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Porcentaje de ventas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $rowNumClientes['num']; ?></h3>
                            <p>Registro de usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Visitante Único</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <section class="col-12 connectedSortable">
        <div class="blog-card spring-fever">
  <div class="title-content">
    <h3><a>Administradores</a></h3>
    <div class="intro"> <a>Ingresar</a> </div>
  </div>
  <div class="card-info">
    <a href="Panel.php?modulo=Administradores">Administrador<span class="licon icon-arr icon-black"></span></a>
  </div>
  <div class="gradient-overlay"></div>
  <div class="color-overlay"></div>
</div>
</div>
        </div>

    </section>
</div>
</div>
</section>
</div>