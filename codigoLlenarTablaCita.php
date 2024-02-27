<?php

// Obtener el id de la cita desde la solicitud POST
$id = $_POST['idCita'];

// Incluir el archivo de conexión a la base de datos
require_once "MYSQL.php";
$mysql = new MYSQL;
$mysql->conectar();

// Realizar la consulta para obtener los detalles del servicio
$consultaDetalleServicio = $mysql->efectuarConsulta("SELECT detalleservicio.cita_idCita, servicio.nombreServicio, servicio.precioServicio, COUNT(*) AS cantidad FROM bd_mascotas.detalleservicio INNER JOIN bd_mascotas.servicio ON detalleservicio.servicio_idservicio = servicio.idservicio WHERE detalleservicio.cita_idCita = '".$id."' GROUP BY detalleservicio.cita_idCita, servicio.nombreServicio, servicio.precioServicio;");

// Inicializar el arreglo para almacenar los resultados
$arreglo = array();
while($fila = mysqli_fetch_array($consultaDetalleServicio)) {
    // Calcular el total
    $total = $fila['precioServicio'] * $fila['cantidad'];

    // Construir el arreglo de datos
    $datos = array(
        "id" => $fila['cita_idCita'],
        "nombreServicio" => $fila['nombreServicio'],
        "Servicio" => 'Servicio',
        "precioServicio" => $fila['precioServicio'],
        "cantidad" => $fila['cantidad'],
        "total" => $total
    );

    // Agregar los datos al arreglo principal
    $arreglo[] = $datos;
}

// Devolver los datos como JSON
echo json_encode($arreglo);
?>