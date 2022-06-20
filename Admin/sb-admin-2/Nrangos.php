<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");

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
$total_pagina=ceil($total_registro/$por_pagina);

$sql="SELECT * FROM roles order by idrol asc LIMIT $desde,$por_pagina";
$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de Roles</h3>
    <div style="width: 80%" class="container">
        <!-- FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ROL</th>
                    <th>Nivel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                
                <tr>
                    
                    <td><?php echo $fila['idrol']; ?></td>
                    <td><?php echo $fila['rol']; ?></td>
                    <td><?php echo $fila['Nivel']; ?></td>
                    <?php  if($fila['Activo']=="1"){?>
                    <td class="text-center">                        
                        <a class="btn btn-danger" href="eliminarRangos.php?id=<?php echo $fila['idrol'] ?>">Desactivar</a>
                    </td>
                    <?php }else{?>
                        <td class="text-center">
                            
                        <a class="btn btn-info" href="activarRangos.php?id=<?php echo $fila['idrol'] ?>">Activar</a>
                        </td>
                    <?php } ?>
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