<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");
/*
$sql_registro=mysqli_query($con,"SELECT COUNT(*)as total_registro from roles");
$resultado_registro=mysqli_fetch_array($sql_registro);
$total_registro=$resultado_registro['total_registro'];
$por_pagina=3;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde=($pagina-1) * $por_pagina;
$total_pagina=ceil($total_registro/$por_pagina);*/


$idDP=$_GET['id'];
$pag=$_GET['pag'];
$sql="SELECT * FROM detallepedidos where idpedido = '$idDP' order by iddetalle asc ";

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de detalles del pedido #<?php echo $idDP ?></h3>
    <div style="width: 80%" class="container">
        <!-- INGRESAR MANALMENTE UN USUARIO
            <a href="#" class="btn btn-success">Añadir</a>-->
    <div class="row">
        <div class="col-md-4">
        <a href="./listaproductoexcel.php" class="btn btn-info mx-3">Exportar a excel</a>
        <a href="CRPCat.php" class="btn btn-info">Exportar a PDF</a>
        </div>
        <!-- FORMULARIO DE BUSQUEDA INICIO-->
        <div class="col-md-8 d-flex justify-content-end">
            <?php if($pag==1){?>
        <a href="PedidosXUsuario" class="btn btn-success">Regresar</a> 
            <?php }else if($pag==2){?>
        <a href="PedidosxFecha" class="btn btn-success">Regresar</a> 
            <?php } ?>
        </div>
        </div>
        <!-- FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID del Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                <tr>
                    <td><?php echo $fila['idproducto']; ?></td>
                    <td><?php echo $fila['precioU']; ?></td>
                    <td><?php echo $fila['cantidad']; ?></td>
                    <td><?php echo $fila['importe']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- PAGINACION INICIO -->
        <!--
        <nav>
            <ul class="pagination pagination-sm justify-content-end" style="">
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo 1; ?>">Primero</a></li>

                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina-1; ?>"> << </a></li>
                <?php
                for ($i=1; $i<=$total_pagina ; $i++) { 
                    if($i== $pagina){
                        echo '<li class="page-item active"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                    }else{
                        echo '<li class="page-item"> <a class="page-link" href="?pagina='.$i.'">'.$i.'</a> </li>';
                    }
                }
                ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina+1; ?>"> >> </a></li>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_pagina; ?>">Ultimo</a></li>
            </ul>           
        </nav>-->
        <!-- PAGINACION FINAL -->
    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include("ModulosA/footerA.php");
?>