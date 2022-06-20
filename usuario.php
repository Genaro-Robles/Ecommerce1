<?php 
ob_start();  
require_once("modulosphp/login2.php");
include("conexion/conexion.php");

$idU=$_GET['id'];
$sql="SELECT u.*, r.rol FROM usuario u inner join roles r ON u.rol = r.idrol where u.idusuario=$idU";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);

?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" type="text/css" href="css/user_estilos.css">

    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12">
                <form method="POST" enctype="multipart/form-data" action="" id="formUsuario">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img width="250px" height="250px" src="data:image/png;base64,<?php echo base64_encode( $fila['foto']); ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600"><?php echo $fila['nickname']; ?></h6>
                                <p><?php echo $fila['rol']; ?></p> 
                                <a id="FotoU" class="btn"><i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i></a>
                                <div id="imagen_input" hidden>
                                    <input type="file" id="Foto" name="Foto" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informacion</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <div id="email_hidden" hidden>
                                            <input class="form-control-sm" type="text" id="email_input" name="txtemail" value="<?php echo $fila['correo']; ?>"><a id="txtemail2" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                        <div id="email">
                                            <h6 class="text-muted f-w-400 d-inline" id="email_final"><?php echo $fila['correo']; ?></h6><a id="txtemail" class="btn"><i class="mdi mdi-square-edit-outline"></i></a>    
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Telefono</p>
                                        <div id="telefono" >
                                            <h6 class="text-muted f-w-400 d-inline" id="telefono_final"><?php echo $fila['telefono']; ?></h6>
                                            <a id="txttel" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                        <div id="telefono_hidden" hidden>
                                            <input class="form-control-sm" type="text" name="txttelefono" id="telefono_input" value="<?php echo $fila['telefono']; ?>"><a id="txttel2" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Apellidos</p>
                                        <div id="apellidos" >
                                            <h6 class="text-muted f-w-400 d-inline" id="apellidos_final"><?php echo $fila['apellidos']; ?></h6>
                                            <a id="txtapellidos" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                        <div id="apellidos_hidden" hidden>
                                            <input class="form-control-sm" type="text" name="txtapellidos" id="apellidos_input" value="<?php echo $fila['apellidos']; ?>"><a id="txtapellidos2" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Nombres</p>
                                        <div id="nombres">
                                            <h6 class="text-muted f-w-400 d-inline" id="nombres_final"><?php echo $fila['nombres']; ?></h6>
                                            <a id="txtnombre" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                        <div id="nombres_hidden" hidden>
                                            <input class="form-control-sm" type="text" name="txtnombres" id="nombres_input" value="<?php echo $fila['nombres']; ?>"><a id="txtnombre2" class="btn"><i class=" mdi mdi-square-edit-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                <div class="col-xs-2 botones">
                    <input type="submit" id="btnGuardar" class="btn btn-success" value="Guardar cambios">
                </div>
                
                <div class="col-xs-2 botones">
                    <a href="index" class="btn btn-success">Regresar</a>
                </div>
                </form>
            </div>
            </div>
        </div>

    </div>
<script type="text/javascript" src="js/jquery-3.6.0.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

ob_start();
include("conexion/conexion.php");
if (!empty($_REQUEST['txtnombres'])|| !empty($_REQUEST['txtapellidos'])){
          
    $Nombres=$_REQUEST['txtnombres'];
    $Apellidos=$_REQUEST['txtapellidos'];
    $Telefono=$_REQUEST['txttelefono'];
    
    if($_FILES['Foto']['name'] != null){
        $fotoprod=addslashes(file_get_contents($_FILES['Foto']['tmp_name'])); 
        $sql="UPDATE usuario SET nombres='$Nombres',apellidos='$Apellidos',telefono='$Telefono',foto='$fotoprod' WHERE idusuario=$idU";
    }else{
        $sql="UPDATE usuario SET nombres='$Nombres',apellidos='$Apellidos',telefono='$Telefono' WHERE idusuario=$idU";
    }

    $usuario = mysqli_query($con,$sql);
    ob_start();
    if($usuario==1){
        header('location:usuario?id='.$idU);
    }
}