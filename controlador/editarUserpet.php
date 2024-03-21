<?php


$idMascota = $_POST['idMascota'];
$idCita = $_POST['idCita'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$nombreMascota = $_POST['nombreMascota'];
$edadMascota = $_POST['edadMascota'];
$razaMascota = $_POST['razaMascota'];
$tipoMascota = $_POST['tipoMascota'];

echo $idCita, $fecha, $hora, $nombreMascota, $edadMascota,$razaMascota,$tipoMascota;

if(isset($_POST['idCita']) && !empty($_POST['idCita']) && isset($_POST['fecha']) && !empty($_POST['fecha'])
&& isset($_POST['hora']) && !empty($_POST['hora']) && isset($_POST['nombreMascota']) && !empty($_POST['nombreMascota'])
&& isset($_POST['edadMascota']) && !empty($_POST['edadMascota']) && isset($_POST['razaMascota']) && !empty($_POST['razaMascota']) &&
isset($_POST['tipoMascota']) && !empty($_POST['tipoMascota']) ){


    require_once '../modelo/MySQL.php';

    $mysql = new MySQL;
    $mysql->conectar();
    
    //edita la cita

    $consulta1 = $mysql->efectuarConsulta("UPDATE bd_mascotas.cita SET bd_mascotas.cita.fechaCita = '".$fecha."',
    bd_mascotas.cita.horaCita = '".$hora."' WHERE idCita = ".$idCita."");

    //edita los datos de la mascota

    $consulta2 = $mysql->efectuarConsulta("UPDATE bd_mascotas.resgistromascota SET bd_mascotas.resgistromascota.nombreMascota= '".$nombreMascota."',
    bd_mascotas.resgistromascota.edadMascota= '".$edadMascota."', bd_mascotas.resgistromascota.razaMascota='".$razaMascota."',
    bd_mascotas.resgistromascota.tipoMascota='".$tipoMascota."' WHERE idMascota = ".$idMascota."");

    
    
   header("Location: ../userpet.php?editado=true&Mensaje=Cita Editada Exitosamente!!");
   
}
else{
    header("Location: ../editUserpet.php");
}

?>