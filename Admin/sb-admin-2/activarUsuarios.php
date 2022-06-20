<?php 
include("../../conexion/conexion.php");
$cod = $_REQUEST['id'];
$sql="UPDATE usuario SET Activo=1 where idusuario='$cod'";
	mysqli_query($con,$sql);
header("location:Nusuarios.php");
 ?>