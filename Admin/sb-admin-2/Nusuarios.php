<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");

if(isset($_GET['s'])){

$s = $_GET['s'];
$sql_registro=mysqli_query($con,"SELECT COUNT(*)as total_registro from usuario where nickname LIKE '%$s%'");
$resultado_registro=mysqli_fetch_array($sql_registro);
$total_registro=$resultado_registro['total_registro'];
$por_pagina=3;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde=($pagina-1) * $por_pagina;
$total_pagina=ceil($total_registro/$por_pagina);

$sql="SELECT u.*, r.rol as Rol FROM usuario u inner join roles r on u.rol = r.idrol where nickname LIKE '%$s%' order by u.idusuario asc LIMIT $desde,$por_pagina";

}else{

$sql_registro=mysqli_query($con,"SELECT COUNT(*)as total_registro from usuario");
$resultado_registro=mysqli_fetch_array($sql_registro);
$total_registro=$resultado_registro['total_registro'];
$por_pagina=3;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde=($pagina-1) * $por_pagina;
$total_pagina=ceil($total_registro/$por_pagina);

$sql="SELECT u.*, r.rol as Rol FROM usuario u inner join roles r on u.rol = r.idrol order by u.idusuario asc LIMIT $desde,$por_pagina";
}

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de Usuario</h3>
    <div style="width: 80%" class="container">
        <!-- INGRESAR MANALMENTE UN USUARIO
            <a href="#" class="btn btn-success">Añadir</a>-->
        <a href="./listaproductoexcel.php" class="btn btn-info">Exportar a excel</a>
        <a href="CRPCat.php" class="btn btn-info">Exportar a PDF</a>
        <!-- FORMULARIO DE BUSQUEDA INICIO-->
        <form action="Nusuarios" method="get" class="float-right" style="display: flex;padding: 10px;">
            <input type="text" name="s" placeholder="Buscar..." class="form-control">
            <input type="submit" class="btn btn-primary" style="margin-left: 10px;" value="Buscar">
        </form>
        <!-- FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nickname</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                
                <tr>
                    
                    <td><?php echo $fila['idusuario']; ?></td>
                    <td><?php echo $fila['nickname']; ?></td>
                    <td><?php echo $fila['contraseña']; ?></td>
                    <td><?php echo $fila['Rol']; ?></td>
                    <td><?php echo $fila['nombres']; ?></td>
                    <td><?php echo $fila['apellidos']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td>
                    <img width="150px" height="150px" src="data:image/png;base64,<?php echo base64_encode( $fila['foto']); ?>">
                    </td>
                    <?php if($fila['Activo']=="1"){?>
                    <td>
                        <a class="btn btn-warning" href="editarusuarios.php?id=<?php echo $fila['idusuario'] ?>&pagina=<?php echo $pagina ?>">Editar</a>
                        <br><br>
                        <a class="btn btn-danger" href="eliminarusuarios.php?id=<?php echo $fila['idusuario'] ?>">Eliminar</a>
                    </td>
                    <?php }else{?>
                        <td>
                            <br><br>
                        <a class="btn btn-info" href="activarUsuarios.php?id=<?php echo $fila['idusuario'] ?>">Activar</a>
                        </td>
                    <?php }?>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- PAGINACION INICIO --><
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
        </nav>
        <!-- PAGINACION FINAL -->
    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include("ModulosA/footerA.php");
?>