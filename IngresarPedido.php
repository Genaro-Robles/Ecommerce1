<?php 

include 'conexion/conexion.php';
require_once("modulosphp/login2.php");
  
    $subtotal=$_POST['subtotal'];
    $igv=$_POST['igv'];
    $total=$_POST['total'];
    $FechaE=$_POST['FechaE'];

    $sql="INSERT into pedidos(idusuario,fechaEntrega,Subtotal,Igv,Total)
                values('$id','$FechaE','$subtotal','$igv','$total')";
    
    mysqli_query($con,$sql);

    echo 1;

 ?>