<?php


require_once 'Modelo/Usuarios.PHP';


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

  <style>
    .inpusDatos {
      margin-top: 15px;
    }
  </style>

  <!-- aca coloco la libreria de ajax con jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tinymce@6.1.1/tinymce.min.js"></script>

  <link rel="stylesheet" href="./css/styleIndex.css">
  <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/b-3.0.1/datatables.min.css" rel="stylesheet">

  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="./index.php">Peluqueria Canina</a>
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
            <div class="sb-sidenav-menu-heading">principal</div>
            <a class="nav-link" href="./paginas/clientes/userindex.php">
              <i class="fa-solid fa-shop me-1" style="font-size: 20px"></i>
              Carrito
            </a>
            <a class="nav-link" href="./informes.php">
              <i class="fa-solid fa-chart-line me-1"></i>
              Informes y estadísticas
            </a>
            <a class="nav-link" href="./paginas/empleado/indexListar.php">
              <i class="fa-solid fa-users me-1" style="font-size: 20px"></i>
              Gestion Empleados
            </a>
            <a class="nav-link" href="./paginas/productos/index.producto.php">
              <i class="fa-solid fa-inbox me-1"></i>
              Gestion Productos
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

        <h5 class="p-3   ">Informes generales</h5>
 <!--Grafico de ventas-->
        <div class="card m-5"> 
          <div id="lineChart" style="height: 20rem;" class="echart m-3 p-4 ">

            <?php
            //realiza la consulta para enviar las datos a la gráfica
            require_once './modelo/MySQL.php';

            $mysql = new MySQL();
            $mysql->conectar();
            $result = null;


            $consulta = "SELECT inventarioproductos.nombreProducto as producto, count(inventarioProductos_idinventarioProducto) as ventas FROM detalleprodcuto INNER JOIN inventarioproductos ON detalleprodcuto.inventarioProductos_idinventarioProducto = inventarioproductos.idinventarioProducto

                        group by inventarioProductos_idinventarioProducto
                     ";

            $result = $mysql->efectuarConsulta($consulta);

            if ($result != null) {
              $data = array();
              while ($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
              $json = json_encode($data);
            }

            $mysql->desconectar();

            ?>


            <script>
              //recibe el objeto y lo pasa a un elemento html
              document.addEventListener("DOMContentLoaded", () => {

                var data = <?php echo $json; ?>;

                const dom = document.getElementById("lineChart");
                const chart = echarts.init(dom);

                chart.setOption({
                  renderer: 'canvas',
                  title: {
                    text: 'Cantidad de productos vendidos'
                  },
                  tooltip: {
                    trigger: 'axis'
                  },
                  xAxis: {
                    data: data.map(function(item) {
                      return item.producto;
                    })
                  },
                  yAxis: {},
                  series: [{
                    name: 'Value',
                    type: 'bar',
                    data: data.map(function(item) {
                      return item.ventas;
                    })
                  }]
                });



                setInterval(function() {
                  chart.resize()
                }, 300);
              })
            </script>

          </div>



        </div>

        <div class=" p-5">
            <div class=" ">Citas</div>
            <?php
            include("./modelo/mySQL2.php");
            $sentencia = $conexion->prepare("SELECT c.idCita, c.fechaCita, c.horaCita, c.estadoServicio, rc.nombreCliente AS nombre_cliente, rc.apellidoCliente AS apellido_cliente, rm.nombreMascota
            FROM cita c
            INNER JOIN registrocliente rc ON c.registroCliente_idClientes = rc.idClientes
            INNER JOIN resgistromascota rm ON c.resgistroMascota_idMascota = rm.idMascota;");
            $sentencia->execute();
            $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>


            <table id="table5" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">hora</th>
                  <th scope="col">estado</th>
                  <th scope="col">nombres</th>
                  <th scope="col">apellidos</th>
                  <th scope="col">mascota</th>
         

                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaUsuarios as $registro) { ?>
                  <tr class="">
                    <td><?php echo $registro["fechaCita"] ?></td>
                    <td><?php echo $registro["horaCita"] ?></td>
                    <td><?php echo $registro["estadoServicio"] ?></td>
                    <td><?php echo $registro["nombre_cliente"] ?></td>
                    <td><?php echo $registro["apellido_cliente"] ?></td>
                    <td><?php echo $registro["nombreMascota"] ?></td>

                  


                  </tr>
                <?php } ?>
              </tbody>
            </table>


   </div>
        <div class="row">
      <!--Tabla de administradores-->
          <div class="p-5">
            <div class=" ">Administradores</div>
            <?php
            include("./modelo/mySQL2.php");
            $sentencia = $conexion->prepare("SELECT *  from empleado inner join rol ON rol.idrol = empleado.rol_idRol ");
            $sentencia->execute();
            $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>


      
                <table id="table1" class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Cedula</th>
                      <th scope="col">Email</th>
                      <th scope="col">Rol</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listaUsuarios as $registro) { ?>
                      <tr class="">
                        <td><?php echo $registro["nombreEmpleado"] ?></td>
                        <td><?php echo $registro["apellidoEmpleado"] ?></td>
                        <td><?php echo $registro["cedulaEmpelado"] ?></td>
                        <td><?php echo $registro["emailEmpleado"] ?></td>
                        <td><?php echo $registro["rol_idRol"] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
      

          </div>
 <!--Tabla de inventario-->
          <div class=" p-5">
            <div class=" ">Inventario</div>
            <?php
            include("./modelo/mySQL2.php");
            $sentencia = $conexion->prepare("SELECT dirProducto, nombreProducto, precioProducto, strockProducto,categoria.nombreCategoria from inventarioproductos inner join categoria ON categoria.idCategoria = inventarioproductos.categoriaProducto");
            $sentencia->execute();
            $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>


      
                <table id="table2" class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Categoria</th>
                      <th scope="col">Imagen</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listaUsuarios as $registro) { ?>
                      <tr class="">
                        <td><?php echo $registro["nombreProducto"] ?></td>
                        <td><?php echo $registro["precioProducto"] ?></td>
                        <td><?php echo $registro["strockProducto"] ?></td>
                        <td><?php echo $registro["nombreCategoria"] ?></td>
                        <td><img src="<?php echo $registro["dirProducto"] ?>" width="100" class="img-thumbnail"></td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
          

          </div>
 <!--Tabla de clientes-->
          <div class=" p-5">
            <div class=" ">Clientes</div>
            <?php
            include("./modelo/mySQL2.php");
            $sentencia = $conexion->prepare("SELECT * from registrocliente");
            $sentencia->execute();
            $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>


            <table id="table3" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Cédula</th>
                  <th scope="col">Estado</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaUsuarios as $registro) { ?>
                  <tr class="">
                    <td><?php echo $registro["nombreCliente"] ?></td>
                    <td><?php echo $registro["apellidoCliente"] ?></td>
                    <td><?php echo $registro["telefonoCliente"] ?></td>
                    <td><?php echo $registro["emailCliente"] ?></td>
                    <td><?php echo $registro["cedulaCliente"] ?></td>
                    <td><?php if ($registro["estadoCliente"] == 1) {
                          echo "Activo";
                        } else {
                          echo "Inactivo";
                        }  ?></td>


                  </tr>
                <?php } ?>
              </tbody>
            </table>


          </div>
 <!--Tabla de citas-->
 

 <!--Tabla de mascotas-->
          <div class="p-5">
            <div class="  r">Mascotas</div>
            <?php
            include("./modelo/mySQL2.php");
            $sentencia = $conexion->prepare("SELECT  nombreMascota,edadMascota,razaMascota,tipoMascota,registrocliente.nombrecliente from resgistromascota inner join registrocliente ON resgistromascota.idcliente = registrocliente.idclientes");
            $sentencia->execute();
            $listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <table id="table4" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Raza</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Cliente</th>


                </tr>
              </thead>
              <tbody>
                <?php foreach ($listaUsuarios as $registro) { ?>
                  <tr class="">
                    <td><?php echo $registro["nombreMascota"] ?></td>
                    <td><?php echo $registro["razaMascota"] ?></td>
                    <td><?php echo $registro["tipoMascota"] ?></td>
                    <td><?php echo $registro["edadMascota"] ?></td>
                    <td><?php echo $registro["nombrecliente"] ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>


          </div>

        </div>


        <form action="informes.php" class="m-5" method="post">

          <label for="start_date">Fecha inicial:</label>
          <input class="form-control " type="date" id="inicio" name="inicio" required>
          <br>
          <label for="end_date">Fecha final:</label>
          <input class="form-control " type="date" id="final" name="final" required>
          <br>
          <button type=" submit" class="form-control  btn btn-primary">buscar</button>
        </form>

        <h5 class="p-3   -title ">Informes temporales</h5>
        <div>

         <!--Grafica de ventas-->
          <div id="lineChart2" style="height: 20rem;" class="card m-5 echart  p-4 ">
            <?php
            //realiza la consulta para enviar las datos a la gráfica

            require_once './modelo/MySQL.php';

            $mysql = new MySQL();
            $mysql->conectar();
            $result = null;
            if (isset($_POST['inicio']) && isset($_POST['final'])) {
              //Verificar si ya se estableció la fecha de busqueda
              $fechainicio = strtotime($_POST['inicio']);


              $fechafinal =   strtotime($_POST['final']);

              $mesinicio = date("m", $fechainicio);
              $yearinicio = date("Y", $fechainicio);
              $mesfinal = date("m",   $fechafinal);
              $yearfinal = date("Y",   $fechafinal);
              $diainicio = date("d",   $fechainicio);
              $diafinal = date("d",   $fechafinal);



              $consulta = "SELECT count(fechaventa) as ventas ,fechaventa  FROM facturaproducto where fechaventa between '" . $yearinicio . "-" . $mesinicio . "-" . $diainicio . " 00:00:00' and '" . $yearfinal . "-" .  $mesfinal  . "-" . $diafinal . " 00:00:00' GROUP BY MONTH(fechaventa)";



              $result = $mysql->efectuarConsulta($consulta);
            }


            if ($result != null) {
              $data = array();
              while ($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
              $json2 = json_encode($data);
            }

            $mysql->desconectar();

            ?>



            <script>
              document.addEventListener("DOMContentLoaded", () => {

                //recibe el objeto y lo pasa a un elemento html

                var data = <?php echo $json2; ?>;

                const dom2 = document.getElementById("lineChart2");
                const chart2 = echarts.init(dom2);

                chart2.setOption({
                  renderer: 'canvas',
                  title: {
                    text: 'Ventas de productos'
                  },
                  tooltip: {
                    trigger: 'axis'
                  },
                  xAxis: {
                    data: data.map(function(item) {
                      const fecha = new Date(item.fechaventa);

                      return fecha.toLocaleString('es-ES', {
                        month: 'long'
                      });
                    })
                  },
                  yAxis: {},
                  series: [{
                    name: 'Value',
                    type: 'bar',
                    data: data.map(function(item) {

                      return item.ventas;
                    })
                  }]
                });



                setInterval(function() {
                  chart2.resize()
                }, 300);

              })
            </script>

          </div>
        </div>

 <!--Grafica de citas-->
        <div>
          <div id="lineChart3" style="height: 20rem;" class="card m-5 echart  p-4 ">
            <?php
            //realiza la consulta para enviar las datos a la gráfica

            require_once './modelo/MySQL.php';

            $mysql = new MySQL();
            $mysql->conectar();
            $result = null;
            if (isset($_POST['inicio']) && isset($_POST['final'])) {
              //Verificar si ya se estableció la fecha de busqueda


              $consulta = "SELECT count(fechacita) as citas, fechaCita  FROM cita where fechacita between '" . $yearinicio . "-" . $mesinicio . "-" . $diainicio . " 00:00:00' and '" . $yearfinal . "-" .  $mesfinal  . "-" . $diafinal . " 00:00:00' GROUP BY MONTH(fechaCita)";




              $result = $mysql->efectuarConsulta($consulta);
            }


            if ($result != null) {
              $data = array();
              while ($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
              $json3 = json_encode($data);
            }

            $mysql->desconectar();

            ?>



            <script>
              document.addEventListener("DOMContentLoaded", () => {

                //recibe el objeto y lo pasa a un elemento html

                var data = <?php echo $json3; ?>;

                const dom3 = document.getElementById("lineChart3");
                const chart3 = echarts.init(dom3);

                chart3.setOption({
                  renderer: 'canvas',
                  title: {
                    text: 'Citas realizadas'
                  },
                  tooltip: {
                    trigger: 'axis'
                  },
                  xAxis: {
                    data: data.map(function(item) {
                      const fecha = new Date(item.fechaCita);

                      return fecha.toLocaleString('es-ES', {
                        month: 'long'
                      });
                    })
                  },
                  yAxis: {},
                  series: [{
                    name: 'Value',
                    type: 'bar',
                    data: data.map(function(item) {
                      return item.citas;
                    })
                  }]
                });

                setInterval(function() {
                  chart3.resize()
                }, 300);

              })
            </script>

          </div>



        </div>





      </main>
    </div>
  </div>


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
  <script>

//Inicializa el datatable para todas las tablas

    setTimeout(() => {
      $(document).ready(function() {
  $('#table1').DataTable({
    autoWidth: false
  });
});

    }, "500");
 


    setTimeout(() => {
      $(document).ready(function() {
  $('#table2').DataTable({
    autoWidth: false
  });
});
    }, "501");

    setTimeout(() => {
      $(document).ready(function() {
  $('#table3').DataTable({
    autoWidth: false
  });
});
    }, "502");

    setTimeout(() => {
      $(document).ready(function() {
  $('#table4').DataTable({
    autoWidth: false
  });
});
    }, "503");

    setTimeout(() => {
      $(document).ready(function() {
  $('#table5').DataTable({
    autoWidth: false
  });
});
    }, "504");
  </script>

  <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/b-3.0.1/datatables.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>



  <script src="js/datatables-simple-demo.js"></script>



</body>

</html>