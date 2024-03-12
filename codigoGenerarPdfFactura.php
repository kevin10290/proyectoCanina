<?php
ob_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">


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
                    <tbody id="facturacion">

                    </tbody>
                   </table>
                  </div>




        </div>
    </div>
</div>




<script>

let facturacion = document.getElementById("facturacion");

let localStore = window.localStorage;
let llaves = Object.keys(localStore);
llaves.forEach((llave) => {
        let datosProductos = JSON.parse(localStore.getItem(llave));

let descrip=`<tr>  <td>${datosProductos.id}  </td>  <td>${datosProductos.venta}  </td> <td>${datosProductos.categoria}  </td> <td>${datosProductos.precio}  </td> <td>${datosProductos.cantidad}  </td> <td>${datosProductos.total}  </td></tr>`;


facturacion.innerHTML+=descrip;


})

    
</script>



    </body>
    </html>

<?php
$html = ob_get_clean();

require_once 'isset/libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Configurar opciones
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf->setOptions($options);

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño del papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF
$dompdf->render();

// (Opcional) Enviar el PDF al navegador
$dompdf->stream('documento.pdf', array('Attachment' => 0));
?>