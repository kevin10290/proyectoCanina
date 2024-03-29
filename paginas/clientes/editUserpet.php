<!DOCTYPE html>
<html lang="en">

<head>
	<title>Editar Mascota</title>
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
				<form class="login100-form validate-form" action="../../controlador/editarUserpet.php" method="post">
					<span class="login100-form-title p-b-43">
						Editar cita
					</span>
                    <input  type="hidden" name="idMascota" value="<?php echo $_POST['idMascota']?>">
                    
						<input  type="hidden" name="idCita" value="<?php echo $_GET['idCita']?>">
						<input  type="hidden" name="horaAntigua" value="<?php echo $_GET['hora']?>">
						<input  type="hidden" name="fechaAntigua" value="<?php echo $_GET['fecha']?>">

					<div class="wrap-input100 validate-input" data-validate="Fecha requerida">
						<input required placeholder="fecha" class="input100" type="date" name="fecha" value="<?php echo $_GET['fecha']?>">

					</div>
					<div class="wrap-input100 validate-input" data-validate="Hora requerido">
						<input required class="input100" placeholder="hora" type="time" name="hora" value="<?php echo $_GET['hora']?>">
					</div>
					<div class="wrap-input100 validate-input" data-validate="Nombre de Mascota">
						<input required class="input100" type="text" placeholder="Nombre Mascota" name="nombreMascota" value="<?php echo $_GET['nombreMascota']?>">

					</div>
					<div class="wrap-input100 validate-input" data-validate="Edad requerida">
						<input required class="input100" type="text" placeholder="Edad Mascota" name="edadMascota" value="<?php echo $_GET['edad']?>">

					</div>
					<div class="wrap-input100 validate-input" data-validate="Raza requerida">
						<input required class="input100" type="text" placeholder="Raza" name="razaMascota" value="<?php echo $_GET['raza']?>">

					</div>

					<div class="wrap-input100 validate-input" data-validate="Tipo Mascota">
						<input required class="input100" type="text" placeholder="Tipo Mascota" name="tipoMascota" value="<?php echo $_GET['tipo']?>">

					</div>
				








					<div class="col-12 d-flex pt-3 justify-content-center">
                        <div class="col-5">
                        <button class="btn btn-primary py-sm-4 px-sm-5 " type="submit">
							Editar
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



				

				<div class="login100-more" style="background-image: url('../../images/bgEditCita2.jpg');">
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