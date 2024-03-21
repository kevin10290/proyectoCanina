<?php
include("../../modelo/mySQL2.php");

if(isset($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

  $sentencia =$conexion->prepare("DELETE FROM inventarioproductos WHERE inventarioproductos.idinventarioProducto =:idinventarioProducto");
  $sentencia->bindParam(":idinventarioProducto",$txtID);
  $sentencia->execute();
  header("Location:index.producto.php");
}

$sentencia = $conexion->prepare("SELECT *,(SELECT nombreCategoria FROM categoria WHERE categoria.idCategoria = inventarioproductos.categoriaProducto limit 1) as category
FROM inventarioproductos");
$sentencia->execute();
$listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
            <div class="sb-sidenav-menu-heading">Productos</div>
            <a class="nav-link" href="indexListar.php">
              <div class="m-1"><i class="fa-solid fa-list" style="font-size: 20px"></i></div>
              Listar
            </a>
            <a class="nav-link" href="./crear.producto.php">
              <i class="fa-solid fa-user-plus m-1" style="font-size: 20px"></i>

              Nuevo
            </a>


            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                  aria-expanded="false" aria-controls="pagesCollapseAuth">
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
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError"
                  aria-expanded="false" aria-controls="pagesCollapseError">
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
          <h4 class="card-title text-white">Seccion Productos</h4>
          <p class="card-text"></p>
        </div>
      </div>
      <!-- comienza el codigo de insercion -->
      <div class="card text-center m-2 bg-dark d-flex justify-content-center">

        <div class="card">
          <div class="card-header">Usuarios</div>
          <div class="card-body">
            <div class="table-responsive-sm">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">prodcto</th>
                    <th scope="col">precio</th>
                    <th scope="col">stock</th>
                    <th scope="col">categoria</th>
                    <th scope="col">dirProducto</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($listaUsuarios as $registro) { ?>
                  <tr class="">
                    <td><?php echo $registro["nombreProducto"] ?></td>
                    <td><?php echo $registro["precioProducto"] ?></td>
                    <td><?php echo $registro["strockProducto"] ?></td>
                    <td><?php echo $registro["category"] ?></td>
                    <td><?php echo $registro["dirProducto"] ?></td>
                    <td><a class="nav-link" href="./editar.producto.php?txtID=<?php echo $registro["idinventarioProducto"] ?>"><i class="fa-solid fa-user-pen m-1" style="font-size: 20px"></i></a> </td>
                    <td><a class="nav-link" href="./indexListar.php?txtID=<?php echo $registro["idinventarioProducto"] ?>"><i class="fa-solid fa-trash m-1" style="font-size: 20px"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>
          <div class="card-footer text-muted">Footer</div>
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