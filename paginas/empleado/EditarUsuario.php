<?php
session_start();
require_once("../../modelo/Mysql.php");
$mysql = new MySql();
$conexion = $mysql->conectar(); // Obtener la conexión
$resultadoConsulta = $mysql->ConsultaCompleja("SELECT idEmpleado FROM empleado ORDER BY idEmpleado DESC LIMIT 1");
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
                            <div class="col">
                                <div class="bg-dark border border-dark m-2 p-4">
                                    <h1 class="display-6 fs-2 fw-normal mb-0 text-white">Editar Usuario</h1>
                                    <p class="text-white">
                                        <b>Editar</b> u <b>Eliminar</b> usuarios existentes, primero debes buscar
                                        el usuario que desea editar o eliminar.
                                    </p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-8 pe-4 border-end">
                                            <form action="" method="GET">
                                                <div class="row">
                                                    <div class="col-auto pe-0">
                                                        <label for="slFiltro" class="fs-5 text-white">Filtrar:</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <select
                                                            class="form-control-plaintext bg-dark border border-2 rounded-4 border-white text-white px-2"
                                                            name="slFiltro" id="slFiltro">
                                                            <option class="text-white">Seleccionar...</option>
                                                            <option value="idUsuario" class="text-white">ID</option>
                                                            <option value="Correo" class="text-white">Correo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <div
                                                            class="form-control-plaintext rounded-3 border border-2 border-white px-2 d-flex py-0 pe-0">
                                                            <input type="search"
                                                                class="form-control-plaintext text-white"
                                                                name="txtBuscar" id="txtBuscar">
                                                            <button type="submit" name="btnBuscar" class="btn">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24"
                                                                    style="fill: rgba(255, 255, 255, 1);">
                                                                    <path
                                                                        d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <table class="table table-striped table-hover mt-2">
                                                <thead>
                                                    <tr class="table-dark">
                                                        <th>ID</th>
                                                        <th>CORREO</th>
                                                        <th>CONTRASEÑA</th>
                                                        <th>NOMBRE</th>
                                                        <th>APELLIDO</th>
                                                        <th>CEDULA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($_GET["btnBuscar"])) {
                                                        $Filtro = $_GET["slFiltro"];
                                                        $Buscar = $_GET["txtBuscar"];

                                                        require_once("../../modelo/Mysql.php");
                                                        $mysql = new MySql;
                                                        $UsuarioBuscado = mysqli_fetch_all($mysql->ConsultaCompleja("SELECT * FROM empleado WHERE $Filtro LIKE '%$Buscar%';"));
                                                        for ($i = 0; $i < count($UsuarioBuscado); $i++) {
                                                            ?>
                                                            <tr>
                                                                <td class="pt-3 text-warning ">
                                                                    <?php echo $UsuarioBuscado[$i][0]; ?>
                                                                </td>
                                                                <td class="pt-3">
                                                                    <?php echo $UsuarioBuscado[$i][1]; ?>
                                                                </td>
                                                                <td class="pt-3">
                                                                    <?php echo $UsuarioBuscado[$i][2]; ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <form action="./controlador/eliminarUsuario.php"
                                                                            method="POST"
                                                                            class="btn btn-outline-danger rounded-0 py-0 px-2 m-0">
                                                                            <button type="submit" name="btnEliminar"
                                                                                value="<?php echo $UsuarioBuscado[$i][0]; ?>"
                                                                                class="btn px-0 m-0">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20" viewBox="0 0 24 24"
                                                                                    fill="currentColor">
                                                                                    <path
                                                                                        d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                    </path>
                                                                                    <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                        <button class="btn btn-outline-info rounded-0 px-2"
                                                                            id="btnEditar">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                fill="currentColor">
                                                                                <path
                                                                                    d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                                                                </path>
                                                                                <path
                                                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                                                                </path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col ps-4">
                                            <form action="./controller/EditarUsuario.php" method="POST">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="txtId" class="fs-5">ID</label>
                                                        <input type="text"
                                                            class="form-control-plaintext border border-1 border-dark px-2"
                                                            name="txtId" id="txtId" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label for="slEstado" class="fs-5">Estado</label>
                                                        <select
                                                            class="form-control-plaintext border border-1 border-dark px-2"
                                                            name="slEstado" id="slEstado">
                                                            <option>Seleccionar...</option>
                                                            <option value="1">ACTIVO</option>
                                                            <option value="0">INACTIVO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label for="txtCorreo" class="fs-5">Correo</label>
                                                <input type="email"
                                                    class="form-control-plaintext border border-1 border-dark px-2"
                                                    name="txtCorreo" id="txtCorreo" required>

                                                <label for="txtContraseña" class="fs-5">Contraseña</label>
                                                <input type="password"
                                                    class="form-control-plaintext border border-1 border-dark px-2 mb-4"
                                                    name="txtContraseña" id="txtContraseña" required>
                                                <input type="submit" class="btn btn-dark rounded-0 w-100"
                                                    value="Editar">
                                            </form>
                                        </div>
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