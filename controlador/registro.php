<?php




$cedula = $_POST['cedula'];
$telefono = $_POST['tel'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])
&& isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['cedula']) && !empty($_POST['cedula'])
&& isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['apellido']) && !empty($_POST['apellido']) ){


    require_once '../modelo/MySQL.php';

    $mysql = new MySQL;
    $mysql->conectar();
    
    $consulta1 = $mysql->efectuarConsulta("SELECT bd_mascotas.registrocliente.idClientes,
    bd_mascotas.registrocliente.emailCliente,
    bd_mascotas.registrocliente.passCliente,
    bd_mascotas.registrocliente.nombreCliente
    FROM bd_mascotas.registrocliente WHERE bd_mascotas.registrocliente.emailCliente = '".$email."'  ");
    
    $rows = mysqli_num_rows($consulta1);
    echo $rows;
    if($rows>0){
        $mysql->desconectar();
      
        header("Location: ../register.php");
        // sweetalert este correo ya existe
        
    
    }
    else if($rows==0){
    
        $mysql->desconectar();
        $mysql->conectar();
    
    
        $consulta = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.registrocliente values (null,'".$nombre."','".$apellido."',
        '".$telefono."','".$email."','".$cedula."','".$pass."',2)");
    
    
        $mysql->desconectar();
    
    
        header("Location: ../login.php");
    
    }
}
else{
    header("Location: ../register.php");
    // sweetalert campos incompletos

}

?>