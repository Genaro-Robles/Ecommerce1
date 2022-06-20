<?php
//$año=$_POST['año'];
require_once '../../../../conexion/conexion.php';

$sql="SELECT MONTH(fechaPedido) as mes,COUNT(*) as Pedidos FROM pedidos WHERE YEAR(fechaPedido)='2021' GROUP BY MONTH(fechaPedido) ORDER BY MONTH(fechaPedido) asc";
$resultado=mysqli_query($con,$sql);
$array=[];
$keys=[];
$a = [];
while ($fila=mysqli_fetch_assoc($resultado)){
	$valor=$fila['Pedidos'];
	$mes=$fila['mes'];
	array_push($keys,$mes);
	array_push($array,$valor);
}

for($i=0;$i<12;$i++){
	if(!isset($keys[$i])){
		$keys[$i]=123;
	}
	if(!isset($array[$i])){
		$array[$i]=0;
	}
}


$a = array(
    $keys[0] => $array[0],
    $keys[1] => $array[1],
    $keys[2] => $array[2],
    $keys[3] => $array[3],
    $keys[4] => $array[4],
    $keys[5] => $array[5],
    $keys[6] => $array[6],
    $keys[7] => $array[7],
    $keys[8] => $array[8],
    $keys[9] => $array[9],
    $keys[10] => $array[10],
    $keys[11] => $array[11],
);
//echo "<pre>";
echo json_encode($a);
//echo "</pre>";