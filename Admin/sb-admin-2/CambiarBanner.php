<?php 

include '../../conexion/conexion.php';

  if($_POST['dato']!="" && $_POST['id'] != ""){
    $dato=$_POST['dato'];
    $n=$_POST['id'];
    //$sql="UPDATE banners set n".$n."=".$dato."";
    $sql="UPDATE banners set n$n='$dato'";
    
    mysqli_query($con,$sql);

  }
    echo 1;

    //echo "dato=".$dato." id=".$n;

 ?>