







<?php 


require_once 'Modelo/Usuarios.PHP';


session_start();

require_once "MYSQL.php";
$mysql = new MYSQL;
$mysql->conectar();

$consultaProductos = $mysql->efectuarConsulta("SELECT  inventarioproductos.idinventarioProducto,inventarioproductos.nombreProducto,categoria.nombreCategoria,inventarioproductos.precioProducto,inventarioproductos.strockProducto FROM bd_mascotas.inventarioproductos INNER JOIN bd_mascotas.categoria ON inventarioproductos.categoriaProducto = categoria.idCategoria");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <!-- aca coloco la libreria de ajax con jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./css/styleIndex.css">
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.html">Peluqueria Canina</a>
      <!-- Sidebar Toggle-->
      <button
        class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"
        href="#!"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <form
        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
      >
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search for..."
            aria-describedby="btnNavbarSearch"
          />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="navbarDropdown"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fas fa-user fa-fw"></i
          ></a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdown"
          >
            <li><a class="dropdown-item" href="#!"><?php echo $user . " - " . $rol[$idrol]?></a></li>
            <li><hr class="dropdown-divider" /></li>
            <li>  <form action="Controlador/cerrarsesion.php" method="post">


<input class="dropdown-item" type="submit" value="Cerrar Sesion">



</form></li>
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
              <a class="nav-link" href="index.html">
                <div class="m-1"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <a class="nav-link" href="index.html">
                <i class="material-icons" style="font-size: 20px"
                  >add_shopping_cart</i
                >
                Carrito
              </a>
              <a class="nav-link" href="/crudEmpleados.html">
                <i class="material-icons" style="font-size: 20px"
                  >add_shopping_cart</i
                >
                Gestion Empleados
              </a>

              <div
                class="collapse"
                id="collapsePages"
                aria-labelledby="headingTwo"
                data-bs-parent="#sidenavAccordion"
              >
                <nav
                  class="sb-sidenav-menu-nested nav accordion"
                  id="sidenavAccordionPages"
                >
                  <a
                    class="nav-link collapsed"
                    href="#"
                    data-bs-toggle="collapse"
                    data-bs-target="#pagesCollapseAuth"
                    aria-expanded="false"
                    aria-controls="pagesCollapseAuth"
                  >
                    Authentication
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </a>
                  <div
                    class="collapse"
                    id="pagesCollapseAuth"
                    aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages"
                  >
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="login.html">Login</a>
                      <a class="nav-link" href="register.html">Register</a>
                      <a class="nav-link" href="password.html"
                        >Forgot Password</a
                      >
                    </nav>
                  </div>
                  <a
                    class="nav-link collapsed"
                    href="#"
                    data-bs-toggle="collapse"
                    data-bs-target="#pagesCollapseError"
                    aria-expanded="false"
                    aria-controls="pagesCollapseError"
                  >
                    Error
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </a>
                  <div
                    class="collapse"
                    id="pagesCollapseError"
                    aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordionPages"
                  >
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
          <div class="container-fluid px-4">
            <h1 class="mt-4">Informes y Estadisticas</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
              <div class="col-xl-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Consultar Cita
                  </div>
                  <!--aca voy a colocar para consultar las cita del cliente-->
                  <div class="card-body">
                    <div class="input-group mb-3">
                      <input
                      id="cedulaCliente"
                      name="cedulaCliente"
                        type="text"
                        class="form-control"
                        placeholder="Cedula"
                        aria-label="Username"
                      />
                      <span class="input-group-text">@</span>
                      <input
                      id="fechaCita"

                      name="fechaCita"
                        type="date"
                        class="form-control"
                        placeholder="Fecha"
                        aria-label="Server"
                      />
                    </div>
                    <div class="botonConsulta">
                    <button id="btnConsulta"  type="submit" class="btn btn-primary btnConsulta">Consultar</button>
                    <button onclick="func_pagar()" style="  margin-left: 15px;" id="btnPagar"  type="submit" class="btn btn-primary btnConsulta">Pagar</button>

                    </div>
                    <div style="  margin-top: 25px;" id="id_mostrar_info" class="mostrar_info"></div>
                    
                  </div>
                 

                  <!--aca voy a poner la tabla como para probar una mejor manera-->

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre Cliente</th>
                        <th>Nombre Mascota</th>
                        <th>Fecha</th>
                        <th>Hora</th>



                      </tr>
                    </thead>
                    <tbody id="tablaDatosUsuario">

                    </tbody>
                   </table>


                    <!---------------------------------------------------------------------------->
