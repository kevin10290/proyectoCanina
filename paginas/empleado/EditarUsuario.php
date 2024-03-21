<?php
//Validación de inicio de sesión como administrador

require_once '../../Modelo/Usuarios.PHP';


session_start();



$usuario = new Usuarios();

$usuario = $_SESSION['usuario'];


if ($_SESSION['acceso'] == true && $_SESSION['usuario'] != null && ($_SESSION['rol']  == "1" ||  $_SESSION['rol'] == "2" ||  $_SESSION['rol'] == "3")) {


    $user = $usuario->getUser();
    $id = $usuario->getId();
    $_SESSION['idUsuario'] = $id;
    $idrol = $usuario->getRol();
    $rol = array("ROOT", "admin", "cajero");
} else {
    header("Location: ../../login.php");
    exit();
}

?>



<?php
include("../../modelo/mySQL2.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
  
    $sentencia =$conexion->prepare("SELECT * FROM empleado WHERE empleado.idEmpleado =:idEmpleado");
    $sentencia->bindParam(":idEmpleado",$txtID);
    $sentencia->execute();
    $registro= $sentencia->fetch(PDO::FETCH_LAZY);
    $nombre =$registro["nombreEmpleado"];
    $apellido =$registro["apellidoEmpleado"];
    $cedula =$registro["cedulaEmpelado"];
    $email =$registro["emailEmpleado"];
    $contrasenaa =$registro["passEmpleado"];
  }

  if ($_POST) {
    // Recolectamos datos 
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombreEmpleado = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
    $apellidoEmpleado = (isset($_POST["txtApellido"])) ? $_POST["txtApellido"] : "";
    $cedulaEmpelado = (isset($_POST["txtCedula"])) ? $_POST["txtCedula"] : "";
    $emailEmpleado = (isset($_POST["txtEmail"])) ? $_POST["txtEmail"] : "";
    $txtContrasena = (isset($_POST["txtContrasena"])) ? $_POST["txtContrasena"] : "";
    $cmbRol = (isset($_POST["cmbRol"])) ? $_POST["cmbRol"] : "";
    $cmbEstado = (isset($_POST["cmbEstado"])) ? $_POST["cmbEstado"] : "";

    // Inserción de datos
    $sentencia = $conexion->prepare("UPDATE empleado SET nombreEmpleado = :nombreEmpleado, apellidoEmpleado = :apellidoEmpleado, cedulaEmpelado = :cedulaEmpelado, emailEmpleado = :emailEmpleado, passEmpleado = :passEmpleado, rol_idRol = :rol_idRol, estadoEmpleado = :estadoEmpleado WHERE idEmpleado = :idEmpleado");
    
    // Asignamos los valores que vienen desde el formulario
    $sentencia->bindParam(":nombreEmpleado", $nombreEmpleado);
    $sentencia->bindParam(":apellidoEmpleado", $apellidoEmpleado);
    $sentencia->bindParam(":cedulaEmpelado", $cedulaEmpelado);
    $sentencia->bindParam(":emailEmpleado", $emailEmpleado);
    $sentencia->bindParam(":passEmpleado", $txtContrasena);
    $sentencia->bindParam(":rol_idRol", $cmbRol); // Cambiado de :cmbRol a :rol_idRol
    $sentencia->bindParam(":estadoEmpleado", $cmbEstado); // Cambiado de :cmbEstado a :estadoEmpleado
    $sentencia->bindParam(":idEmpleado", $txtID);
    $sentencia->execute();
    header("Location: indexListar.php");
    exit(); // Agregado para asegurar que la ejecución del script finalice después de redireccionar
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../vista/css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../../index.html">Peluqueria Canina</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!"><?php echo $user . " - " . $rol[$idrol] ?></a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>
            <form action="Controlador/cerrarsesion.php" method="post">


              <input class="dropdown-item" type="submit" value="Cerrar Sesion">



            </form>
          </li>
        </ul>
      </li>
    </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Empleados</div>
                        <a class="nav-link" href="./indexListar.php">
                            <div class="m-1"><i class="fa-solid fa-list" style="font-size: 20px"></i></div>
                            Listar
                        </a>
                        <a class="nav-link" href="./nuevoUsuario.php">
                            <i class="fa-solid fa-user-plus m-1" style="font-size: 20px"></i>

                            Nuevo
                        </a>

                        <a class="nav-link" href="../../index.php">
              <i class="fa-solid fa-arrow-left m-1" style="font-size: 20px"></i>

              Regresar
            </a>


                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
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
                    <div class="small">Bienvenido a</div>
                    Peluqueria Canina
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            <div class="card text-center m-2 bg-dark">

                <div class="card-body">
                    <h4 class="card-title text-white">Editar empleado</h4>
                    <p class="card-text"></p>
                </div>
                <!-- codigo de edicion -->

                
                

                <div class="card  p-3">
                    <div class="card-header"></div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                    <label for="txtID" class="form-label">ID:</label>
                    <input
                        type="text"
                        value="<?php echo $txtID; ?>"
                        class="form-control"
                        readonly
                        name="txtID"
                        id="txtID"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="txtNombre" id="txtNombre"
                                placeholder="ingrese el nombre" />
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Apellido</label>
                            <input type="text" value="<?php echo $apellido; ?>" class="form-control" name="txtApellido" id="txtApellido"
                                placeholder="ingrese su Apellido" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Cedula</label>
                            <input type="text" value="<?php echo $cedula; ?>" class="form-control" name="txtCedula" id="txtCedula"
                                placeholder="ingrese su Cedula" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" value="<?php echo $email; ?>" class="form-control" name="txtEmail" id="txtEmail"
                                placeholder="ingrese su Email" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">contrasena</label>
                            <input type="text" value="<?php echo $contrasenaa; ?>" class="form-control" name="txtContrasena" id="txtContrasena"
                                placeholder="ingrese su contrsena" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label" >idRol</label>
                            <select class="form-select form-select-lg mb-3" name="cmbRol" id="cmbRol">
                                <option selected>select</option>
                                <option value="1">ROOT</option>
                                <option value="2">admin</option>
                                <option value="3">Cajero</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label" >Estado</label>
                            <select class="form-select form-select-lg mb-3" name="cmbEstado" id="cmbEstado">
                                <option selected>select</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">
                                Registrar
                            </button>

                            <a class="btn btn-warning" href="./indexListar.php" role="button">cancelar</a>



                    </div>



                    </form>

                </div>
                <div class="card-footer text-muted">Footer</div>
            </div>

        </div>



    </div>

    </div>

    </div>

   
    </div>
    </div>
    <script src="../../assets/confirm_pass.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/demo/chart-area-demo.js"></script>
    <script src="../../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>

</body>

</html>