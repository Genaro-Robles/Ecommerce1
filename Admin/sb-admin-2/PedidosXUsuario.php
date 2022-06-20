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

$sql="SELECT * FROM pedidos order by idpedido ";
$idU = 0;
if (isset($_POST['cboUsuario'])){
$idU=$_POST['cboUsuario'];
if($idU!=0){
    $sql="SELECT * FROM pedidos where idusuario = '$idU' order by idpedido ";
}}

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de Pedidos por Usuario</h3>
    <div style="width: 80%" class="container">
        <!-- INGRESAR MANALMENTE UN USUARIO
            <a href="#" class="btn btn-success">Añadir</a>-->
    <div class="row">
        <div class="col-md-4">
        <a href="./listaproductoexcel.php" class="btn btn-info mx-3">Exportar a excel</a>
        <a href="CRPCat.php" class="btn btn-info">Exportar a PDF</a>
        </div>
        <!-- FORMULARIO DE BUSQUEDA INICIO-->
        <div class=" col-md-8 d-flex  justify-content-end">
        <div class="">
        <form action="PedidosXUsuario" method="POST" id="FrmBuscar" class="mx-3">
        <select name="cboUsuario" id="cboUsuario" class="form-control">
            <option value="0">TODOS</option>
            <?php
            $consulta="SELECT CONCAT(nombres,' ',apellidos) as NombreC, idusuario FROM usuario";
            $ejecutar=mysqli_query($con,$consulta)or die($xx);
            $seleccionado=$idU;
            ?>
            <?php foreach ($ejecutar as $opciones):?>
            <option value="<?php echo $opciones['idusuario']?>" <?php if($seleccionado == $opciones['idusuario']): ?>selected <?php endif; ?>> <?php echo $opciones['NombreC']?> </option>
            <?php endforeach ?>

        </select>
        </div>
        <input type="submit" class="btn btn-success" id="btnBuscar" value="Buscar">
        </form>
        </div>
        </div>
        <!-- FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID de Usuario</th>
                    <th>Fecha del Pedido</th>
                    <th>Fecha de entrega</th>
                    <th>Subtotal</th>
                    <th>IGV</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                <tr>
                    <td><?php echo $fila['idusuario']; ?></td>
                    <td><?php echo $fila['fechaPedido']; ?></td>
                    <td><?php echo $fila['fechaEntrega']; ?></td>
                    <td><?php echo $fila['Subtotal']; ?></td>
                    <td><?php echo $fila['Igv']; ?></td>
                    <td><?php echo $fila['Total']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="DPxU?id=<?php echo $fila['idpedido'] ?>&pag=1">Detalles</a>
                    </td>
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