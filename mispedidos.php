<?php
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");

$idU=$_GET['id'];

$sql="SELECT * FROM pedidos where idusuario = '$idU' order by idpedido ";

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de mis Pedidos</h3>

    <div style="width: 100%" class="container">
        
        <!-- INGRESAR MANALMENTE UN USUARIO
            <a href="#" class="btn btn-success">Añadir</a>-->
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
                        <a class="btn btn-warning" href="dpedidos?idP=<?php echo $fila['idpedido'] ?>">Detalles</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>




<?php
    include("modulosphp/footer.php");
?>