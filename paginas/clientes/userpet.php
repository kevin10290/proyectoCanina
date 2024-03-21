<!--  Validación del inicio de sesión para poder acceder a la página -->

<?php

require_once '../../modelo/usuarios.PHP';


session_start();

$usuario = new Usuarios();

$usuario = $_SESSION['usuario'];

// si entra un cliente
if ($_SESSION['acceso'] == true && $_SESSION['usuario'] != null && $_SESSION['rol'] == "Cliente") {


  $user = $usuario->getUser();
  $id = $usuario->getId();
  $rol = "Cliente";
  // en cambio si entra administradores
} else {

  if ($_SESSION['acceso'] == true && $_SESSION['usuario'] != null && ($_SESSION['rol']  == "1" ||  $_SESSION['rol'] == "2" ||  $_SESSION['rol'] == "3")) {


    $user = $usuario->getUser();
    $id = $usuario->getId();
    $_SESSION['idUsuario'] = $id;
    $idrol = $usuario->getRol();
    $role = array("","ROOT", "admin", "cajero");
    
    $rol = $role[ $_SESSION['rol']  ]; // cerrar página
  } else {
    header("Location: ./login.php");
    exit();
  }
}

?>

<?php
require_once '../../modelo/Mysql.php';
$mysql = new MySQL();

$mysql->conectar();

$consulta = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.cita INNER JOIN bd_mascotas.resgistromascota ON bd_mascotas.cita.resgistroMascota_idMascota = bd_mascotas.resgistromascota.idMascota RIGHT JOIN bd_mascotas.registrocliente ON bd_mascotas.cita.registroCliente_idClientes = bd_mascotas.registrocliente.idClientes WHERE idCita IS NOT NULL;");





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../vista/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/style.css" type="text/css">
  <link rel="stylesheet" href="../../vista/css/userpet.css">
  <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link href="../../vista/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">Peluqueria Canina</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
     </form>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <!-- Motrar el usuario actual -->
          <li><a class="dropdown-item" href="">
              <?php echo $user . " - " . "Cliente" ?>
            </a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>


            <form action="../../Controlador/cerrarsesion.php" method="post">
              <!--  Apartado para llamar el control para cerrar sesión -->

              <input class="dropdown-item" type="submit" value="Cerrar Sesion">



            </form>
  </nav>

  
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">principal</div>
            <a class="nav-link" href="userindex.php">

              <span class="material-symbols-outlined">
                shopping_basket
              </span>


              ⠀ Tienda
            </a>

            <a class="nav-link" href="userpet.php">
              <span class="material-symbols-outlined">
                event
              </span>
              ⠀ Citas
            </a>




            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.html">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <form action="../../controlador/userpet.php" method="post">
          <div class="col-12 py-xl-4">
            <br>
            <h1>Programación de citas</h1>
          </div>
          <div class="col-12 d-flex py-xl-2 formularios">
            <div class="card d-block p-5 col-12 formCita">

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ingresa la fecha de tu cita</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="fecha">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ingresa hora de la cita</label>
                <input type="time" class="form-control" id="exampleInputPassword1" name="hora">
              </div>
              <p><strong>Ingrese los datos de su mascota</strong></p>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre de la Mascota</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nomMascota">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Edad</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="edadMascota">
              </div>


              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Raza</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="razaMascota">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="tipoMascota">
              </div>


              <div class="">
                <button type="submit" class="btn btn-primary ">Establecer cita </button>
              </div>
            </div>

          </div>




        </form>
        <div class="col-12 p-4">
          <div class="card-body py-xl-4 ps-xl-3 ">

            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>Nombre Cliente</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Nombre Mascota</th>
                  <th>Raza</th>
                  <th>Tipo</th>
                  <th>Fecha Cita</th>
                  <th>Hora</th>
                  <th>Editar Cita</th>
                  <th>Cancelar</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($consulta)) { ?>
                  <tr>
                    <td><?php echo $row['nombreCliente'] ?></td>
                    <td><?php echo $row['apellidoCliente'] ?></td>
                    <td><?php echo $row['cedulaCliente'] ?></td>
                    <td><?php echo $row['nombreMascota'] ?></td>
                    <td><?php echo $row['razaMascota'] ?></td>
                    <td><?php echo $row['tipoMascota'] ?></td>
                    <td><?php echo $row['fechaCita'] ?></td>
                    <td><?php echo $row['horaCita'] ?></td>

                    <td class="bg-warning">
                      <! --Envio datos de la consulta para editarlos en editUserpet -->
                        <?php


                        ?>
                        <form action="editUserpet.php? idCita=<?php echo $row['idCita'] ?>& 
          fecha=<?php echo $row['fechaCita'] ?>&hora=<?php echo $row['horaCita'] ?>&
          nombreMascota=<?php echo $row['nombreMascota'] ?>&
          edad=<?php echo $row['edadMascota'] ?>&raza=<?php echo $row['razaMascota'] ?>&
          tipo=<?php echo $row['tipoMascota'] ?>&" method="post">
                          <input type="hidden" name="idMascota" value="<?php echo $row['idMascota'] ?>">

                          <button class="btn btn-warning" type="submit">Editar</button>
                        </form>
                    </td>

                    <td class="bg-warning">
                      <form action="../../controlador/cancelarUserpet.php? idCita=<?php echo $row['idCita'] ?>" method="post">
                        <button class="btn btn-danger" type="submit">Cancelar</button>
                      </form>
                    </td>
                  </tr>


                <?php }
                $mysql->desconectar(); ?>
              </tbody>
            </table>
          </div>
        </div>

        <!--Aqui se agrega el contenido -->
        <!--Aregar un formulario de crear cita -->
        <!--Aregar un formulario de crear mascota -->

        <!--Aregar tabla para mostrar citas agendadas -->



      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.nice-select.min.js"></script>
  <script src="../../js/jquery-ui.min.js"></script>
  <script src="../../js/jquery.slicknav.js"></script>
  <script src="../../js/mixitup.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
  <script src="../../js/main.js"></script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="../../assets/demo/chart-area-demo.js"></script>
  <script src="../../assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="../../js/datatables-simple-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script>
  if (<?php echo ($_GET['Error']) ?> == true) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "<?php echo ($_GET['Mensaje']) ?>",

    });

  }
</script>
<script>
  if (<?php echo ($_GET['Exito']) ?> == true) {
    Swal.fire({
      icon: "success",
      title: "!Bien hecho...",
      text: "<?php echo ($_GET['Mensaje']) ?>",

    });

  }
</script>

<script>
  if (<?php echo ($_GET['editado']) ?> == true) {
    Swal.fire({
      icon: "success",
      title: "!Bien hecho...",
      text: "<?php echo ($_GET['Mensaje']) ?>",

    });

  }
</script>

<script>
  if (<?php echo ($_GET['eliminado']) ?> == true) {
    Swal.fire({
      icon: "success",
      title: "Se Cancelo Cita!",
      text: "<?php echo ($_GET['Mensaje']) ?>",

    });

  }
</script>