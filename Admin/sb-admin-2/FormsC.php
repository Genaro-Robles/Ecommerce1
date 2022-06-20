<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");

if(isset($_GET['idF'])){
$idF = $_GET['idF'];

$sql="SELECT cf.*, CONCAT(u.nombres,' ', u.apellidos) as nombreC FROM contactforms cf inner join usuario u on cf.idusuario = u.idusuario where cf.idForm = '$idF'";

}else{


}

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Detalle del ticket</h3>
    <div style="width: 80%" class="container">
        <!-- 
        <div class="row">
        <div class="col-md-4">
        <a href="" class="btn btn-info mx-3">Exportar a excel</a>
        <a href="" class="btn btn-info">Exportar a PDF</a>
        </div>
        FORMULARIO DE BUSQUEDA INICIO
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
        FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Usuario</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                <tr>
                    <td><?php echo $fila['idusuario']; ?></td>
                    <td><?php echo $fila['nombreC']; ?></td>
                    <td><?php echo $fila['Titulo']; ?></td>
                    <td><?php echo $fila['Contenido']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                </tr>
                <?php }?>            
            </tbody>
        </table>

        
        <!-- PAGINACION FINAL -->
    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include("ModulosA/footerA.php");
?>