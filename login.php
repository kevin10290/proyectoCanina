<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
			
			<form class="login100-form validate-form" action="controlador/login.php" method="post">
					<span class="login100-form-title p-b-43">
						Ingrese para continuar
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input required placeholder="Correo" class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input required placeholder="Contraseña" class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
				
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div >
							
						<label class="txt1" for="ckb1" >
								¿No tienes cuenta?
							</label>
						</div>

						<div>
							<a href="./register.php" class="txt1" for="ckb1">
								Registrate
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="pb-3 fs-20 pt-3 btn btn-primary btn-block" type="submit">
							Ingresar
						</button>
					</div>
					

				
				</form>

				<div class="login100-more" style="background-image: url('images/pets-3715733_1280.jpg');">
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