

<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
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
			<form action="" method="POST" enctype="multipart/form-data">
				<img src="assets/avatar.svg">
				<h2 class="title">Crear Cuenta</h2>
				<div class="row">
           		<div class="input-div col">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" class="input" name="txtusuario" placeholder="Usuario">
           		   </div>
           		</div>
           		<div class="input-div col">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" class="input" name="txtcontraseña" placeholder="Contraseña">
            	   </div>
            	</div>
            	</div>
            	<div class="row">
            	<div class="input-div col">
           		   <div class="i"> 
           		    	<i class="fas fa-address-card"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="text" class="input" name="txtnombres" placeholder="Nombres">
            	   </div>
            	</div>
            	<div class="input-div col">
           		   <div class="i"> 
           		    	
           		   </div>
           		   <div class="div">
           		    	<input type="text" class="input" name="txtapellidos" placeholder="Apellidos">
            	   </div>
            	</div>
            	</div>
            	<div class="row">
            	<div class="input-div col">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="text" class="input" name="txttelefono" placeholder="Telefono">
            	   </div>
            	</div>
            	<div class="input-div col">
           		   <div class="i"> 
           		    	<i class="fas fa-at"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="text" class="input" name="txtcorreo" placeholder="Correo">
            	   </div>
            	</div>
            	</div>
            	<div class="row">
            	<div class="input-div col">
           		   <div class="i"> 
           		    	<i class="fas fa-images"></i>       		    	
           		   </div>
           		    	<input type="file" class="form-control-sm" name="FotoProd" id="FotoProd">
            	</div>
            	<br>
            	</div>
            	<a href="Login">Ya tienes una cuenta? Ingresa aqui!</a>
            	<input type="submit" class="btn" id="btnCrearCuenta" value="Crear Cuenta">
            </form>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</body>
</html>

<?php
	ob_start();
	if(!empty($_REQUEST)){
		if(empty($_REQUEST['txtusuario']) || empty($_REQUEST['txtcontraseña']) || empty($_REQUEST['txtnombres']) || empty($_REQUEST['txtapellidos']) || empty($_REQUEST['txttelefono']) || empty($_REQUEST['txtcorreo'])){
			
			echo '<script language="javascript">
			
			Swal.fire({
            icon: '."'error'".',
            title: '."'Oops...'".',
            text: '."'Debes relleñar todos los campos'".',
            showConfirmButton: false,
            timer: 2000
        	});

			</script>';
			
			}else{
				require_once "conexion/conexion.php";
				$user=$_POST['txtusuario'];
				$pass=$_POST['txtcontraseña'];
				$rol='2'; //Rango Usuario
				$nombres=$_POST['txtnombres'];
				$ape=$_POST['txtapellidos'];
				$tel=$_POST['txttelefono'];
				$correo=$_POST['txtcorreo'];
				$Activo='1'; //Predeterminado
				$fotoprod=addslashes(file_get_contents($_FILES['FotoProd']['tmp_name']));  				
				
				$sql="INSERT INTO usuario(nickname,contraseña,rol,nombres,apellidos,telefono,correo,foto,Activo) 
				VALUES('$user','$pass','$rol','$nombres','$ape','$tel','$correo','$fotoprod','$Activo')";
				
				$a=mysqli_query($con,$sql);

				if($a==1){
				
				echo '<script language="javascript">

					Swal.fire({
		            icon: '."'info'".',
		            title: '."'Oops...'".',
		            text: '."'Registro exitoso!!'".',
		            timer: 2000
		        	});

					</script>';

					

				}else{
				
				echo '<script language="javascript">

					Swal.fire({
		            icon: '."'error'".',
		            title: '."'Oops...'".',
		            text: '."'Error al registrarse!!'".',
		            timer: 2000
		        	});

					</script>';
				
			}
		}
	}

?>