<?php
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");
$Idproduc=$_GET['idp'];
$IDCategoria = $_REQUEST['idcat'];


if($IDCategoria=="1"){
$sql="SELECT p.*, dtar.*, c.nombre as catnombre FROM producto p inner join dtargetag dtar on p.idproducto = dtar.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}
if($IDCategoria=="2"){
$sql="SELECT p.*, dpro.*, c.nombre as catnombre FROM producto p inner join dprocesador dpro on p.idproducto = dpro.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}
if($IDCategoria=="3"){
$sql="SELECT p.*, ddd.*, c.nombre as catnombre FROM producto p inner join ddiscoduro ddd on p.idproducto = ddd.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}
if($IDCategoria=="4"){
$sql="SELECT p.*, dfp.*, c.nombre as catnombre FROM producto p inner join dfuentepoder dfp on p.idproducto = dfp.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}
if($IDCategoria=="5"){
$sql="SELECT p.*, dmr.*, c.nombre as catnombre FROM producto p inner join dmemram dmr on p.idproducto = dmr.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}
if($IDCategoria=="6"){
$sql="SELECT p.*, dpb.*, c.nombre as catnombre FROM producto p inner join dplacabase dpb on p.idproducto = dpb.idproducto inner join categoria c on p.idcategoria = c.idcategoria where p.idproducto=$Idproduc";    
}

$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado)
?>
        <!-- Product section-->
        <section class="pt-5">
            <div class="container px-4 px-lg-5 my-5 lista-productos">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img id="FotoP" class="card-img-top mb-5 mb-md-0" width="408px" height="350px" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen']); ?>"></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder" id="Titulo"><?php echo $fila['nombreP']; ?></h1>
                        <div class="fs-5 mb-5" id="Precio">
                            S/.<span><?php echo $fila['precio']; ?></span>
                        </div>
                        <p class="lead"><?php echo $fila['descripcion']; ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="Cant" type="num" value="1" style="max-width: 3rem" />
                            <a class="agregar-carrito btn btn-outline-dark flex-shrink-0 " id="btnid" data-id="<?php echo $fila['idproducto']; ?>">
                                <i class="bi-cart-fill me-1"></i>
                                Añadir al carrito   
                            </a>
                        </div>
                    </div>

                </div>
                <h3 class="fw-bolder">Detalles</h3><br>
                <?php if($IDCategoria=="1"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">CUDA:</dt>
                  <dd class="col-sm-9"><?php echo $fila['CUDA']; ?></dd>

                  <dt class="col-sm-3">Velocidad de Reloj del Procesador:</dt>
                  <dd class="col-sm-9"><?php echo $fila['VRelojPro']; ?></dd>

                  <dt class="col-sm-3">Velocidad de Reloj de las memorias:</dt>
                  <dd class="col-sm-9"><?php echo $fila['VRelojMem']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Cantidad de memorias:</dt>
                  <dd class="col-sm-9"><?php echo $fila['CantMemoria']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo de memorias:</dt>
                  <dd class="col-sm-9"><?php echo $fila['TipoMemoria']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Ancho de Banda:</dt>
                  <dd class="col-sm-9"><?php echo $fila['AnchoBanda']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo de Interfaz:</dt>
                  <dd class="col-sm-9"><?php echo $fila['TipoInterfaz']; ?></dd>

                  <dt class="col-sm-3 text-truncate">DirectX:</dt>
                  <dd class="col-sm-9"><?php echo $fila['DirectX']; ?></dd>

                  <dt class="col-sm-3 text-truncate">BUS:</dt>
                  <dd class="col-sm-9"><?php echo $fila['bus']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Entradas:</dt>
                  <dd class="col-sm-9"><?php echo $fila['entradas']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Consumo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['consumo']; ?></dd>

                  <dt class="col-sm-3 text-truncate">MaxResolucion:</dt>
                  <dd class="col-sm-9"><?php echo $fila['MaxResolucion']; ?></dd>
                </dl>
                <?php } ?>
                <?php if($IDCategoria=="2"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">Socket:</dt>
                  <dd class="col-sm-9"><?php echo $fila['socket']; ?></dd>

                  <dt class="col-sm-3">Frecuencia Normal:</dt>
                  <dd class="col-sm-9"><?php echo $fila['FrecuenciaN']; ?></dd>

                  <dt class="col-sm-3">Frecuencia Turbo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['FrecuenciaT']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Cantidad de nucleos:</dt>
                  <dd class="col-sm-9"><?php echo $fila['nucleos']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Litografia:</dt>
                  <dd class="col-sm-9"><?php echo $fila['litografia']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Refrigeracion:</dt>
                  <dd class="col-sm-9"><?php echo $fila['cache']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Cache:</dt>
                  <dd class="col-sm-9"><?php echo $fila['refrigeracion']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo de memoria:</dt>
                  <dd class="col-sm-9"><?php echo $fila['tipomemoria']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Velocidad de memoria:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Vmemoria']; ?></dd>

                  <dt class="col-sm-3 text-truncate">TDP:</dt>
                  <dd class="col-sm-9"><?php echo $fila['TDP']; ?></dd>

                  <dt class="col-sm-3 text-truncate">GPU:</dt>
                  <dd class="col-sm-9"><?php echo $fila['GPU']; ?></dd>

                </dl>
                <?php } ?>
                <?php if($IDCategoria=="3"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">Dimensiones:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Dimensiones']; ?></dd>

                  <dt class="col-sm-3">Interfaz:</dt>
                  <dd class="col-sm-9"><?php echo $fila['interfaz']; ?></dd>

                  <dt class="col-sm-3">Lectura Secuencial:</dt>
                  <dd class="col-sm-9"><?php echo $fila['LecturaSecuencial']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Almacenamiento:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Almacenamiento']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Interno/Externo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['IntExt']; ?></dd>
                </dl>
                <?php } ?>
                <?php if($IDCategoria=="4"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">Modelo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Modelo']; ?></dd>

                  <dt class="col-sm-3">Potencia:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Potencia']; ?></dd>

                  <dt class="col-sm-3">Salidas:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Salidas']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Certificado:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Certificado']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Modular:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Modular']; ?></dd>

                </dl>
                <?php } ?> 
                <?php if($IDCategoria=="5"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">Modelo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Modelo']; ?></dd>

                  <dt class="col-sm-3">Capacidad:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Capacidad']; ?></dd>

                  <dt class="col-sm-3">Frecuencia:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Frecuencia']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo de memoria:</dt>
                  <dd class="col-sm-9"><?php echo $fila['TipoMem']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Voltaje:</dt>
                  <dd class="col-sm-9" ><?php echo $fila['voltaje']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Leds:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Leds']; ?></dd>

                </dl>
                <?php } ?>
                <?php if($IDCategoria=="6"){?>
                <dl class="row">
                  <dt class="col-sm-3">Marca:</dt>
                  <dd class="col-sm-9"><?php echo $fila['marca']; ?></dd>

                  <dt class="col-sm-3">Modelo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Modelo']; ?></dd>

                  <dt class="col-sm-3">Socket:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Socket']; ?></dd>

                  <dt class="col-sm-3">Chipset:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Chipset']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo de memoria:</dt>
                  <dd class="col-sm-9"><?php echo $fila['TipoMemRam']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Ranuras de memoria:</dt>
                  <dd class="col-sm-9"><?php echo $fila['RanurasMemoria']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Memoria maxima:</dt>
                  <dd class="col-sm-9" ><?php echo $fila['MemoriaMaxima']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Entradas:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Entradas']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Tipo:</dt>
                  <dd class="col-sm-9"><?php echo $fila['Tipo']; ?></dd>

                  <dt class="col-sm-3 text-truncate">Audio:</dt>
                  <dd class="col-sm-9"><?php echo $fila['audio']; ?></dd>

                </dl>
                <?php } ?>                          
            </div>
        </section>
<?php 

     $sql2="SELECT idproducto, nombreP, idcategoria, Stock, precio, imagen, Activo FROM producto where idcategoria=$IDCategoria and Activo=1 and idproducto!=$Idproduc";

    $resultado2=mysqli_query($con,$sql2);
    $fila2=mysqli_fetch_assoc($resultado)
 ?>

        <!-- Items relacionados -->
        <section class="py-1 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Productos relacionados</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    while ($fila2=mysqli_fetch_assoc($resultado2)){ ?> 
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="item.php?idp=<?php echo $fila2['idproducto']; ?>&idcat=<?php echo $fila2['idcategoria']; ?>">
                            <img class="card-img-top" width="254px" height="170px" src="data:image/png;base64,<?php echo base64_encode( $fila2['imagen']); ?>" alt="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"/>
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $fila2['nombreP']; ?></h5>
                                    <!-- Product price-->
                                    Precio: S/. <?php echo $fila2['precio']; ?>
                                    <br>
                                    Stock: <?php echo $fila2['Stock']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="item.php?idp=<?php echo $fila2['idproducto']; ?>&idcat=<?php echo $fila2['idcategoria']; ?>">Detalles</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
<?php
    include("modulosphp/footer.php");
?>
