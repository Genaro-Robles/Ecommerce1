<?php 
include("../../conexion/conexion.php");
$idp = $_REQUEST['id'];
$sql="UPDATE producto SET Activo='1' WHERE idproducto=$idp";
	mysqli_query($con,$sql);
header("location:Nproductos.php");
 ?>