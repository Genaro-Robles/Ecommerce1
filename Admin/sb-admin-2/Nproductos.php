<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");

if(isset($_GET['s'])){
$s = $_GET['s'];
$sql_registro=mysqli_query($con,"SELECT COUNT(*)as total_registro from producto where nombreP LIKE '%$s%'");
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
    $sql="SELECT p.idproducto, p.nombreP, c.nombre as Categoria,p.idcategoria, p.Stock, p.precio, p.descripcion, imagen, Activo FROM producto p inner join categoria c on p.idcategoria = c.idcategoria where p.nombreP LIKE '%$s%' order by p.idproducto asc LIMIT $desde,$por_pagina";

}else{

$sql_registro=mysqli_query($con,"SELECT COUNT(*)as total_registro from producto");
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
    $sql="SELECT p.idproducto, p.nombreP, c.nombre as Categoria,p.idcategoria, p.Stock, p.precio, p.descripcion, imagen, Activo FROM producto p inner join categoria c on p.idcategoria = c.idcategoria order by p.idproducto asc LIMIT $desde,$por_pagina";
}

$resultado=mysqli_query($con,$sql);


?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <h3 class="text-center">Listado de Productos</h3>
    <div style="width: 80%" class="container">
        <a href="añadirproducto" class="btn btn-success">Añadir</a>
        <a href="./listaproductoexcel.php" class="btn btn-info">Exportar a excel</a>
        <a href="" class="btn btn-info">Exportar a PDF</a>
        <!-- FORMULARIO DE BUSQUEDA INICIO-->
        <form action="Nproductos" method="get" class="float-right" style="display: flex;padding: 10px;">
            <input type="text" name="s" placeholder="Buscar..." class="form-control">
            <input type="submit"class="btn btn-primary" style="margin-left: 10px;" value="Buscar">
        </form>
        <!-- FORMULARIO DE BUSQUEDA FIN -->
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Descipcion</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila=mysqli_fetch_assoc($resultado)){ ?> 
                
                <tr>
                    
                    <td><?php echo $fila['idproducto']; ?></td>
                    <td><?php echo $fila['nombreP']; ?></td>
                    <td><?php echo $fila['Categoria']; ?></td>
                    <td><?php echo $fila['Stock']; ?></td>
                    <td><?php echo $fila['precio']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                    <td>
                    <img width="150px" height="150px" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen']); ?>">
                    </td>
                    <?php if($fila['Activo']=="1"){?>
                    <td>
                        <a class="btn btn-warning" href="editarproducto?id=<?php echo $fila['idproducto'] ?>&idcat=<?php echo $fila['idcategoria'] ?>&pagina=<?php echo $pagina ?>">Editar</a>
                        <br><br>
                        <a class="btn btn-danger" href="eliminarproducto?id=<?php echo $fila['idproducto'] ?>&idcat=<?php echo $fila['idcategoria'] ?>">Eliminar</a>
                    </td>
                    <?php }else{?>
                        <td>
                            <br><br>
                        <a class="btn btn-info" href="activarProductos?id=<?php echo $fila['idproducto'] ?>">Activar</a>
                        </td>
                    <?php }?>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- PAGINACION INICIO -->
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