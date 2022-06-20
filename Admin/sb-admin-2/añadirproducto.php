<?php
ob_start();
require_once("../../modulosphp/login2.php");
include("ModulosA/headerA.php");
include("../../conexion/conexion.php");


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div style="width: 100%" class="container">
    

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card" style="width: 80rem;">
            <div class="card-body">
                <h4 class="card-title text-success">Registrar Productos</h4>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>ID</label>
                    <input type="text" name="txtid" class="form-control" readonly="true">
                </div >
                <div class="col-md-4">
                    <label>Catengoría</label>
                    <select name="cbocategoria" id="cbocategoria" class="form-select">
                        <option value="0" selected>Seleccione una categoria</option>
                        <?php
                        $consulta="SELECT idcategoria,nombre FROM categoria";
                        $ejecutar=mysqli_query($con,$consulta)or die($xx);
                        ?>

                        <?php foreach ($ejecutar as $opciones):?>
                        <option value="<?php echo $opciones['idcategoria']?>"><?php echo $opciones['nombre']?> </option>
                        <?php endforeach ?>

                    </select>
                 </div>
                 <div class="col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="txtnombre" class="form-control" placeholder="Nombre del Producto">
                </div>
                 </div>
                
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Stock</label>
                    <input type="text" name="txtstock" class="form-control" placeholder="Ingrese precio">
                </div>
                <div class="col-md-3">
                    <label>Precio</label>
                    <input type="text" name="txtprecio" class="form-control" placeholder="Ingrese precio">
                </div>
                <div class="col-md-6">
                    <label for="formFileSm" class="form-label">Foto</label>
                    <input class="form-control form-control-sm" name="FotoProd" type="file">
                </div>
                </div>
                <div class="mb-3">
                    <label>Descripccion</label>
                    <input type="textarea" name="txtDescripcion" class="form-control" placeholder="Ingrese cantidad">
                </div>
                
                <h4 class="card-title text-success" id="titulodetalles">Detalles</h4>
                <!-- Targeta Grafica detalles -->
                <div id='detallesTargetaG'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaTG" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-2">
                    <label>CUDA/Stream Processors</label>
                    <input type="text" name="txtCuda" class="form-control" placeholder="Ingresar CUDA/SP">
                </div>
                <div class="col-md-2">
                    <label>Reloj del Procesador</label>
                    <input type="text" name="txtRP" class="form-control" placeholder="MHz">
                </div>
                <div class="col-md-2">
                    <label>Reloj del Memoria</label>
                    <input type="text" name="txtRM" class="form-control" placeholder="Gbps">
                </div>
                <div class="col-md-2">
                    <label>Cantidad de Memoria</label>
                    <input type="text" name="txtCantM" class="form-control" placeholder="GB">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoM" class="form-control" placeholder="GDDRX">
                </div>
                <div class="col-md-2">
                    <label>Ancho de banda</label>
                    <input type="text" name="txtAnchoB" class="form-control" placeholder="GB/s">
                </div>
                <div class="col-md-2">
                    <label>Tipo interfaz</label>
                    <input type="text" name="txtTipoInt" class="form-control" placeholder="bit">
                </div>
                <div class="col-md-2">
                    <label>DirectX</label>
                    <input type="text" name="txtDirectX" class="form-control" placeholder="Microsoft DirectX">
                </div>
                <div class="col-md-2">
                    <label>BUS</label>
                    <input type="text" name="txtBUS" class="form-control" placeholder="PCI-E X.0">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Entradas</label>
                    <input type="text" name="txtEntradas" class="form-control" placeholder="Ingresar Entradas">
                </div>
                <div class="col-md-3">
                    <label>Consumo</label>
                    <input type="text" name="txtConsumo" class="form-control" placeholder="000 W">
                </div>
                <div class="col-md-3">
                    <label>Maxima Resolucion</label>
                    <input type="text" name="txtMaxRes" class="form-control" placeholder="0000 x 0000">
                </div>
                </div>
                </div>
                

                <!-- Procesador detalles -->
                <div id='detallesProcesador'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtmarcaPro" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-2">
                    <label>Socket</label>
                    <input type="text" name="txtsocketPro" class="form-control" placeholder="Ingresar Socket">
                </div>
                <div class="col-md-2">
                    <label>Frecuencia Normal</label>
                    <input type="text" name="txtFNormalPro" class="form-control" placeholder="GHz">
                </div>
                <div class="col-md-2">
                    <label>Frecuencia Turbo</label>
                    <input type="text" name="txtFTurboPro" class="form-control" placeholder="GHz">
                </div>
                <div class="col-md-2">
                    <label>Cantidad de nucleos</label>
                    <input type="text" name="txtcantNucleos" class="form-control" placeholder="Ingresar numero de nucleos">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Litografia</label>
                    <input type="text" name="txtLito" class="form-control" placeholder="nm">
                </div>
                <div class="col-md-2">
                    <label>Refrigeracion</label>
                    <input type="text" name="txtRefri" class="form-control" placeholder="S/N">
                </div>
                <div class="col-md-2">
                    <label>Cache</label>
                    <input type="text" name="txtCache" class="form-control" placeholder="00.00">
                </div>
                <div class="col-md-2">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoMemPro" class="form-control" placeholder="DDRX">
                </div>
                <div class="col-md-2">
                    <label>Velocidad de memoria</label>
                    <input type="text" name="txtVMemoriaPro" class="form-control" placeholder="MHz">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>TDP</label>
                    <input type="text" name="txtTDP" class="form-control" placeholder="00 W">
                </div>
                <div class="col-md-3">
                    <label>GPU</label>
                    <input type="text" name="txtGPU" class="form-control" placeholder="S/N">
                </div>
                </div>
                </div>

                <!-- Disco Duro detalles -->
                <div id='detallesDiscoD'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaDD" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-3">
                    <label>Dimensiones</label>
                    <input type="text" name="txtdimensionesDD" class="form-control" placeholder="Ingresar Dimensiones">
                </div>
                <div class="col-md-3">
                    <label>Interfaz</label>
                    <input type="text" name="txtInterfazDD" class="form-control" placeholder="Ingresar Interfaz">
                </div>
                <div class="col-md-3">
                    <label>Lectura Secuencial</label>
                    <input type="text" name="txtLSecDD" class="form-control" placeholder="MB/s">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Almacenamiento</label>
                    <input type="text" name="txtalmacenamientoDD" class="form-control" placeholder="GB">
                </div>
                <div class="col-md-3">
                    <label>Interno/Externo</label>
                    <input type="text" name="txtintext" class="form-control" placeholder="Int/Ext">
                </div>
                </div>
                </div>

                <!-- Fuente de Poder detalles -->
                <div id='detallesFuentePoder'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaFP" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-4">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloFP" class="form-control" placeholder="Ingresar Modelo">
                </div>
                <div class="col-md-4">
                    <label>Potencia</label>
                    <input type="text" name="txtPotenciaFP" class="form-control" placeholder="W">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Salidas</label>
                    <input type="text" name="txtSalidasFP" class="form-control" placeholder="Ingresar Salidas">
                </div>
                <div class="col-md-3">
                    <label>Certificado</label>
                    <input type="text" name="txtCertificadoFP" class="form-control" placeholder="Ingresar tipo de certificado">
                </div>
                <div class="col-md-2">
                    <label>Modular</label>
                    <input type="text" name="txtModularFP" class="form-control" placeholder="S/N">
                </div>
                </div>
                </div>

                <!-- Memoria RAM detalles -->
                <div id='detallesMemoriaRAM'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaMR" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-3">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloMR" class="form-control" placeholder="Ingresar Modelo">
                </div>
                <div class="col-md-3">
                    <label>Capacidad</label>
                    <input type="text" name="txtCapacidadMR" class="form-control" placeholder="GB">
                </div>
                <div class="col-md-3">
                    <label>Frecuencia</label>
                    <input type="text" name="txtFrecuenciaMR" class="form-control" placeholder="Mhz">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Tipo de Memoria</label>
                    <input type="text" name="txtTipoMemMR" class="form-control" placeholder="DDRX">
                </div>
                <div class="col-md-2">
                    <label>Voltaje</label>
                    <input type="text" name="txtVoltajeMR" class="form-control" placeholder="V">
                </div>
                <div class="col-md-2">
                    <label>LEDS</label>
                    <input type="text" name="txtLedsMR" class="form-control" placeholder="Ingresar color de LEDS">
                </div>
                </div>
                </div>

                <!-- Placa Base detalles -->
                <div id='detallesPlacaBase'>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Marca</label>
                    <input type="text" name="txtMarcaPB" class="form-control" placeholder="Ingresar Marca">
                </div>
                <div class="col-md-3">
                    <label>Modelo</label>
                    <input type="text" name="txtModeloPB" class="form-control" placeholder="Ingresar Modelo">
                </div>
                <div class="col-md-3">
                    <label>Socket</label>
                    <input type="text" name="txtSocketPB" class="form-control" placeholder="Ingresar Socket">
                </div>
                <div class="col-md-3">
                    <label>Chipset</label>
                    <input type="text" name="txtChipsetPB" class="form-control" placeholder="Ingresar Chipset">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Tipo de Memoria RAM</label>
                    <input type="text" name="txtTipoMemPB" class="form-control" placeholder="DDRX">
                </div>
                <div class="col-md-3">
                    <label>Ranuras de Memoria Ram</label>
                    <input type="text" name="txtRanurasPB" class="form-control" placeholder="Cantidad de ranuras">
                </div>
                <div class="col-md-3">
                    <label>Memoria Maxima</label>
                    <input type="text" name="txtMemMaxPB" class="form-control" placeholder="GB">
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Entradas</label>
                    <input type="text" name="txtEntradasPB" class="form-control" placeholder="Ingresar Entradas">
                </div>
                <div class="col-md-3">
                    <label>Tipo</label>
                    <input type="text" name="txtTipoPB" class="form-control" placeholder="Micro/ATX/Mini">
                </div>
                <div class="col-md-3">
                    <label>Audio</label>
                    <input type="text" name="txtAudioPB" class="form-control" placeholder="Ingresar chip de audio">
                </div>
                </div>
                </div>

                <input type="submit" name="btnagregar" id="btnagregar" value="Agregar" class="btn btn-primary">
                <a href="Nproductos" class="btn btn-info">Retornar</a>


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
    
    $producto=$_REQUEST['txtnombre'];
    $precio=$_REQUEST['txtprecio'];
    $stock=$_REQUEST['txtstock'];
    $categoria=$_REQUEST['cbocategoria'];
    $descripcion=$_REQUEST['txtDescripcion'];
    
    $fotoprod=addslashes(file_get_contents($_FILES['FotoProd']['tmp_name'])); 
    
    $sql="INSERT into producto(nombreP,idcategoria,stock,precio,descripcion,imagen)
                values('$producto','$categoria','$stock','$precio','$descripcion','$fotoprod')";
    mysqli_query($con,$sql);

    $sqlid="SELECT MAX(idproducto) FROM producto";
    $id=mysqli_query($con,$sqlid);
    $idfinal=mysqli_fetch_assoc($id);
    $idproducto = $idfinal['MAX(idproducto)'];
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
        $sqldetalles="INSERT into dtargetag(idproducto,marca,CUDA,VRelojPro,VRelojMem ,CantMemoria,TipoMemoria,AnchoBanda,TipoInterfaz,DirectX,bus,entradas,consumo,MaxResolucion)
                values('$idproducto','$marca','$cuda','$VrelojPro','$VRelojMem','$CantMemoria','$TipoMemoria','$AnchoBanda','$TipoInterfaz','$DirectX','$bus','$entradas','$consumo','$MaxRes')";

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
        
        $sqldetalles="INSERT into dprocesador(idproducto,marca,socket,FrecuenciaN,FrecuenciaT ,nucleos,litografia,refrigeracion,cache,tipomemoria,Vmemoria,TDP,GPU)
                values('$idproducto','$marca','$socket','$FrecuenciaN','$FrecuenciaT','$nucleos','$litografia','$refrigeracion','$cache','$tipomemoria','$Vmemoria','$TDP','$GPU')";

    }else if($categoria=="3"){
        $marca=$_REQUEST['txtMarcaDD'];
        $Dimensiones=$_REQUEST['txtdimensionesDD'];
        $Interfaz=$_REQUEST['txtInterfazDD'];
        $LecturaSecuencial=$_REQUEST['txtLSecDD'];
        $Almacenamiento=$_REQUEST['txtalmacenamientoDD'];
        $IntExt=$_REQUEST['txtintext'];
        
        $sqldetalles="INSERT into ddiscoduro(idproducto,marca,Dimensiones,Interfaz, LecturaSecuencial, Almacenamiento, IntExt)
                values('$idproducto','$marca','$Dimensiones','$Interfaz','$LecturaSecuencial','$Almacenamiento','$IntExt')";

    }else if($categoria=="4"){
        $marca=$_REQUEST['txtMarcaFP'];
        $Modelo=$_REQUEST['txtModeloFP'];
        $Potencia=$_REQUEST['txtPotenciaFP'];
        $Salidas=$_REQUEST['txtSalidasFP'];
        $Certificado=$_REQUEST['txtCertificadoFP'];
        $Modular=$_REQUEST['txtModularFP'];
        
        $sqldetalles="INSERT into dfuentepoder(idproducto,marca,Modelo,Potencia, Salidas, Certificado, Modular)
                values('$idproducto','$marca','$Modelo','$Potencia','$Salidas','$Certificado','$Modular')";

    }else if($categoria=="5"){
        $marca=$_REQUEST['txtMarcaMR'];
        $Modelo=$_REQUEST['txtModeloMR'];
        $Capacidad=$_REQUEST['txtCapacidadMR'];
        $Frecuencia=$_REQUEST['txtFrecuenciaMR'];
        $TipoMem=$_REQUEST['txtTipoMemMR'];
        $voltaje=$_REQUEST['txtVoltajeMR'];
        $Leds=$_REQUEST['txtLedsMR'];
        
        $sqldetalles="INSERT into dmemram(idproducto,marca,Modelo,Capacidad, Frecuencia, TipoMem, voltaje, Leds)
                values('$idproducto','$marca','$Modelo','$Capacidad', '$Frecuencia', '$TipoMem', '$voltaje','$Leds')";

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
        
        $sqldetalles="INSERT into dplacabase(idproducto,marca,Modelo,Socket, Chipset, TipoMemRam, RanurasMemoria, MemoriaMaxima, Entradas,Tipo,audio)
                values('$idproducto','$marca','$Modelo','$Socket', '$Chipset', '$TipoMemRam', '$RanurasMemoria' ,'$MemoriaMaxima','$Entradas','$Tipo','$audio')";
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
<script type="text/javascript" src="js/scripts.js">
</script>