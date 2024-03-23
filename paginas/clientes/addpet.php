<!DOCTYPE html>
<html lang="en">

<head>
	<title>Agregar Mascota</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vista/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../vista/css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../../controlador/agregarMascota.php" method="post">
					<span class="login100-form-title p-b-43">
						Agregar Mascota
					</span>

					<div class="wrap-input100 validate-input" data-validate="Nombre Mascota">
						<input required placeholder="Nombre de la mascota" class="input100" type="text" name="nombreMascota">

					</div>
					<div class="wrap-input100 validate-input" data-validate="edad Mascota">
						<input required placeholder="edad de la mascota" class="input100" type="number" name="edadMascota">

					</div>
					<div class="wrap-input100 validate-input" data-validate="raza Mascota">
						<input required placeholder="raza de la mascota" class="input100" type="text" name="razaMascota">

					</div>
					<div class="wrap-input100 validate-input" data-validate="Tipo Mascota">
						<input required placeholder="Tipo de la mascota" class="input100" type="text" name="tipoMascota">

					</div>

					<div class="col-12 d-flex pt-3 justify-content-center">
                        <div class="col-5">
                        <button class="btn btn-primary py-sm-4 px-sm-5 " type="submit">
							Agregar
						</button>
                        </div>
                    </form>
					<div class="col-5">
                    <form action="userpet.php">
                        <button class="btn btn-danger py-sm-4 px-sm-5  " type="submit">
							cancelar
						</button>

                        </form>
                        </div>
					</div>



				

                    <div class="login100-more" style="background-image: url('../../images/agregarMascota.jpg');">
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