

<?php
include("../../modelo/mySQL2.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
  
    $sentencia =$conexion->prepare("SELECT * FROM inventarioproductos WHERE inventarioproductos.idinventarioProducto =:idinventarioProducto");
    $sentencia->bindParam(":idinventarioProducto",$txtID);
    $sentencia->execute();
    $registro= $sentencia->fetch(PDO::FETCH_LAZY);
    $producto =$registro["nombreProducto"];
    $precio =$registro["precioProducto"];
    $stock =$registro["strockProducto"];
    $categoria =$registro["categoriaProducto"];
    $dirProducto =$registro["dirProducto"];
  }

  if ($_POST) {
    // Recolectamos datos 
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombreProducto = (isset($_POST["txtProducto"])) ? $_POST["txtProducto"] : "";
    $precioProducto = (isset($_POST["txtPrecio"])) ? $_POST["txtPrecio"] : "";
    $stockProducto = (isset($_POST["txtStock"])) ? $_POST["txtStock"] : "";
    $categoriaProducto = (isset($_POST["txtCategoria"])) ? $_POST["txtCategoria"] : "";
    $dirProducto = (isset($_POST["txtDirproducto"])) ? $_POST["txtDirproducto"] : "";
    $cmbRol = (isset($_POST["cmbCategoria"])) ? $_POST["cmbCategoria"] : "";

    // Inserción de datos
    $sentencia = $conexion->prepare("UPDATE inventarioproductos SET nombreProducto = :nombreProducto, precioProducto = :precioProducto, strockProducto = :stockProducto, categoriaProducto = :categoriaProducto, dirProducto = :dirProducto WHERE idinventarioProducto = :idEmpleado");
    
    // Asignamos los valores que vienen desde el formulario
    $sentencia->bindParam(":nombreProducto", $nombreProducto);
    $sentencia->bindParam(":precioProducto", $precioProducto); 
    $sentencia->bindParam(":stockProducto", $stockProducto); 
    $sentencia->bindParam(":categoriaProducto", $categoriaProducto); 
    $sentencia->bindParam(":dirProducto", $dirProducto); 
    $sentencia->bindParam(":idEmpleado", $txtID);
    
    $sentencia->execute();
    header("Location: index.producto.php");
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
        <a class="navbar-brand ps-3" href="../../index.php">Peluqueria Canina</a>
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
                        <a class="nav-link" href="./index.producto.php">
                            <div class="m-1"><i class="fa-solid fa-list" style="font-size: 20px"></i></div>
                            Listar
                        </a>
                        <a class="nav-link" href="./crear.producto.php">
                            <i class="fa-solid fa-user-plus m-1" style="font-size: 20px"></i>

                            Nuevo
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
                    <h4 class="card-title text-white">Editar Producto</h4>
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
                            <label for="" class="form-label">Producto</label>
                            <input type="text" value="<?php echo $producto; ?>" class="form-control" name="txtProducto" id="txtProducto"
                                placeholder="ingrese el Producto" />
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" value="<?php echo $precio; ?>" class="form-control" name="txtPrecio" id="txtPrecio"
                                placeholder="ingrese su Precio" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">stock</label>
                            <input type="text" value="<?php echo $stock; ?>" class="form-control" name="txtStock" id="txtStock"
                                placeholder="ingrese su Stock" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Categoria</label>
                            <input type="text" value="<?php echo $categoria; ?>" class="form-control" name="txtCategoria" id="txtCategoria"
                                placeholder="ingrese su Categoria" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">dirProducto</label>
                            <input type="text" value="<?php echo $dirProducto; ?>" class="form-control" name="txtDirproducto" id="txtDirproducto"
                                placeholder="ingrese su contrsena" />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label" >edit-categoria</label>
                            <select class="form-select form-select-lg mb-3" name="cmbCategoria" id="cmbCategoria">
                                <option selected>select</option>
                                <option value="1">limpieza</option>
                                <option value="2">herramienta</option>
                                <option value="3">juguete</option>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-success">
                                editar
                            </button>

                            <a class="btn btn-warning" href="./index.producto.php" role="button">cancelar</a>



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