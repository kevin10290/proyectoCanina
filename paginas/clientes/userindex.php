<!--  Validación del inicio de sesión para poder acceder a la página -->
<?php

require_once '../../modelo/usuarios.PHP';


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
          <li><a class="dropdown-item" href="">
              <!--  Mostrar el usuario que ha iniciado sesión -->
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


        <section class="p-5 row container-fluid d-flex align-content-start flex-wrap">



          <div class=" col-9">
            <div class="row">
              <div class="">
                <div class="section-title">
                  <h2>Productos para tu mascota</h2>
                </div>
                <div class="featured__controls">
                  <ul>
                    <li class="" data-filter="*">Todos</li>
                    <li data-filter=".limpieza" class="">
                      Jabones y shampoos
                    </li>
                    <li data-filter=".herramienta" class="">Herramientas</li>
                    <li data-filter=".juguete" class="">juguete</li>

                  </ul>
                </div>
              </div>
            </div>



            <div class="row featured__filter" id="MixItUpB25F5E">

              <!-- Apartado de php para consultar y mostrar los productos con sus respectivos identificadores, categorias e imágenes -->
              <?php

              require_once '../../Modelo/MySQL.PHP';
              $mysql = new MySQL;
              $mysql->conectar();

              $consulta = $mysql->efectuarConsulta("select
                inventarioproductos.idinventarioProducto,
                inventarioproductos.nombreProducto,
                inventarioproductos.precioProducto, categoria.nombreCategoria,
                inventarioproductos.dirProducto,
                inventarioproductos.strockProducto
                from inventarioproductos INNER
                JOIN categoria ON categoria.idCategoria =
                inventarioproductos.categoriaProducto ");

     

              for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
                $fila =
                  mysqli_fetch_array($consulta);
               

if( $fila[5] == 0 ){

  echo '

  <div
    class=" ' . $fila[3] . '"
  >

  <input type="hidden" id="producto' . $fila[0] . '" value="' . $fila[5] . '">
   
    
    </div>
 

  ';
}else{

  echo '

  <div
    class="col-lg-3 col-md-4 col-sm-6 mix oranges ' . $fila[3] . '"
  >

  <input type="hidden" id="producto' . $fila[0] . '" value="' . $fila[5] . '">
    <div class="featured__item">
    <img src="../../' . $fila[4] . '" class="img-thumbnail rounded-5" >
      <div class="featured__item__text">
        <h6><a   onclick=agregarcarrito(' . $fila[0] . ',"' . str_replace(" ", "_", $fila[1]) . '","' . $fila[4] . '","' . $fila[3] . '","' . $fila[2] . '","' . $fila[5] . '")        >' . $fila[1] . '</a></h6>
        <h5>$' . $fila[2] . '</h5>
        <p class="fw-light">Unidades <span id= "unidad' . $fila[0] . '">' . $fila[5] . '</span></p>
      </div>
    </div>
  </div>

  ';


}

              }
              $consulta = $mysql->efectuarConsulta("SELECT nombreProducto FROM inventarioproductos  ");
              echo '<input id="categorias"  type="hidden" value="';
              for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
                $fila =  mysqli_fetch_array($consulta);
                echo ','.$fila[0];
              }
              echo '" input/>';
  
        
              $mysql->desconectar();
          
              ?>


            </div>
          </div>


          <div class="col">


            <div class="col">
              <div class="">
                <div class="card mb-4">
                  <div class="card-header py-3">
                    <!--  Apartado para mostrar la cantidad de productos desde el codigo js -->
                    <h5 class="mb-0">Carrito - <span id="carritocantidad"></span> </h5>
                  </div>
                  <div class="card-body">




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
                            <p class="mb-0">(Incluyendo IVA)</p>
                          </strong>
                        </div>
                        <!--  Apartado para mostrar el IVA de productos desde el codigo js -->
                        <strong><span id="IVA"></span> $</strong>
                        <input id="IVA2" type="hidden" name="total" value="">

                      </li>
                    </ul>
                    <!--  Formulario para enviar datos a la págian de confirmación de compra, contiene datos de este apartado -->
                    <form action="userbuy.php" method="post">

                      <input id="productoshtml" type="hidden" name="productoshtml">

                      <input id="arregloproductos" type="hidden" name="arregloproductos">

                      <button id="detallescompra" disabled type="submit" class="btn btn-primary btn-lg btn-block">
                        Ir a comprar
                      </button>
                    </form>


                  </div>
                </div>
              </div>
              <div class="col-md-4">

              </div>
            </div>


          </div>

        </section>





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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="../../js/datatables-simple-demo.js"></script>
</body>

</html>  
  <script>
        if (<?php if(isset($_GET['Error'])){ echo ($_GET['Error']); } else{echo "false";}?> == true) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "<?php if(isset($_GET['Mensaje'])){ echo ($_GET['Mensaje']); }?>",
              
            });

        }
    </script>