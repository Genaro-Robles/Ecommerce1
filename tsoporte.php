<?php
ob_start();
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");
if(isset($id)){
    $sql="SELECT Concat(nombres,' ',apellidos) as NombreC, correo FROM usuario where idusuario=$id";
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_assoc($resultado);
}else{
    $fila['NombreC']='';
    $fila['correo']='';
}
?>

        <div class="container">
            <div class="row mt-3">
                <div class="col">
                    <h2 class="d-flex justify-content-center mb-3">Enviar ticket de soporte</h2>
                        <div class="form-group row my-3">
                            <label for="cliente" class="col-12 col-md-2 col-form-label h2">Cliente :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="cliente"
                                    placeholder="Ingresa nombre cliente" name="cliente" readonly value="<?php echo $fila['NombreC']; ?>">
                            </div>
                        </div>
                        <div class="form-group row my-3">
                            <label for="email" class="col-12 col-md-2 col-form-label h2">Correo :</label>
                            <div class="col-12 col-md-10">
                                <input type="text" class="form-control" id="correo" placeholder="Ingresa tu correo" name="correo" readonly value="<?php echo $fila['correo']; ?>">
                            </div>
                        </div>
                        <form action="" method="POST" id="FormTSoporte">
                            <div class="mb-3">
                              <label for="txtTitulo" class="form-label">Titulo</label>
                              <input type="text" class="form-control" id="txtTitulo" name="txtTitulo">
                            </div>
                            <div class="mb-3">
                              <label for="txtMensaje" class="form-label">Mensaje</label>
                              <textarea class="form-control" id="txtMensaje" name="txtMensaje" rows="11"></textarea>
                            </div>
                        
                            <div class="row justify-content-end pb-2">
                                <div class="col-md-2">
                                    <input type="submit" class="btn-lg btn-success btn-block" id="btnEnviarTicket" value="Enviar Ticket">
                                </div>
                            </div>
                        </form>
                </div>


            </div>

        </div>




<?php
    ob_start();
    include("modulosphp/footer.php");
    include("conexion/conexion.php");
    if (!empty($_REQUEST['txtTitulo'])|| !empty($_REQUEST['txtMensaje'])){
              
        $titulo=$_REQUEST['txtTitulo'];
        $mensaje=$_REQUEST['txtMensaje'];
        
        $sqlC="INSERT INTO contactforms (idusuario,Titulo,Contenido) values('$id','$titulo','$mensaje')";

        $tsoporte = mysqli_query($con,$sqlC);
        
        ob_start();
        if($tsoporte==1){
            header('location:index');
        }
        }

?>
<script type="text/javascript" src="js/scripts.js"></script>