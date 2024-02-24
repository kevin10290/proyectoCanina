let carrito = document.getElementById("carrito")
let objetos =[]
let carritocantidad = document.getElementById("carritocantidad")
let total = 0


let txtTotal = document.getElementById("total")
let txtIVA = document.getElementById("IVA")
function borrardecarrito(id) {
carritocantidad.innerHTML = carrito.children.length-1

    let elemento = document.getElementById("elemento"+id)
elemento.remove()
objetos =[]
for (let i = 0; i < carrito.children.length; i++) {
    
    objetos[i] =    carrito.children.item(i).id.replace("elemento","") 
 
}
console.log(objetos)


let total = 0
for (let i = 0; i < carrito.children.length; i++) {

    let valor = 0
    valor = document.getElementById("valor"+  carrito.children.item(i).id.replace("elemento","") ).value
    total += parseInt(valor)
}
txtIVA.innerHTML = total+ (total*0.19)
txtTotal.innerHTML = total;
}

function agregarcarrito(id, nombre ,url,categoria,precio) {
    carritocantidad.innerHTML = carrito.children.length+1

let name = nombre + "";

    carrito.innerHTML += `
    <div class="row" id ="elemento${id}" value="${precio}">
             <div class="">
          
               <div class="bg-image hover-overlay hover-zoom ripple rounded rounded-4" data-mdb-ripple-color="light">
                 <img width="100" src="${url}"
                   class="img-thumbnail   />
                 <a href="#!">
                   <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                 </a>
               </div>
         
             </div>
   
             <input type="hidden" id="valor${id}" value="${precio}">
   
             <div class=" mb-4 mb-lg-0">
             
               <p><strong>${name.replace("_"," ")} - ${categoria}</strong></p>
               <h5>  ${precio}</h5>
        
   
               <button onclick="borrardecarrito(${id})"  type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                     title="Remove item">
                     <i class="fas fa-trash"></i>
                   </button>
            
             </div>
   
          
           </div>
    `
    let total = 0
    for (let i = 0; i < carrito.children.length; i++) {
        objetos[i] =    carrito.children.item(i).id.replace("elemento","") 
      
        let valor = 0
        valor = document.getElementById("valor"+  carrito.children.item(i).id.replace("elemento","") ).value
        total += parseInt(valor)
        
    }
    txtTotal.innerHTML = total;
    txtIVA.innerHTML = total+ (total*0.19)
    console.log(objetos)
}