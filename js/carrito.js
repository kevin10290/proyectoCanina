let carrito = document.getElementById("carrito");
let objetos = [];
let carritocantidad = document.getElementById("carritocantidad");
let total = 0;
let irdetalle = document.getElementById("detallescompra");
let txtTotal = document.getElementById("total");
let txtIVA = document.getElementById("IVA");
let listaproducto = document.getElementById("categorias").value;
txtTotal.innerText = 0;
txtIVA.innerText = 0;

let arreglolista = [];
arreglolista = listaproducto.substring(1).split(",");

//Borra individualmente el producto que se está mostrado y modifica las unidades disponibles y los precios con IVA
function borrardecarrito(id) {
  productosCarrito.forEach((element) => {



    if ("elemento" + element.idE == "elemento" + id) {
      iduscar = element.idP;

if(document.location.href.includes("userbuy.php") == false){
      let productos = parseInt(document.getElementById("unidad" + iduscar).innerHTML);
      productos += 1;
  
      document.getElementById("unidad" + iduscar).innerHTML = productos;
    }
      productosCarrito = productosCarrito.filter(
        (element) => element.idE != id
      );
      MostrarCarrito(productosCarrito);
    }
  });


  document.getElementById("arregloproductos").value =
    JSON.stringify(productosCarrito);
}

let productosCarrito = [];
//Agrega individualmente el producto que se está mostrado y modifica las unidades disponibles y los precios con IVA
function agregarcarrito(id, nombre, url, categoria, precio) {
  let productos = parseInt(document.getElementById("unidad" + id).innerHTML);

  if (productos >= 1) {
    productosCarrito[productosCarrito.length] = {
      idP: id,
      nombreP: nombre.replace("_", " "),
      urlP: url,
      categoriaP: categoria,
      precioP: parseInt(precio),
      idE: productosCarrito.length,
    };

    MostrarCarrito(productosCarrito);
    document.getElementById("arregloproductos").value =
      JSON.stringify(productosCarrito);
    productos -= 1;
    document.getElementById("unidad" + id).innerHTML = productos;
  }
}

//Verifica si se encuentra en la pagina de confirmación para el producto que se está mostrado y modifica las unidades disponibles y los precios con IVA
if (document.location.href.includes("userbuy.php") == true) {
  let arreglo = document.getElementById("arregloproductos").value;
  let arregloremplazo = arreglo.replace(/~/g, '"');
  productosCarrito = JSON.parse(arregloremplazo);

  MostrarCarrito(productosCarrito);
}
//Hace lectura del arreglo 'productosCarrito' para mostrarlos agrupados por productos y mostrando sus cantidades
function MostrarCarrito(productosCarrito) {
  var output = Object.values(
    productosCarrito.reduce((obj, { nombreP }) => {
      if (obj[nombreP] === undefined)
        obj[nombreP] = {
          nombreP: nombreP,
          occurrences: 1,
        };
      else obj[nombreP].occurrences++;
      return obj;
    }, {})
  );

  let primer = [];

  for (let limite = 0; limite < arreglolista.length; limite++) {
    primer[limite] = 1;
  }

  if (productosCarrito.length >= 1) {
    irdetalle.disabled = false;
  }
  if (productosCarrito.length == 0) {
    irdetalle.disabled = true;
  }

  carrito.innerHTML = "";
  let valor = 0;
  let index = 0;
  productosCarrito.forEach((element) => {
    let name = element.nombreP + "";
    valor += element.precioP;

    var output = Object.values(
      productosCarrito.reduce((obj, { nombreP }) => {
        if (obj[nombreP] === undefined)
          obj[nombreP] = {
            nombreP: nombreP,
            occurrences: 1,
          };
        else obj[nombreP].occurrences++;
        return obj;
      }, {})
    );

    let unidades = 0;

    if (
      element.nombreP.replace("_", " ") == arreglolista[element.idP - 1] &&
      primer[element.idP - 1] == 1
    ) {
      output.forEach((value) => {
        if (value.nombreP == element.nombreP) {
          unidades = value.occurrences;
        }
      });
      primer[element.idP - 1] = 0;
      carrito.innerHTML += `
    <div class="row" id ="elemento${element.idE}" value="${element.precioP}">
             <div class="">
           
               <div class="bg-image hover-overlay hover-zoom ripple rounded rounded-4" data-mdb-ripple-color="light">
                 <img width="100" src="${"../../"+element.urlP}"
                   class="img-thumbnail  rounded-5"   />
                 <a href="#!">
                   <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                 </a>
               </div>
         
             </div>
   
             <input type="hidden" id="valor${element.idP}" value="${
        element.precioP
      }">
   
             <div class=" mb-4 mb-lg-0">
             
               <p><strong>${element.nombreP.replace("_", " ")} - ${
        element.categoriaP
      }</strong></p>
               <h5>  ${element.precioP}</h5>
        
   
               <button onclick="borrardecarrito(${
                 element.idE
               })" id="childeliminar"  type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                     title="Remove item">
                     <i class="fas fa-trash"></i>
                   </button>
               <span class="badge text-bg-secondary"> ${unidades} </span> 
             </div>
         
   
          
           </div>
    `;
    }
    index += 1;
//Consulta si se encuentra en la página de confirmación de compra para realizar acciones diferentes

    if (document.location.href.includes("userbuy.php") == true) {
let elemntosventa =[];
for (let i = 0; i <productosCarrito.length; i++) {

  elemntosventa[i]= productosCarrito[i].idP
}

    document.getElementById("arregloproductof").value =elemntosventa.toString();
    document.getElementById("IVA2").value = valor
    }
  });

  txtTotal.innerText = valor;
  txtIVA.innerText = valor + valor * 0.19;
}
