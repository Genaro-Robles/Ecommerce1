<?php 

include '../../conexion/conexion.php';

  if($_POST['Campo']!="" || $_POST['Contenido'] != ""){
    $Campo=$_POST['Campo'];
    $Contenido=$_POST['Contenido'];
    
    $sql="UPDATE about set $Campo='$Contenido'";
    
    mysqli_query($con,$sql);

  }
    echo 1;

 ?>