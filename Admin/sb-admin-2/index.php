<?php
require_once("../../modulosphp/login2.php");
require_once "../../conexion/conexion.php";
include("ModulosA/headerA.php");
// PEDIDOS REALIZADOS
$sql="SELECT COUNT(*) as total_pedidos FROM pedidos";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);

// GANANCIAS MENSUALES
$sqlM="SELECT Month(fechaPedido) as Mes,SUM(Total) as Total FROM `pedidos` WHERE Month(fechaPedido)=Month(NOW()) GROUP BY Month(fechaPedido)";
$resultadoM=mysqli_query($con,$sqlM);
$filaM=mysqli_fetch_assoc($resultadoM);

// GANANCIAS ANUALES
$sqlA="SELECT YEAR(fechaPedido) as Año,SUM(Total) as Total FROM `pedidos` WHERE YEAR(fechaPedido)=YEAR(NOW()) GROUP BY YEAR(fechaPedido)";
$resultadoA=mysqli_query($con,$sqlA);
$filaA=mysqli_fetch_assoc($resultadoA);

// ULTIMO TICKET DE SOPORTE
$sqlMFC="SELECT MAX(idForm) as MAX FROM contactforms";
$resultadoMFC=mysqli_query($con,$sqlMFC);
$filaMFC=mysqli_fetch_assoc($resultadoMFC);
$MaxIDF= $filaMFC['MAX'];

// TICKETS DE SOPORTE
$sqlFC="SELECT * FROM contactforms";
$resultadoFC=mysqli_query($con,$sqlFC);

// ID Maximo de los Usuarios
$sqlMU="SELECT MAX(idusuario) as MAX FROM usuario";
$resultadoMU=mysqli_query($con,$sqlMU);
$filaMU=mysqli_fetch_assoc($resultadoMU);
$MaxIDU= $filaMU['MAX'];

// CONSULTA ULTIMO USUARIO
$sqlU="SELECT * FROM usuario WHERE idusuario = '$MaxIDU'";
$resultadoU=mysqli_query($con,$sqlU);
$filaU=mysqli_fetch_assoc($resultadoU);

// ID Maximo de los Productos
$sqlMP="SELECT MAX(idproducto) as MAX FROM producto";
$resultadoMP=mysqli_query($con,$sqlMP);
$filaMP=mysqli_fetch_assoc($resultadoMP);
$MaxIDP= $filaMP['MAX'];

// CONSULTA ULTIMO PRODUCTO
$sqlP="SELECT p.*, c.nombre as categoria FROM producto p inner join categoria c on p.idcategoria = c.idcategoria WHERE idproducto = '$MaxIDP'";
$resultadoP=mysqli_query($con,$sqlP);
$filaP=mysqli_fetch_assoc($resultadoP);

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ganancias (Mes Actual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">S/.<?php echo $filaM['Total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ganancias (Año Actual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">S/.<?php echo $filaA['Total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Formularios Recibido</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $MaxIDF ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-wpforms fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pedidos realizados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fila['total_pedidos']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overview de Pedidos</h6>
                                    <a href="#" id="btnChart" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tickets de soporte</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="pt-1 pb-2">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>Titulo</th>
                                                <th>Mensaje</th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php while ($filaFC=mysqli_fetch_assoc($resultadoFC)) { ?>
                                                <tr>
                                                    <td><?php echo $filaFC['Titulo']; ?></td>
                                                    <td><?php echo $filaFC['Contenido']; ?></td>
                                                    <td><a class="btn btn-warning"href="FormsC?idF=<?php echo $filaFC['idForm'] ?>"><i class="fab fa-wpforms"></i></a></td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-6 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Ultimo Usuario Registrado</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;"
                                        src="data:image/png;base64,<?php echo base64_encode( $filaU['foto']); ?>" alt="...">
                                </div>
                                <b>Nombres y Apellidos:</b> <?php echo $filaU['nombres']; ?> <?php echo $filaU['apellidos']; ?><br>
                                <b>Nickname:</b> <?php echo $filaU['nickname']; ?><br>
                                <b>Correo:</b> <?php echo $filaU['correo']; ?>
                            </div>
                        </div>
                    </div>

                        

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ultimo Producto Agregado</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;"
                                        src="data:image/png;base64,<?php echo base64_encode( $filaP['imagen']); ?>" alt="...">
                                    </div>
                                    <b>Producto:</b> <?php echo $filaP['nombreP']; ?><br>
                                    <b>Stock:</b> <?php echo $filaP['stock']; ?><br>
                                    <b>Precio:</b> S/.<?php echo $filaP['precio']; ?><br>
                                    <b>Categoria:</b> <?php echo $filaP['categoria']; ?>
                                </div>
                            </div>
                        </div>
                    


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
    include("ModulosA/footerA.php");
?>