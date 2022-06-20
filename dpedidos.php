<?php
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");

$idDP=$_GET['idP'];
$sql="SELECT dp.*, p.nombreP FROM detallepedidos dp INNER JOIN producto p ON dp.idproducto = p.idproducto  where idpedido = '$idDP' order by iddetalle asc ";

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de detalles del pedido #<?php echo $idDP ?></h3>
    <a href="mispedidos?id=<?php echo $id ?>" class="btn btn-success">Regresar</a> 

        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID del Producto</th>
                    <th>Nombre del Producto</th>
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
                    <td><?php echo $fila['nombreP']; ?></td>
                    <td><?php echo $fila['precioU']; ?></td>
                    <td><?php echo $fila['cantidad']; ?></td>
                    <td><?php echo $fila['importe']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>



<?php
    include("modulosphp/footer.php");
?>
