<?php
	ob_start();
	include('../../conexion/conexion.php');

	$cod=$_REQUEST['id'];
	$sql="UPDATE roles SET Activo=0 where idrol='$cod'";
	mysqli_query($con,$sql);
	header('location:Nrangos');
?>