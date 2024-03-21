<?php 
$servidor ="localhost";
$bd= "bd_mascotas";
$usuario="root";
$contrasena = "";


try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$contrasena);
}catch(Exception $ex){
    echo $ex->getMessage();
}
?>