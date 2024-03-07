<?php

require_once 'modelo/Mysql.php';
$mysql = new MYSQL();
$mysql->conectar();

$cedula =$_POST['cedulaCliente'];
$arregloProducto =$_POST['arregloPodructos'];
$totalProducto  =$_POST['totalPagoProductos'];
$fechaVenta  =$_POST['fechaVenta'];
$SelectorModoPago  =$_POST['SelectorModoPago'];



$resultadoConsultaIDCliente = $mysql->efectuarConsulta("SELECT idClientes FROM registrocliente WHERE cedulaCliente ='$cedula'");
$mysql->desconectar();
// Verificar si la consulta devolvió algún resultado
if ($resultadoConsultaIDCliente && mysqli_num_rows($resultadoConsultaIDCliente) > 0) {
    // Extraer el resultado de la consulta
    $fila = mysqli_fetch_assoc($resultadoConsultaIDCliente);
    
    // Extraer el valor de la columna idClientes
    $idCliente = $fila['idClientes'];
    
    $mysql->conectar();
    //aca hago la consulta de insertar a la tabla factura
   $InsertarFactura = $mysql->efectuarConsulta("INSERT INTO facturaproducto (total,fechaVenta,idEmpleado,idCliente,modoPago) VALUES('$totalProducto','$fechaVenta',2,$idCliente,'$SelectorModoPago')");
   $mysql->desconectar();

   //este es el id de la factura que acabo de insertar
   $idGenerado = $InsertarFactura;

   $mysql->conectar();

   foreach ($arregloProducto as $idProducto) {

//aca estoy insertando los productos
    $InsertarDetalleprodcuto = $mysql->efectuarConsulta("INSERT INTO detalleprodcuto (inventarioProductos_idinventarioProducto,idfactura) VALUES($idProducto,$idGenerado)");
    $mysql->desconectar();

    //aca voy hacer la consulta donde va coger la cantidad que tiene en el Inventario y luego otra consulta donde
    //le actualiza con la nueva cantidad
    $mysql->conectar();
    
    $selecionarCantidadProdcutosInventario = $mysql->efectuarConsulta("SELECT strockProducto FROM inventarioproductos WHERE idinventarioProducto = $idProducto;");
    
    $cantidadProducto = mysqli_fetch_assoc($selecionarCantidadProdcutosInventario);
    $mysql->desconectar();

    //y aca hago ya la funcion para actualizar
    $mysql->conectar();
$nuevaCantidad = $cantidadProducto['strockProducto'] -1;
    
$ActualizarProducto = $mysql->efectuarConsulta("UPDATE inventarioproductos SET strockProducto = $nuevaCantidad  WHERE idinventarioProducto = $idProducto;");




}





echo "insertado";







} else {
    // Imprimir un mensaje de error si la consulta no devuelve resultados
    echo "No se encontró ningún cliente con esa cédula.";
}