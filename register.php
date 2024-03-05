<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/css/util.css">
	<link rel="stylesheet" type="text/css" href="vista/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="controlador/registro.php" method="post">
					<span class="login100-form-title p-b-43">
						Registrate
					</span>
					<div class="wrap-input100 validate-input" data-validate="Cédula requerida">
						<input required placeholder="Cédula" class="input100" type="number" name="cedula">
	
					</div>
					<div class="wrap-input100 validate-input" data-validate="Nombre requerido">
						<input required class="input100" placeholder="Nombre" type="text" name="nombre">
				</div>
					<div class="wrap-input100 validate-input" data-validate="Apellido requerido">
						<input required class="input100" type="text" placeholder="Apellido" name="apellido">
				
					</div>
					<div class="wrap-input100 validate-input" data-validate="Teléfono requerido">
						<input required class="input100" type="text" placeholder="Teléfono" name="tel">
					
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Correo válido">
						<input required class="input100" type="email" placeholder="Correo" name="email">
				 
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Contraseña reuqerida">
						<input required class="input100" type="password" placeholder="Contraseña" name="pass">
					
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div >
							
						<label class="txt1" for="ckb1" >
								¿Ya tienes cuenta?
							</label>
						</div>

						<div>
							<a href="./login.php" class="txt1" for="ckb1">
								Logueate
							</a>
						</div>
					</div>

					
					


					
			

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn mt-3" type="submit">
							Register
						</button>
					</div>
					

				
				</form>

				<div class="login100-more" style="background-image: url('images/cat-8540772_1280.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        if (<?php echo ($_GET['Error']) ?> == true) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "<?php echo ($_GET['Mensaje']) ?>",
              
            });

        }
    </script>