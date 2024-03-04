<?php
//Comprobar datos



if (
    (isset($_POST['email']) && !empty($_POST['email'])) &&
    (isset($_POST['pass']) && !empty($_POST['pass']))
) {

    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables

  
    $user = $_POST['email'];
    $pass = hash('SHA256', $_POST['pass']);
    $rol = "";


    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();


    //Realizo la consulta con mis comandos

    require_once '../modelo/Usuarios.php';




    $usuarios = $mysql->efectuarConsulta("SELECT * FROM registrocliente WHERE emailCliente = '" . $user . "' and passCliente = '" . $pass . "' and estadoCliente = 1");
    $usuario = new Usuarios();
    $fila = mysqli_fetch_assoc($usuarios);

    if (mysqli_num_rows($usuarios) > 0) {
        echo "Cliente";

        session_start();





        $usuario->setUser($fila['emailCliente']);

        $usuario->setId($fila['idClientes']);

        $usuario->setRol($rol);

        $rol = "Cliente";
    }

    $mysql->desconectar();


    $mysql->conectar();

    $usuarios = $mysql->efectuarConsulta("SELECT * FROM empleado WHERE emailempleado = '" . $user . "' and passEmpleado = '" . $pass . "' and estadoEmpleado = 1");

    $fila = mysqli_fetch_assoc($usuarios);
    if (mysqli_num_rows($usuarios) > 0) {

 


        session_start();


        $usuario->setUser($fila['emailEmpleado']);

        $usuario->setId($fila['idEmpleado']);

        $usuario->setRol($fila['rolEmpleado']);

        $rol  = $fila['rolEmpleado'];
    } else {

        header("Location: ../login.php?Error=true&Mensaje=Verifique sus datos");
    }



    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();

    //Capturar los resultados de la consulta en una fila



    //validar si se encuentran resultados


    require_once '../modelo/Usuarios.php';


    $_SESSION['usuario'] = $usuario;
    $_SESSION['acceso'] = true;
    $_SESSION['rol'] = $rol;

    if ($rol == "Cliente") {

        header("Location: ../userindex.php");
    }
    if ($rol == "1"||$rol == "2" || $rol == "3") {

        header("Location: ../index.php");
    }
} else {
    header("Location: ../login.php?Error=true&Mensaje=No se ha encontrado  el usuario o contraseña");
}
