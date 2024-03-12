<?php
session_start();

require_once "modelo/MYSQL.php";

$mysql= new MYSQL;

$cedulaCliente =$_POST['cedulaCliente'];
$fechaCita =$_POST['fechaCita'];


$mysql->conectar();
$consultarCita =  $mysql->efectuarConsulta("SELECT registrocliente.nombreCliente, resgistromascota.nombreMascota,cita.fechaCita,cita.horaCita,cita.idCita,cita.estadoServicio from bd_mascotas.cita INNER JOIN bd_mascotas.resgistromascota ON cita.resgistroMascota_idMascota= resgistromascota.idMascota INNER JOIN bd_mascotas.registrocliente ON cita.registroCliente_idClientes=registrocliente.idClientes WHERE registrocliente.cedulaCliente = '$cedulaCliente' and cita.fechaCita ='$fechaCita';");

 




/* $_SESSION['nombreCliente']=$arregloConsulta[0];
$_SESSION['nombreMascota']=$arregloConsulta[1];
$_SESSION['fechaCita']=$arregloConsulta[2];
$_SESSION['horaCita']=$arregloConsulta[3]; 
$_SESSION['idCita']=$arregloConsulta[4];  */



// Inicializar el arreglo para almacenar los resultados
$arreglo = array();
while($fila = mysqli_fetch_array($consultarCita)) {
    
    // Construir el arreglo de datos
    $datos = array(
        "id" => $fila['idCita'],
        "nombreCliente" => $fila['nombreCliente'],
        "nombreMascota" => $fila['nombreMascota'],
        "fechaCita" => $fila['fechaCita'],
        "horaCita" => $fila['horaCita'],
        "estadoServicio"=>$fila['estadoServicio']
    );

    // Agregar los datos al arreglo principal
    $arreglo[] = $datos;
}

// Devolver los datos como JSON
echo json_encode($arreglo);