<?php
require_once '../modelo/Mysql.php';


$mysql = new MySQL;

$email = $_POST['email'];
$pass = md5($_POST['pass']);

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){

    $mysql->conectar();



    $clientes = $mysql->efectuarConsulta("SELECT mascotas.empleado.id ,
    mascotas.empleado.email, mascotas.empleado.pass FROM  mascotas.empleado where
    mascotas.empleado.email= '" . $email . "' and  mascotas.empleado.pass = '" . $pass . "' ");



    //se cuentan las filas de la consulta , por cada usuario que coincida es  una fila
    // si la consulta arroja 1 y es mayor a cero existe el usuario sino no
    

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

            $usuario = $mysql->efectuarConsulta("SELECT mascotas.usuario.id ,
            mascotas.usuario.email, mascotas.usuario.pass FROM  mascotas.usuario where
            mascotas.usuario.email= '" . $email . "' and  mascotas.usuario.pass = '" . $pass . "' ");

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