<?php if( !empty($_SESSION['nombreCliente'])){?>
  <div class="datosUsuario">
<label style="  font-weight: bold;"  for="">Nombre Cliente:</label>
<label style="  margin-right: 15px;" for=""><?php echo $_SESSION['nombreCliente']; ?></label>
<label style="  font-weight: bold;" for="">fecha:</label>
<label for=""><?php echo $_SESSION['fechaCita']; ?></label>
</div>
<div class="datosUsuario">
<label style="  font-weight: bold;"  for="">Nombre Mascota:</label>
<label style="  margin-right: 15px;" for=""><?php echo $_SESSION['nombreMascota']; ?></label>
<label style="  font-weight: bold;" for="">Hora:</label>
<label for=""><?php echo $_SESSION['horaCita']; ?></label>
<input id="idCita" hidden type="text" value="<?php echo $_SESSION['idCita']; ?>">

</div>

<script>

let id = document.getElementById("idCita").value;

  var parametros = {
    idCita: id,
  };


 $.ajax({
    data: parametros,
    url: "codigoLlenarTablaCita.php",
    type: "POST",
  
  }).done(function(res){
    var datos = JSON.parse(res);
   console.log(datos[0]);
    alert(datos[0].total);

    //aca voy hacer para mandar los datos al localStore
    let local = window.localStorage;


    datos.forEach((dato)=>{
      let datosObjet={
      id:dato.id,
       venta:dato.nombreServicio,
       categoria:dato.Servicio,
     precio:dato.precioServicio,
    cantidad:dato.cantidad,
     total:dato.total
      };



      local.setItem(
            Math.round(Math.random() * 1000) + 1,
            JSON.stringify(datosObjet)
          );

    });



   

  });



</script>

  <?php
   } 
   unset($_SESSION['nombreCliente']);
   unset($_SESSION['nombreMascota']);
   unset($_SESSION['fechaCita']);
   unset($_SESSION['horaCita']);
   unset($_SESSION['idCita']);

   
   
   ?>
                  <!---------------------------------------------------------------------------->
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Factura
                  </div>
                  <!--aca va ir la tabla con los datos afacturar-->
                  <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Venta</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>



                      </tr>
                    </thead>
                    <tbody id="id_llenarTabla">

                    </tbody>
                   </table>
                  </div>
                  <!------------------------------------------------------>

                </div>
              </div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabla de Productos
              </div>
              <!-- aca voy a colocar la tabla con los productos para vender-->
              <div class="card-body">
                <table class="miTabla" id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    
                    while($productos = mysqli_fetch_array($consultaProductos)) { ?>
                     <tr id="bb">
                      <td><?php echo $productos[0]; ?></td>
                      <td><?php echo $productos[1]; ?></td>
                      <td><?php echo $productos[2]; ?></td>

                      <td><?php echo $productos[3]; ?></td>
                      <td><?php echo $productos[4]; ?></td>
  
  
                     </tr>   
                     
  
                     <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
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

    <!--aca voy hacer las pruebas para mirar si da mejor con la tabla-->

    <script>
      //aca borro por si al cargar la pagian tiene datos
      let borrar =  window.localStorage;
      borrar.clear();
//------------------------------------------------------

   let btnConsulta = document.getElementById("btnConsulta");
let tablaDatosUsuario=document.getElementById("tablaDatosUsuario");
    btnConsulta.addEventListener("click", () => {
      //aca borro por si ya tiene datos
      tablaDatosUsuario.innerHTML="";
      let cedula = document.getElementById("cedulaCliente").value;
      let fecha = document.getElementById("fechaCita").value;


   var parametros = {
    cedulaCliente: cedula,
    fechaCita:fecha
    };

      $.ajax({
    data: parametros,
    url: "CodigoindexConsultaSitas.php",
    type: "POST",
  
  }).done(function(res){
    var datos = JSON.parse(res);
  

   datos.forEach((dato)=>{

    let descrip = `<tr onclick="func_SelecionarServicios('${dato.id}')">
                <td>${dato.id}</td>
                <td>${dato.nombreCliente}</td>
                <td>${dato.nombreMascota}</td>
                <td>${dato.fechaCita}</td>
                <td>${dato.horaCita}</td>
              </tr>`;
    
    
              tablaDatosUsuario.innerHTML+=descrip;
   });



   

  });



    });


    const func_SelecionarServicios=(id)=>{

      let local = window.localStorage;

      let id_llenarTabla=document.getElementById("id_llenarTabla");
      id_llenarTabla.innerHTML="";

      var parametros = {
    idCita: id,
  };

  //antes de mandar los servicios al localStore voy a eliminar los que ya estan por si ya tienen

  let llaves = Object.keys(local);

  llaves.forEach((llave) => {
  let datos = JSON.parse(local.getItem(llave));

  if (datos.categoria == "Servicio") {
    local.removeItem(llave);
  }
});

 $.ajax({
    data: parametros,
    url: "codigoLlenarTablaCita.php",
    type: "POST",
  
  }).done(function(res){
    var datos = JSON.parse(res);
   console.log(datos[0]);






   //aca voy hacer para mandar los datos al localStore


    datos.forEach((dato)=>{

   //aca de una vez lo coloco en la tabla de los productos

    let descrip = `<tr>
                <td>${dato.id}</td>
                <td>${dato.nombreServicio}</td>
                <td>${dato.Servicio}</td>
                <td>${dato.precioServicio}</td>
                <td>${dato.cantidad}</td>
                <td>${dato.total}</td>

              </tr>`;

              id_llenarTabla.innerHTML+=descrip;


      let datosObjet={
      id:dato.id,
       venta:dato.nombreServicio,
       categoria:dato.Servicio,
     precio:dato.precioServicio,
    cantidad:dato.cantidad,
     total:dato.total
      };



      local.setItem(
            Math.round(Math.random() * 1000) + 1,
            JSON.stringify(datosObjet)
          );

    });

//-------------------------------------------------------------

   

  });

//aca voy a ver si tiene datos el localStore y comienzo a llenar la tabla si tiene productos
let local2 = window.localStorage;
id_llenarTabla.innerHTML = "";

        let llavesNuevas = Object.keys(local2);

        llavesNuevas.forEach((key) => {
          let todosLosDatos = JSON.parse(local2.getItem(key));
          
            let descrip = `<tr>
          <td>${todosLosDatos.id}</td>
          <td>${todosLosDatos.venta}</td>
          <td>${todosLosDatos.categoria}</td>
          <td>${todosLosDatos.precio}</td>
          <td>${todosLosDatos.cantidad}</td>
          <td>${todosLosDatos.total}</td>

        </tr>`;

          id_llenarTabla.innerHTML += descrip;
          
         
        });

        //---------------------------------------------------------------------------------------------



    }



//aca voy hacer la funcion que se va ejecutar cuando le de click en el boton pagar




const func_pagar = () => {
  let localStorePagar = window.localStorage;

  if (localStorePagar.length > 0) {
  } else {
    Swal.fire({
      title: "No tiene Productos Selecionados!",
      text: "Seleciona un producto para poder pagar",
      icon: "info",
    });
  }
};






    </script>
        <!--------------------------------------------------------------------->

    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./js/mandarLocalStore.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/datatables-simple-demo.js"></script>


    
  </body>
</html>
