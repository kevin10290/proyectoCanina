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
