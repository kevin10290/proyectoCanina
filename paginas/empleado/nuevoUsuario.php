<?php 
session_start();
require_once("../../modelo/Mysql.php");
$mysql = new MySql();
$conexion = $mysql->conectar(); // Obtener la conexión
$resultadoConsulta = $mysql->ConsultaCompleja( "SELECT idEmpleado FROM empleado ORDER BY idEmpleado DESC LIMIT 1");
$resultado = mysqli_fetch_all($resultadoConsulta);
$MinID = $resultado[0][0] + 1;
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
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!"></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Cerrar Sesion</a></li>
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
                        <a class="nav-link" href="./EditarUsuario.php">
                            <i class="fa-solid fa-user-pen m-1" style="font-size: 20px">

                            </i>
                            Editar
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
                    <h4 class="card-title text-white">insertar empleado</h4>
                    <p class="card-text"></p>
                </div>
            </div>

            <div class="card text-center m-2 bg-dark d-flex">
                <div class="container bg-dark m-2">
                    <div class="row">
                        <div class="col">
                            <!-- aqui va el ingreso de datos  -->
                           <div class="row ">
                           <div class="bg-dark  border border-3 rounded-3 border-white m-1 p-2">
                    <h1 class="display-6 fs-2 fw-normal mb-0 text-white">Nuevo Usuario</h1>
                    <p class="text-secondary text-white mt-2">ingresa un nuevo Usuario a la lista de Usuario</p>
                    <hr>
                    <div class="row">
                        <div class="col-4 ms-3">
                            <form action="./controlador/crearUsuario.php" method="POST">
                                <div class="row ">
                                    <div class="col-4">
                                        <label for="txtId" class="fs-5 text-white">ID</label>
                                        <input type="number" min="<?php echo $MinID; ?>" value="<?php echo $MinID; ?>"
                                            class="form-control-plaintext rounded-4 border border-2 border-secondary px-2 bg-white" name="txtId"
                                            id="txtId">
                                    </div>
                                    <div class="col">
                                        <label for="slEstado" class="fs-5">Estado</label>
                                        <select class="form-control-plaintext rounded-4 border border-1 border-secondary px-2 bg-white"
                                            name="slEstado" id="slEstado">
                                            <option>Seleccionar Rol</option>
                                            <option value="1">admin</option>
                                            <option value="2">cliente</option>
                                            <option value="3">Empleado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                       

                                            <label for="txtCorreo" class="fs-5 text-white">Correo</label>
                                        <input type="email"
                                            class="form-control-plaintext rounded-3  border border-1 border-secondary bg-white px-2 "
                                            name="txtCorreo" id="txtCorreo">

                                            
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="txtContraseña" class="fs-5 text-white">Contraseña</label>
                                        <input type="password"
                                            class="form-control-plaintext bg-white rounded-3 border border-1 border-secondary px-2 mb-2"
                                            name="txtContraseña" id="txtContraseña">
                                        <p class="text-danger fw-semibold mb-0" id="lblError"></p>
                                        <input type="password"
                                            class="form-control-plaintext border border-1 rounded-3 border-dark px-2 bg-white"
                                            placeholder="Confirmar contraseña" id="txtConfirmPass">
                                    </div>

                                   
                                </div>
                           </div>


                                <div class="col-4 ms-5">

                            <label for="" class="fs-5 text-white">Nombre</label>
                                <input type="text"
                                    class="form-control-plaintext rounded-3  border border-1 border-secondary bg-white px-2 "
                                    name="txtNombre" id="txtNombre">

                                    <label for="" class="fs-5 text-white">Apellido</label>
                                <input type="text"
                                    class="form-control-plaintext rounded-3  border border-1 border-secondary bg-white px-2 "
                                    name="txtApellido" id="txtApellido">

                                    <label for="" class="fs-5 text-white">cedula</label>
                                <input type="text"
                                    class="form-control-plaintext rounded-3  border border-1 border-secondary bg-white px-2 "
                                    name="txtCedula" id="txtCedula">

                                   <div class="col">
                                   <input type="submit" class=" mt-3 btn btn-dark border-4 border-white rounded-3 w-100" value="Agregar">
                                   </div>
                            </div>


                               
                            </form>
                        </div>
                        
                    </div>
                </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; canina Website 2024</div>
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