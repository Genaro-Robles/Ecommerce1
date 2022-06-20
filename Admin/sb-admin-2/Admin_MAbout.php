<?php
ob_start();
require_once("../../modulosphp/login2.php");
include("ModulosA/headerA.php");
include("../../conexion/conexion.php");

$sql="SELECT * FROM about";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);   

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div style="width: 100%" class="container">
    

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card" style="width: 100rem;">
            <div class="card-body">
                <h4 class="card-title text-success">Actualizar About</h4>
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Titulo 1</label>
                    <input type="text" id="T1" class="form-control" value="<?php echo $fila['titulo1'];?>">
                </div >
                <div class="col-md-1 pt-3">
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarT1">
                </div >

                <div class="col-md-4 pl-5">
                    <label>Titulo 2</label>
                    <input type="text" id="T2" class="form-control" value="<?php echo $fila['titulo2'];?>">
                </div >
                <div class="col-md-1 pt-3">
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarT2">
                </div >
                
                 </div>
                
                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Texto 1</label>
                    <textarea class="form-control" id="Tt1" rows="5"><?php echo $fila['texto1'];?></textarea>
                 </div>
                <div class="col-md-1 pt-3">
                    <br><br>
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarTt1">
                </div >

                <div class="col-md-4 pl-5">
                    <label>Texto 2</label>
                    <textarea class="form-control" id="Tt2" rows="5"><?php echo $fila['texto2'];?></textarea>
                 </div>

                 <div class="col-md-1 pt-3">
                    <br><br>
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarTt2">
                </div >
                </div>

                <div class="row mb-3">
                <div class="col-md-4">
                    <label>Titulo 3</label>
                    <input type="text"id="T3" class="form-control" value="<?php echo $fila['titulo3'];?>">
                    <br>
                    <label>Texto 3</label>
                    <textarea class="form-control" id="Tt3" rows="5"><?php echo $fila['texto3'];?></textarea>
                </div >
                <div class="col-md-1 pt-3">
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarT3">
                    <br><br><br><br><br>
                    <input type="button" class="btn-lg btn-primary p-2" value="Guardar" id="GuardarTt3">
                </div >
                <form  method="POST" action="" enctype="multipart/form-data" id="FormI">
                <div class="col-md-2 pl-5">
                    <label>Imagen 2</label><br>
                    <img class="img-fluid rounded mb-5 mb-lg-0" style="width: 260px;height: 200px;" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen2']); ?>" /><br><br>
                    <input type="file" class="form-control-sm" id="I2" name="I2"><br>
                    <input type="button" class="btn-lg btn-primary p-2 mt-2" value="Guardar" id="GuardarI2">
                    <input type="submit" hidden id="GuardarIi2">
                </div >

                <div class="col-md-2 pl-5">
                    <label>Imagen 3</label><br>
                    <img class="img-fluid rounded mb-5 mb-lg-0" style="width: 260px;height: 200px;" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen3']); ?>" /><br><br>
                    <input type="file" class="form-control-sm" id="I3" name="I3"><br>
                    <input type="button" class="btn-lg btn-primary p-2 mt-2" value="Guardar" id="GuardarI3">
                    <input type="submit" hidden id="GuardarIi3">
                </div >
                </form>
                
            	</div>

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
include("ModulosA/footerA.php");
include("../../conexion/conexion.php");
if(isset($_FILES['I2']['name']) || isset($_FILES['I3']['name'])){

if($_FILES['I2']['name'] != null && $_FILES['I3']['name'] == null){
$I2=addslashes(file_get_contents($_FILES['I2']['tmp_name']));  
$sqlA="UPDATE about set imagen2='$I2'"; 
}

if($_FILES['I3']['name'] != null && $_FILES['I2']['name'] == null){
$I3=addslashes(file_get_contents($_FILES['I3']['tmp_name']));  
$sqlA="UPDATE about set imagen3='$I3'"; 

}

if($_FILES['I2']['name'] != null && $_FILES['I3']['name'] != null){
$I2=addslashes(file_get_contents($_FILES['I2']['tmp_name']));  
$I3=addslashes(file_get_contents($_FILES['I3']['tmp_name']));  
$sqlA="UPDATE about set imagen3='$I3',imagen2='$I2'"; 
}
$about = mysqli_query($con,$sqlA);

ob_start();
if($about==1){
    header('location:Admin_MAbout');
}

}

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/scripts2.js"></script>