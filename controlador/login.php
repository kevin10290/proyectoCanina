<?php
require_once '../modelo/Mysql.php';


$mysql = new MySQL;

$email = $_POST['email'];
$pass = md5($_POST['pass']);

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){

    $mysql->conectar();



    $clientes = $mysql->efectuarConsulta("SELECT bd_mascotas.empleado.idEmpleado ,
    bd_mascotas.empleado.emailEmpleado, bd_mascotas.empleado.passEmpleado FROM  bd_mascotas.empleado where
    bd_mascotas.empleado.emailEmpleado = '" . $email . "' and  bd_mascotas.empleado.passEmpleado = '" . $pass . "' ");



    

        if (mysqli_num_rows($clientes)) {
            session_start();

            
            require_once '../modelo/usuarios.php';

            $usuarios = new usuarios();

            $usuarios->setId($fila['id']);

            $_SESSION['usuario'] = $usuarios;

            $_SESSION['acceso'] = true;

            //cambiar a respectiva direccion de cliente
            header("Location: ../gestionCliente.php");
        }  else {
           
            $mysql->desconectar();

            $mysql->conectar();

            $usuario = $mysql->efectuarConsulta("SELECT bd_mascotas.registrocliente.idClientes ,
            bd_mascotas.registrocliente.emailCliente,bd_mascotas.registrocliente.passCliente FROM  bd_mascotas.registrocliente WHERE
            bd_mascotas.registrocliente.emailCliente= '" . $email . "' and  bd_mascotas.registrocliente.passCliente = '" . $pass . "' ");

           $fila2 = mysqli_fetch_assoc($usuario);

           echo $fila2['email'];

           if (mysqli_num_rows($usuario)) {
            session_start();
            
            require_once '../modelo/usuarios.php';

            $usuarios = new usuarios();

            $usuarios->setId($fila2['id']);

            $_SESSION['usuario'] = $usuarios;

            $_SESSION['acceso'] = true;

            //cambiar a respectiva direccion para usuarios

            header("Location: ../ProductosMascotas.php");
           }
           else {

            header("Location: ../index.php");
        }
           

        }  
    }



else{
    header("Location: ../index.php");

}

?>