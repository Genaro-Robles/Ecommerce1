<?php
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");

$idU=$_GET['id'];

$sql="SELECT * FROM contactforms where idusuario = '$idU' order by idForm ";

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
                    <th>ID de Ticket</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                <tr>
                    <td><?php echo $fila['idForm']; ?></td>
                    <td><?php echo $fila['Titulo']; ?></td>
                    <td><?php echo $fila['Contenido']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>




<?php
    include("modulosphp/footer.php");
?>