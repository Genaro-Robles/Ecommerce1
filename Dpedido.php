<?php

include 'conexion/conexion.php';

$sqlid="SELECT MAX(idpedido) FROM pedidos";
$idped=mysqli_query($con,$sqlid);
$idfinal=mysqli_fetch_assoc($idped);
$idpedido = $idfinal['MAX(idpedido)'];
$idpedido2 = $idpedido + 1;

$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$importe = $_POST["importe"];

$sql="INSERT into detallepedidos(idpedido,idproducto,precioU,cantidad,importe) 
    values ('$idpedido2','$id','$precio','$cantidad','$importe')";   

mysqli_query($con,$sql);          

echo 1;
?>



