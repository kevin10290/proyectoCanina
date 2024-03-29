<!--  Validación del inicio de sesión para poder acceder a la página -->

<?php

require_once '../../Modelo/Usuarios.PHP';


session_start();



$usuario = new Usuarios();

$usuario = $_SESSION['usuario'];


if ($_SESSION['acceso'] == true && $_SESSION['usuario'] != null && $_SESSION['rol'] == "Cliente") {


  $user = $usuario->getUser();
  $id = $usuario->getId();
  $rol = $usuario->getRol();
} else {
  header("Location: ./login.php");
  exit();
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
  <title>Dashboard - SB Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/elegant-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/nice-select.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/jquery-ui.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/owl.carousel.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/slicknav.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/style.css" rel="stylesheet" />


  <link href="../../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <a class="navbar-brand ps-3" href="userindex.php">Peluqueria Canina</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="">
      <i class="fas fa-bars"></i>
    </button>

    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
       
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


            <form action="Controlador/cerrarsesion.php" method="post">
              <!--  Apartado para llamar el control para cerrar sesión -->

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
            <div class="sb-sidenav-menu-heading">principal</div>
            <a class="nav-link" href="userindex.php">

              <span class="material-symbols-outlined">
                shopping_basket
              </span>


              ⠀ Tienda
            </a>

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
           
           <li class="nav-item">
               <a class="nav-link collapsed d-flex pl-3" href="#" data-toggle="collapse" data-target="#collapseItem" aria-expanded="true" aria-controls="collapseItem">
                   <i class="fas fa-fw fa-cog"></i>
                   <span class="pl-4">Citas</span>
               </a>
               <div id="collapseItem" class="collapse" aria-labelledby="headingItem" data-parent="#accordionSidebar">
                   <div class=" collapse-inner rounded d-flex">
                   <span class="material-symbols-outlined pl-3 pt-3">
                   library_add
                   </span>
                       <a class="collapse-item nav-link pl-3 pb-4 " href="addpet.php">Agregar mascota</a>
                   
                   </div>
               </div>
           </li>
           </ul>



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
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>





        <!--                                  -->





        <section class="p-5 row container-fluid d-flex align-content-start flex-wrap">


        <?php 
        
        require_once '../../Modelo/MySQL.PHP';
        $mysql = new MySQL;
        $mysql->conectar();

        
        $consulta = $mysql->efectuarConsulta("SELECT nombreProducto FROM inventarioproductos ");
              echo '<input id="categorias"  type="hidden" value="';
              for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
                $fila =  mysqli_fetch_array($consulta);
                echo ','.$fila[0];
              }
              echo '" input/>';
  
        
              $mysql->desconectar();
            ?>

          <div class="">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Carrito - <span id="carritocantidad"></span> </h5>
              </div>
              <input type="hidden" id="arregloproductos" name="" value="<?php echo str_replace( '"','~',$_POST['arregloproductos'] ) ?>">
              <div class="card-body">



                <!-- Motrar los productos que fueron enviados desde el formulario anterior -->
                <div id="carrito">
         


                </div>






              </div>
            </div>

            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Total</h5>
              </div>








              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Productos
                    <!--  Apartado para mostrar el total de productos desde el codigo js -->
                    <strong> <span id="total"></span> $</strong>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Total</strong>
                      <strong>
                        <!--  Apartado para mostrar el IVA de productos desde el codigo js -->
                        <p class="mb-0">(Incluyendo IVA)</p>
                      </strong>
                    </div>
                    <strong> <span id="IVA"></span> $</strong>
                  </li>
                </ul>

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                      <!--  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">-->
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4" action="controlador/confirmarCompra.php" method="post">
                      <!--  Formulario para enviar los datos  y crear la factura llamando la función de confirmar compra -->



                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText2" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText2">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY"
                              size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
                          </div>

                          <input id="productoshtml" type="hidden" name="productoshtml">

                          <input id="arregloproductof" type="hidden" name="arregloproductof">

                          <input id="idcliente" type="hidden" name="idcliente" value="<?php echo $id; ?>">

                          <input id="IVA2" type="hidden" name="total" value="">

                          <input id="" type="hidden" name="modoPago" value="Crédito">



                          <button type="submit" id="detallescompra" class="btn btn-success btn-lg btn-block">
                            Confirmar compra
                          </button>


                        </div>
                      </div>
                  </div>
                </div>



                <div class="card-body">
                  <ul class="list-group list-group-flush">



                  </ul>



                </div>
              </div>
            </div>
            <div class="col-md-4">

            </div>
          </div>



    </div>
  </div>
  </div>
  <div class="col-md-4">

  </div>
  </div>


  </div>

  </section>


  <!--                         -->


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
  <script src="../../js/carrito.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="../../js/scripts.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="../../js/datatables-simple-demo.js"></script>
</body>

</html>