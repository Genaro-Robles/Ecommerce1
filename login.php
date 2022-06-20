<?php
	$alert = "";
	if(!empty($_POST)){
		if(empty($_POST['txtusuario']) || empty($_POST['txtclave'])){
			$alert="No olvide ingresar el Usuario y la Clave";
			}else{
				require_once"conexion/conexion.php";
				$user=$_POST['txtusuario'];
				$pass=$_POST['txtclave'];

				$query=mysqli_query($con,"SELECT *FROM usuario WHERE nickname='$user' AND contraseña='$pass'");
				$result=mysqli_num_rows($query);

				 if ($result>0) {
				$data=mysqli_fetch_array($query);
				session_start();
				$_SESSION['iduser']=$data['idusuario'];
				$_SESSION['user']=$data['nickname'];
				$_SESSION['contra']=$data['contraseña'];
				$_SESSION['rol']=$data['rol'];
				header("location:index.php");
				}else{
				$alert="EL usuario y/o la clave son incorrectos..";
				
			}
		}
	}
?>
	


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="assets/wave.png">
	<a class="flecha" href="index" style="font-size: 50px; display: block;"><i  class="fas fa-arrow-circle-left"></i></a>	
	<div class="container">
		<div class="img">
			<img src="assets/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="assets/avatar.svg">
				<h2 class="title">Iniciar sesion</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="txtusuario">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="txtclave">
            	   </div>
            	</div>
            	<a href="Register">No tienes una cuenta? Crea una aqui!</a>
            	<input type="submit" class="btn" value="Login">
            	<h4> <?php echo $alert; ?> </h4>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</body>
</html>