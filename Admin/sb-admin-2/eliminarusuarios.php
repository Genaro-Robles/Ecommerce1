<?php
	ob_start();
	include('../../conexion/conexion.php');

	$cod=$_REQUEST['id'];
	$sql="UPDATE usuario SET Activo=0 where idusuario='$cod'";
	mysqli_query($con,$sql);
	header('location:Nusuarios');
?>