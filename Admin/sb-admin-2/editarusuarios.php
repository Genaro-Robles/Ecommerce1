<?php
ob_start();
require_once("../../modulosphp/login2.php");
include("ModulosA/headerA.php");
include("../../conexion/conexion.php");
$IdU = $_REQUEST['id'];

if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}

$sql="SELECT u.*, r.rol as Rol1 FROM usuario u inner join roles r on u.rol = r.idrol where u.idusuario=$IdU";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div style="width: 100%" class="container">
    

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card" style="width: 80rem;">
            <div class="card-body">
                <h4 class="card-title text-success">Actualizar Usuario</h4>
                <div class="row mb-3">
                <div class="col-md-2">
                    <label>ID</label>
                    <input type="text" name="txtid" id="txtid" class="form-control" readonly="true" value="<?php echo $fila['idusuario'];?>">
                </div >
                <div class="col-md-4">
                    <label>Rol</label>
                    <select name="cboRol" id="cboRol" class="form-select" >
                        <!--<option value="0">Seleccione una categoria</option>-->
                        <?php
                        $consulta="SELECT idrol,rol FROM roles";
                        $ejecutar=mysqli_query($con,$consulta)or die($xx);
                        $seleccionado=$fila['Rol1'];
                        ?>

                        <?php foreach ($ejecutar as $opciones):?>
                        <option value="<?php echo $opciones['idrol']?>" <?php if($seleccionado == $opciones['rol']): ?>selected <?php endif; ?>><?php echo $opciones['rol']?> </option>
                        <?php endforeach ?>

                    </select>
                 </div>
                 <div class="col-md-3">
                    <label>Nombres</label>
                    <input type="text" name="txtnombre" class="form-control" value="<?php echo $fila['nombres'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Apellidos</label>
                    <input type="text" name="txtapellidos" class="form-control" value="<?php echo $fila['apellidos'] ?>">
                </div>
                 </div>
                
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Nickname</label>
                    <input type="text" name="txtnickname" class="form-control" value="<?php echo $fila['nickname'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Contraseña</label>
                    <input type="text" name="txtcontraseña" class="form-control" value="<?php echo $fila['contraseña'] ?>">
                </div>
                <div class="col-md-4" id="Recuadro">
                    <label>¿Deseas cambiar la imagen?</label>
                    <br>
                    <a class="btn btn-warning" id="BotonRecuadro">Cambiar imagen</a>
                </div>
                <div class="col-md-6" id="FotoRecuadro" hidden="true">
                    <label class="form-label">Foto</label>
                    <input class="form-control form-control-sm" name="FotoProd" type="file" >
                </div>

                </div>
                <div class="row mb-3">
                <div class="col-md-3">
                    <label>Correo</label>
                    <input type="text" name="txtcorreo" class="form-control" value="<?php echo $fila['correo'] ?>">
                </div>
                <div class="col-md-3">
                    <label>Telefono</label>
                    <input type="text" name="txttelefono" class="form-control" value="<?php echo $fila['telefono'] ?>">
                </div>
            	</div>
                <input type="submit" name="btnactualizar" id="btnactualizar" value="Actualizar" class="btn btn-primary">
                <a href="Nusuarios?pagina=<?php echo $pagina ?>" class="btn btn-info">Retornar</a>


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
if (!empty($_REQUEST['txtnombre'])|| !empty($_REQUEST['txtapellidos'])){
    $idU=$_REQUEST['txtid'];
    $Nickname=$_REQUEST['txtnickname'];
    $Contraseña=$_REQUEST['txtcontraseña'];
    $Nombres=$_REQUEST['txtnombre'];
    $Apellidos=$_REQUEST['txtapellidos'];
    $Rol=$_REQUEST['cboRol'];
    $Telefono=$_REQUEST['txttelefono'];
    $Correo=$_REQUEST['txtcorreo'];

    
    if($_FILES['FotoProd']['name'] != null){
        $fotoprod=addslashes(file_get_contents($_FILES['FotoProd']['tmp_name'])); 
        $sql="UPDATE usuario SET nickname='$Nickname',contraseña='$Contraseña',rol='$Rol',nombres='$Nombres',apellidos='$Apellidos',telefono='$Telefono',correo='$Correo',foto='$fotoprod' WHERE idusuario=$idU";
    }else{
        $sql="UPDATE usuario SET nickname='$Nickname',contraseña='$Contraseña',rol='$Rol',nombres='$Nombres',apellidos='$Apellidos',telefono='$Telefono',correo='$Correo' WHERE idusuario=$idU";
    }

    mysqli_query($con,$sql);
    ob_start();
    if($usuario=1){
        header('location:Nusuarios.php');
    }
}


include("ModulosA/footerA.php");
?>
<script type="text/javascript" src="js/scripts2.js"></script>