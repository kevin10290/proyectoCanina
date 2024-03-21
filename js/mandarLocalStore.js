//-------------------------------------------------------------------------------------
// Obtener la referencia de la tabla productos
//para cuando le de click donde esta la tabla del inventario se mande para la tabla y al localStore
var tabla = document.getElementById("datatablesSimple");
var datosFilas = [];
let datosObjeto;
//aca declaro la variable con localStorage
let localStore = window.localStorage;

tabla.addEventListener("click", () => {
  // Event listener para cada fila
  let tr = document.querySelectorAll("tr");
  tr.forEach((fila) => {
    fila.addEventListener("click", () => {
      //aca voy a crear las variables del boolean y de la llave que se va sobreEscribir
      let siExisteONo = false;
      let llaveUpdate;

      event.stopPropagation(); // Detener la propagación del evento

      // Obtener los datos específicos de la fila
      let datosFila = [];
      fila.querySelectorAll("td").forEach((celda) => {
        datosFila.push(celda.textContent);
      });
      // Agregar los datos de la fila al array datosFilas
      datosFilas.push(datosFila);
      console.log("Datos de la fila:", datosFila);

      datosObjeto = {
        id: datosFila[0],
        venta: datosFila[1],
        categoria: datosFila[2],
        precio: datosFila[3],
        cantidad: 1,
        total: datosFila[3],
      };

      let llaves = Object.keys(localStore);

      llaves.forEach((llave) => {
        let datosProductos = JSON.parse(localStore.getItem(llave));

        if (
          datosObjeto.venta == datosProductos.venta &&
          datosObjeto.categoria == datosProductos.categoria
        ) {
          siExisteONo = true;
          llaveUpdate = llave;
          datosObjeto.cantidad = datosProductos.cantidad + 1;
          datosObjeto.total = datosProductos.precio * datosObjeto.cantidad;
        }
      });

      console.log(siExisteONo);
      console.log(datosFila[4]);
      if (datosObjeto.cantidad <= parseInt(datosFila[4])) {
        if (siExisteONo) {
          console.log(datosObjeto.cantidad);
          console.log(datosObjeto.total);

          localStore.setItem(llaveUpdate, JSON.stringify(datosObjeto));
        } else {
          localStore.setItem(
            Math.round(Math.random() * 1000) + 1,
            JSON.stringify(datosObjeto)
          );
        }

        //aca voy a leer el localStore para agregar A la tabla de facturacion
        let local = window.localStorage;
        let llavesNuevas = Object.keys(local);
        let id_llenarTabla = document.getElementById("id_llenarTabla");
        id_llenarTabla.innerHTML = "";

        llavesNuevas.forEach((key) => {
          let todosLosDatos = JSON.parse(local.getItem(key));
          console.log(todosLosDatos);
          let descrip = `<tr>
          <td>${todosLosDatos.id}</td>
          <td>${todosLosDatos.venta}</td>
          <td>${todosLosDatos.categoria}</td>
          <td>${todosLosDatos.precio}</td>
          <td>${todosLosDatos.cantidad}</td>
          <td>${todosLosDatos.total}</td>
          <td><img onclick="func_eliminar('${key}','${todosLosDatos.categoria}')" src="./images/garbage_3587571.png" alt="iconoBorrar" srcset="./images/garbage_3587571.png">
          </td>
        </tr>`;

          id_llenarTabla.innerHTML += descrip;
        });

        //---------------------------------------------------------------------------------------------
      } else {
        Swal.fire("No hay mas productos en el inventario!");
      }
    });
  });
  console.log(localStore);
});

//aca voy hacer la funcion que se va ejecutar cuando le de click en el boton pagar
let btnPagarFactura = document.getElementById("btnPagarFactura");
let cedulaClientePagar = document.getElementById("cedulaClientePagar");
let valorTotalProdcto = document.getElementById("valorTotalProdcto");
let valorTotalServicio = document.getElementById("valorTotalServicio");
let SelectorModoPago = document.getElementById("SelectorModoPago");
btnPagarFactura.addEventListener("click", () => {
  // Obtener el año actual
  //aca voy hacer una variable booleana
  let hayServicios = false;
  let fechaActual = new Date();
  fechaActual = `${fechaActual.getFullYear()}-${
    fechaActual.getMonth() + 1
  }-${fechaActual.getDate()}`;
  //------------------------------

  if (SelectorModoPago.value != "Selecione modo de Pago") {
    if (cedulaClientePagar.value.length > 0) {
      //voy a meter los datos de LocalStore a un arreglo
      let arregloPodructos = Array();
      let idServicio = null;

      let localStoreGuardar = window.localStorage;
      let llaveguardar = Object.keys(localStoreGuardar);

      //aca meto los datos del localStore al arreglo
      llaveguardar.forEach((llave) => {
        let datosLocalStore = JSON.parse(localStoreGuardar.getItem(llave));

        if (datosLocalStore.categoria != "Servicio") {
          for (let i = 0; i < datosLocalStore.cantidad; i++) {
            arregloPodructos.push(datosLocalStore.id);
          }
        } else {
          idServicio = datosLocalStore.id;
        }
      });
      //----------------------------------------
      console.log("aca voy a mirar " + hayServicios);
      console.log(idServicio);
      let parametros;

      // aca ya creo el objeto para mandarlo
      parametros = {
        totalPagoProductos: valorTotalProdcto.value,
        totalPagoServicio: valorTotalServicio.value,
        cedulaCliente: cedulaClientePagar.value,
        SelectorModoPago: SelectorModoPago.value,
        fechaVenta: fechaActual,
        arregloPodructos: arregloPodructos,
        idServicio: idServicio,
      };
      console.log(parametros);

      //----------------------------------------------------
      //aca voy a mandar los datos a PHP por medio del Ajax
      $.ajax({
        data: parametros,
        url: "codigoInsertarDatosFactura.php",
        type: "POST",
      }).done(function (res) {
        //aca voy hacer las desiciones para saber que codigo resivio y dependiendo del codigo que devolvio se desplegara
        //el mensaje
        if (res == 200) {
          Swal.fire({
            title: "Pago Exitoso",
            text: "¿Deseas Imprimir la Factura?",
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Emprimir!",
          }).then((result) => {
            if (result.isConfirmed) {
              //aca voy hacer el codigo para que Emprima la Factura
              window.location.href = "codigoGenerarPdfFactura.php";
            }
          });
        } else if (res == 404) {
          Swal.fire({
            title: "No se encontró ningún cliente con esa cédula.",
            text: "Verifique bien la Cedula!",
            icon: "warning",
          });
        } else if (res == 505) {
          Swal.fire({
            title: "Hubo un error por parte del Servidor!.",
            text: "Conctata el tecnico",
            icon: "error",
          });
        }
      });
      //--------------------------------------------------------
    } else {
      Swal.fire({
        title: "Ingrese la Cedula!",
        text: "Es nesesario ingresar la Cedula Del Cliente",
        icon: "info",
      });
    }
  } else {
    Swal.fire({
      title: "Selecione un modo de Pago!",
      text: "Seleciona para poder Ejecutar la Accion",
      icon: "info",
    });
  }
});
