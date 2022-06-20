<?php
ob_start();
require_once("../../modulosphp/login2.php");
include("ModulosA/headerA.php");
include("../../conexion/conexion.php");
$Idproduc = $_REQUEST['id'];
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
$fila=mysqli_fetch_assoc($resultado);

if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div style="width: 100%" class="container">
    

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card" style="width: 80rem;">
            <div class="card-body">
                <h4 class="card-title text-success">Actualizar Productos</h4>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>ID</label>
                    <input type="text" name="txtid" id="txtid" class="form-control" readonly="true" value="<?php echo $fila['idproducto'];?>">
                </div >
                <div class="col-md-4">
                    <label>Catengoría</label>
                    <select name="cbocategoria" id="cbocategoria" class="form-select" >
                        <!--<option value="0">Seleccione una categoria</option>-->
                        <?php
                        $consulta="SELECT idcategoria,nombre FROM categoria";
                        $ejecutar=mysqli_query($con,$consulta)or die($xx);
                        $seleccionado=$fila['catnombre'];
                        ?>

                        <?php foreach ($ejecutar as $opciones):?>
                        <option value="<?php echo $opciones['idcategoria']?>" <?php if($seleccionado == $opciones['nombre']): ?>selected <?php endif; ?>><?php echo $opciones['nombre']?> </option>
                        <?php endforeach ?>

                    </select>
                 </div>
                 <div class="col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="txtnombre" class="form-control" value="<?php echo $fila['nombreP'] ?>">
                </div>
                 </div>
                
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Stock</label>
                    <input type="text" name="txtstock" class="form-control" value="<?php echo $fila['stock'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Precio</label>
                    <input type="text" name="txtprecio" class="form-control" value="<?php echo $fila['precio'] ?>">
                </div>
                <div class="col-md-6" id="Recuadro">
                    <label>¿Deseas cambiar la imagen?</label>
                    <br>
                    <a class="btn btn-warning" id="BotonRecuadro">Cambiar imagen</a>
                </div>
                <div class="col-md-6" id="FotoRecuadro" hidden="true">
                    <label class="form-label">Foto</label>
                    <input class="form-control form-control-sm" name="FotoProd" type="file" >
                </div>

                </div>
                <div class="mb-3">
                    <label>Descripccion</label>
                    <input type="textarea" name="txtDescripcion" class="form-control" value="<?php echo $fila['descripcion'] ?>">
                </div>

                <?php
                if($IDCategoria=="1"){ ?>
                <h4 class="card-title text-success">Detalles de Tarjeta Grafica</h4>
                <!-- Targeta Grafica detalles -->
                <div id='detallesTargetaG'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaTG" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-2">
                    <label>CUDA</label>
                    <input type="text" name="txtCuda" class="form-control" value="<?php echo $fila['CUDA']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Reloj del Procesador</label>
                    <input type="text" name="txtRP" class="form-control" value="<?php echo $fila['VRelojPro']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Reloj del Memoria</label>
                    <input type="text" name="txtRM" class="form-control" value="<?php echo $fila['VRelojMem']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Cantidad de Memoria</label>
                    <input type="text" name="txtCantM" class="form-control" value="<?php echo $fila['CantMemoria']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoM" class="form-control" value="<?php echo $fila['TipoMemoria']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Ancho de banda</label>
                    <input type="text" name="txtAnchoB" class="form-control" value="<?php echo $fila['AnchoBanda']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Tipo interfaz</label>
                    <input type="text" name="txtTipoInt" class="form-control" value="<?php echo $fila['TipoInterfaz']; ?>">
                </div>
                <div class="col-md-2">
                    <label>DirectX</label>
                    <input type="text" name="txtDirectX" class="form-control" value="<?php echo $fila['DirectX']; ?>">
                </div>
                <div class="col-md-2">
                    <label>BUS</label>
                    <input type="text" name="txtBUS" class="form-control" value="<?php echo $fila['bus']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Entradas</label>
                    <input type="text" name="txtEntradas" class="form-control" value="<?php echo $fila['entradas']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Consumo</label>
                    <input type="text" name="txtConsumo" class="form-control" value="<?php echo $fila['consumo']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Maxima Resolucion</label>
                    <input type="text" name="txtMaxRes" class="form-control" value="<?php echo $fila['MaxResolucion']; ?>">
                </div>
                </div>
                </div>

                <?php } ?>

                <?php
                if($IDCategoria=="2"){ ?>
                <!-- Procesador detalles -->
                <h4 class="card-title text-success">Detalles de Procesador</h4>
                <div id='detallesProcesador'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtmarcaPro" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Socket</label>
                    <input type="text" name="txtsocketPro" class="form-control" value="<?php echo $fila['socket']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Frecuencia Normal</label>
                    <input type="text" name="txtFNormalPro" class="form-control" value="<?php echo $fila['FrecuenciaN']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Frecuencia Turbo</label>
                    <input type="text" name="txtFTurboPro" class="form-control" value="<?php echo $fila['FrecuenciaT']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Cantidad de nucleos</label>
                    <input type="text" name="txtcantNucleos" class="form-control" value="<?php echo $fila['nucleos']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Litografia</label>
                    <input type="text" name="txtLito" class="form-control" value="<?php echo $fila['litografia']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Refrigeracion</label>
                    <input type="text" name="txtRefri" class="form-control" value="<?php echo $fila['refrigeracion']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Cache</label>
                    <input type="text" name="txtCache" class="form-control" value="<?php echo $fila['cache']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoMemPro" class="form-control" value="<?php echo $fila['tipomemoria']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Velocidad de memoria</label>
                    <input type="text" name="txtVMemoriaPro" class="form-control" value="<?php echo $fila['Vmemoria']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>TDP</label>
                    <input type="text" name="txtTDP" class="form-control" value="<?php echo $fila['TDP']; ?>">
                </div>
                <div class="col-md-3">
                    <label>GPU</label>
                    <input type="text" name="txtGPU" class="form-control" value="<?php echo $fila['GPU']; ?>">
                </div>
                </div>
                </div>
                <?php } ?>

                <?php
                if($IDCategoria=="3"){ ?>
                <!-- Disco Duro detalles -->
                <div id='detallesDiscoD'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaDD" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Dimensiones</label>
                    <input type="text" name="txtdimensionesDD" class="form-control" value="<?php echo $fila['Dimensiones']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Interfaz</label>
                    <input type="text" name="txtInterfazDD" class="form-control" value="<?php echo $fila['interfaz']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Lectura Secuencial</label>
                    <input type="text" name="txtLSecDD" class="form-control" value="<?php echo $fila['LecturaSecuencial']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Almacenamiento</label>
                    <input type="text" name="txtalmacenamientoDD" class="form-control" value="<?php echo $fila['Almacenamiento']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Interno/Externo</label>
                    <input type="text" name="txtintext" class="form-control" value="<?php echo $fila['IntExt']; ?>">
                </div>
                </div>
                </div>
                <?php } ?>

                <?php
                if($IDCategoria=="4"){ ?>
                <!-- Fuente de Poder detalles -->
                <div id='detallesFuentePoder'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaFP" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-4">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloFP" class="form-control" value="<?php echo $fila['Modelo']; ?>">
                </div>
                <div class="col-md-4">
                    <label>Potencia</label>
                    <input type="text" name="txtPotenciaFP" class="form-control" value="<?php echo $fila['Potencia']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Salidas</label>
                    <input type="text" name="txtSalidasFP" class="form-control" value="<?php echo $fila['Salidas']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Certificado</label>
                    <input type="text" name="txtCertificadoFP" class="form-control" value="<?php echo $fila['Certificado']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Modular</label>
                    <input type="text" name="txtModularFP" class="form-control" value="<?php echo $fila['Modular']; ?>">
                </div>
                </div>
                </div>
                <?php } ?>


                <?php
                if($IDCategoria=="5"){ ?>
                <!-- Memoria RAM detalles -->
                <div id='detallesMemoriaRAM'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaMR" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloMR" class="form-control" value="<?php echo $fila['Modelo']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Capacidad</label>
                    <input type="text" name="txtCapacidadMR" class="form-control" value="<?php echo $fila['Capacidad']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Frecuencia</label>
                    <input type="text" name="txtFrecuenciaMR" class="form-control" value="<?php echo $fila['Frecuencia']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoMemMR" class="form-control" value="<?php echo $fila['TipoMem']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Velocidad</label>
                    <input type="text" name="txtVelocidadMR" class="form-control" value="<?php echo $fila['Velocidad']; ?>">
                </div>
                <div class="col-md-2">
                    <label>Voltaje</label>
                    <input type="text" name="txtVoltajeMR" class="form-control" value="<?php echo $fila['voltaje']; ?>">
                </div>
                <div class="col-md-2">
                    <label>LEDS</label>
                    <input type="text" name="txtLedsMR" class="form-control" value="<?php echo $fila['Leds']; ?>">
                </div>
                </div>
                </div>
                <?php } ?>

                <?php
                if($IDCategoria=="6"){ ?>
                <!-- Placa Base detalles -->
                <div id='detallesPlacaBase'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaPB" class="form-control" value="<?php echo $fila['marca']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloPB" class="form-control" value="<?php echo $fila['Modelo']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Socket</label>
                    <input type="text" name="txtSocketPB" class="form-control" value="<?php echo $fila['Socket']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Chipset</label>
                    <input type="text" name="txtChipsetPB" class="form-control" value="<?php echo $fila['Chipset']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Tipo de Memoria RAM</label>
                    <input type="text" name="txtTipoMemPB" class="form-control" value="<?php echo $fila['TipoMemRam']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Ranuras de Memoria Ram</label>
                    <input type="text" name="txtRanurasPB" class="form-control" value="<?php echo $fila['RanurasMemoria']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Memoria Maxima</label>
                    <input type="text" name="txtMemMaxPB" class="form-control" value="<?php echo $fila['MemoriaMaxima']; ?>">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Entradas</label>
                    <input type="text" name="txtEntradasPB" class="form-control" value="<?php echo $fila['Entradas']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Tipo</label>
                    <input type="text" name="txtTipoPB" class="form-control" value="<?php echo $fila['Tipo']; ?>">
                </div>
                <div class="col-md-3">
                    <label>Audio</label>
                    <input type="text" name="txtAudioPB" class="form-control" value="<?php echo $fila['audio']; ?>">
                </div>
                </div>
                </div>
                <?php } ?>

                <input type="submit" name="btnactualizar" id="btnactualizar" value="Actualizar" class="btn btn-primary">
                <a href="Nproductos?pagina=<?php echo $pagina ?>" class="btn btn-info">Retornar</a>


            </div>

        </div>

    </form>


