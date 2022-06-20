<?php
require_once("../../modulosphp/login2.php");
include("../../conexion/conexion.php");
include("ModulosA/headerA.php");

$total_imagenes = count(glob('../../imagenes en bruto/Banners/{*.jpg,*.gif,*.png}',GLOB_BRACE));
$total = ceil($total_imagenes/3);

$sql="SELECT * FROM banners";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
//echo 'total_imagenes = '.$total_imagenes;
?>

<!-- Begin Page Content -->
    <div class="container-fluid">
    	<div style="width: 95%" class="container">
    		<h1 class="text-center">BANNERS ACTUALES</h1>
    		<div class="row py-2">
    		<?php 
    			for ($i = 1; $i <= 6; $i++) {
    		?>
    			<div class="col py-2 px-2">
    			<img src="../../imagenes en bruto/Banners/<?php echo $fila['n'.$i]; ?>" style="height: 200px; width: 350px;" class="d-block">

    			<div class="text-center py-2" >
	    			<a href="#" class="btn btn-dark" id="btnCambiar<?php echo $i ?>">Cambiar Banner</a>
	    			<input type="file" id="Banner<?php echo $i ?>" hidden class="form-control form-control-sm my-2">
	    			<a href="Admin_MBanner" class="btn btn-dark" hidden id="btnGuardar<?php echo $i ?>" data-id="<?php echo $i ?>">Guardar</a>
	    		</div>
    			</div>
    			
			<?php 
    			}
    		?>
    		</div>
    		
		
    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include("ModulosA/footerA.php");
?>
<script type="text/javascript" src="js/BannerM.js"></script>