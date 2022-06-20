<?php
//variables
$servidor="localhost";
$usuario="root";
$clave="";
$bd="GreedStore";
//crear la cadena de conexion
$con=mysqli_connect($servidor,$usuario,$clave,$bd);
//verificar la conexion a la DB
if(!$con){
     die("Error al conectarse..".mysql_connect_error());
}else{ 
     //echo "Conexion Exitosa!!!";
}
?>