</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php
ob_start();
include("../../conexion/conexion.php");
if (!empty($_REQUEST['txtnombre'])|| !empty($_REQUEST['txtprecio'])){
    $idp=$_REQUEST['txtid'];
    $producto=$_REQUEST['txtnombre'];
    $precio=$_REQUEST['txtprecio'];
    $stock=$_REQUEST['txtstock'];
    $categoria=$_REQUEST['cbocategoria'];
    $descripcion=$_REQUEST['txtDescripcion'];
    
    if($_FILES['FotoProd']['name'] != null){
        $fotoprod=addslashes(file_get_contents($_FILES['FotoProd']['tmp_name'])); 
        $sql="UPDATE producto SET nombreP='$producto',idcategoria='$categoria',stock='$stock',precio='$precio',descripcion='$descripcion',imagen='$fotoprod' WHERE idproducto=$idp";
    }else{
        $sql="UPDATE producto SET nombreP='$producto',idcategoria='$categoria',stock='$stock',precio='$precio',descripcion='$descripcion' WHERE idproducto=$idp";
    }

    mysqli_query($con,$sql);

    
    if($categoria=="1"){
        $marca=$_REQUEST['txtMarcaTG'];
        $cuda=$_REQUEST['txtCuda'];
        $VrelojPro=$_REQUEST['txtRP'];
        $VRelojMem=$_REQUEST['txtRM'];
        $CantMemoria=$_REQUEST['txtCantM'];
        $TipoMemoria=$_REQUEST['txtTipoM'];
        $AnchoBanda=$_REQUEST['txtAnchoB'];
        $TipoInterfaz=$_REQUEST['txtTipoInt'];
        $DirectX=$_REQUEST['txtDirectX'];
        $bus=$_REQUEST['txtBUS'];
        $entradas=$_REQUEST['txtEntradas'];
        $consumo=$_REQUEST['txtConsumo'];
        $MaxRes=$_REQUEST['txtMaxRes'];

        $sqldetalles="UPDATE dtargetag SET marca='$marca',CUDA='$cuda',VRelojPro='$VrelojPro',VRelojMem='$VRelojMem' ,CantMemoria='$CantMemoria',TipoMemoria='$TipoMemoria',AnchoBanda='$AnchoBanda',TipoInterfaz='$TipoInterfaz',DirectX='$DirectX',bus='$bus',entradas='$entradas',consumo='$consumo',MaxResolucion='$MaxRes' WHERE idproducto='$idp' ";

    }else if($categoria=="2"){
        $marca=$_REQUEST['txtmarcaPro'];
        $socket=$_REQUEST['txtsocketPro'];
        $FrecuenciaN=$_REQUEST['txtFNormalPro'];
        $FrecuenciaT=$_REQUEST['txtFTurboPro'];
        $nucleos=$_REQUEST['txtcantNucleos'];
        $litografia=$_REQUEST['txtLito'];
        $refrigeracion=$_REQUEST['txtRefri'];
        $cache=$_REQUEST['txtCache'];
        $tipomemoria=$_REQUEST['txtTipoMemPro'];
        $Vmemoria=$_REQUEST['txtVMemoriaPro'];
        $TDP=$_REQUEST['txtTDP'];
        $GPU=$_REQUEST['txtGPU'];
        
        $sqldetalles="UPDATE dprocesador SET marca='$marca',socket='$socket',FrecuenciaN='$FrecuenciaN',FrecuenciaT='$FrecuenciaT' ,nucleos='$nucleos',litografia='$litografia',refrigeracion='$refrigeracion',cache='$cache',tipomemoria='$tipomemoria',Vmemoria='$Vmemoria',TDP='$TDP',GPU='$GPU' WHERE idproducto='$idp' ";

    }else if($categoria=="3"){
        $marca=$_REQUEST['txtMarcaDD'];
        $Dimensiones=$_REQUEST['txtdimensionesDD'];
        $Interfaz=$_REQUEST['txtInterfazDD'];
        $LecturaSecuencial=$_REQUEST['txtLSecDD'];
        $Almacenamiento=$_REQUEST['txtalmacenamientoDD'];
        $IntExt=$_REQUEST['txtintext'];
        
        $sqldetalles="UPDATE ddiscoduro SET marca='$marca',Dimensiones='$Dimensiones',Interfaz='$Interfaz',LecturaSecuencial='$LecturaSecuencial' ,Almacenamiento='$Almacenamiento',IntExt='$IntExt' WHERE idproducto='$idp' ";


    }else if($categoria=="4"){
        $marca=$_REQUEST['txtMarcaFP'];
        $Modelo=$_REQUEST['txtModeloFP'];
        $Potencia=$_REQUEST['txtPotenciaFP'];
        $Salidas=$_REQUEST['txtSalidasFP'];
        $Certificado=$_REQUEST['txtCertificadoFP'];
        $Modular=$_REQUEST['txtModularFP'];
        
        $sqldetalles="UPDATE dfuentepoder SET marca='$marca',Modelo='$Modelo',Potencia='$Potencia',Salidas='$Salidas' ,Certificado='$Certificado',Modular='$Modular' WHERE idproducto='$idp' ";


    }else if($categoria=="5"){
        $marca=$_REQUEST['txtMarcaMR'];
        $Modelo=$_REQUEST['txtModeloMR'];
        $Capacidad=$_REQUEST['txtCapacidadMR'];
        $Frecuencia=$_REQUEST['txtFrecuenciaMR'];
        $TipoMem=$_REQUEST['txtTipoMemMR'];
        $Velocidad=$_REQUEST['txtVelocidadMR'];
        $voltaje=$_REQUEST['txtVoltajeMR'];
        $Leds=$_REQUEST['txtLedsMR'];
        
        $sqldetalles="UPDATE dmemram SET marca='$marca',Modelo='$Modelo',Capacidad='$Capacidad',Frecuencia='$Frecuencia' ,TipoMem='$TipoMem',Velocidad='$Velocidad',voltaje='$voltaje',Leds='$Leds' WHERE idproducto='$idp' ";

    }else if($categoria=="6"){
        $marca=$_REQUEST['txtMarcaPB'];
        $Modelo=$_REQUEST['txtModeloPB'];
        $Socket=$_REQUEST['txtSocketPB'];
        $Chipset=$_REQUEST['txtChipsetPB'];
        $TipoMemRam=$_REQUEST['txtTipoMemPB'];
        $RanurasMemoria=$_REQUEST['txtRanurasPB'];
        $MemoriaMaxima=$_REQUEST['txtMemMaxPB'];
        $Entradas=$_REQUEST['txtEntradasPB'];
        $Tipo=$_REQUEST['txtTipoPB'];
        $audio=$_REQUEST['txtAudioPB'];
        
        $sqldetalles="UPDATE dplacabase SET marca='$marca',Modelo='$Modelo',Socket='$Socket',Chipset='$Chipset' ,TipoMemRam='$TipoMemRam',RanurasMemoria='$RanurasMemoria',MemoriaMaxima='$MemoriaMaxima',Entradas='$Entradas',Tipo='$Tipo',Vmemoria='$Vmemoria',TDP='$TDP',audio='$audio' WHERE idproducto='$idp' ";

    }
    mysqli_query($con,$sqldetalles);
    ob_start();
    if($producto=1){
        header('location:Nproductos.php');
    }
}

?>
<?php
include("ModulosA/footerA.php");
?>
<script type="text/javascript" src="js/scripts2.js"></script>