<?php
	//Manera 1 de solucionar error
	ob_start();
	//Manera 2 de solucionar error JS
	//echo '<script>window.location="producto.php"</script>';
	include('../../conexion/conexion.php');

	$cod=$_REQUEST['id'];
	$sql="UPDATE producto SET Activo=0 where idproducto='$cod'";
	mysqli_query($con,$sql);
	header('location:Nproductos');
?>