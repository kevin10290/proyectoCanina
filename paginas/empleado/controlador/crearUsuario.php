<?php 
session_start();
$id = $_POST["txtId"];
$correo = $_POST["txtCorreo"];
$contraseña = $_POST["txtContraseña"];
$rol = $_POST["slEstado"];
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$cedula = $_POST["txtCedula"];
if(isset($id) && !empty($id) && 
    isset($correo) && !empty($correo) &&
    isset($contraseña) && !empty($contraseña) &&
    isset($nombre) && !empty($nombre) &&
    isset($cedula) && !empty($cedula)
) {
    require_once("../../../modelo/Mysql.php");

    $mysql = new MySql;
    $resultado = $mysql->ConsultaCompleja("SELECT emailEmpleado FROM Empleado WHERE emailEmpleado = '$correo'");
    if (!mysqli_num_rows($resultado) > 0)
    {
        if ($mysql->efectuarConsulta("INSERT INTO empleado VALUES (". $id .", '". $nombre ."', '". $apellido ."', '". $cedula ."','".$correo."','".$contraseña."',".$rol."  )"))
        {
            header("Location: ../indexListar.php");
        } else {
            echo "Error al agregar el usuario.";
        }
    } else {
        echo "Error: El correo electrónico seleccionado ya existe, por favor devuelvete";
    }
}

?>