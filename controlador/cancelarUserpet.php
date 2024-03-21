<?php


$idCita = $_GET['idCita'];



if(isset($_GET['idCita']) && !empty($_GET['idCita'])){


    require_once '../modelo/MySQL.php';

    $mysql = new MySQL;
    $mysql->conectar();
    
    //eliminar cita

    $consulta1 = $mysql->efectuarConsulta("DELETE FROM bd_mascotas.cita WHERE idCita = ".$idCita."");
   
    
   header("Location: ../paginas/clientes/userpet.php?eliminado=true&Mensaje=Cita Cancelada Correctamente");
   
}
else{
    header("Location: ../paginas/clientes/userpet.php");
}

?>