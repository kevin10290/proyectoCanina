<?php





$fecha= $_POST['fecha'];
$hora = $_POST['hora'];
$nombre = $_POST['nomMascota'];
$edad = $_POST['edadMascota'];
$raza = $_POST['razaMascota'];
$tipo = $_POST['tipoMascota'];

$horafin = new DateTime($hora);
$horafin->modify("+30 minutes");
$horaFinal = $horafin->format("H:i:s");

$horaInicio = new DateTime($hora);
$horaInicial = $horaInicio->format("H:i:s");





if(isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['hora']) && !empty($_POST['hora'])
&& isset($_POST['nomMascota']) && !empty($_POST['nomMascota']) && isset($_POST['edadMascota']) && !empty($_POST['edadMascota'])
&& isset($_POST['razaMascota']) && !empty($_POST['razaMascota']) && isset($_POST['tipoMascota']) && !empty($_POST['tipoMascota']) ){


    require_once '../modelo/MySQL.php';
    require_once '../modelo/usuarios.php';


    $usuarios = new usuarios();

    $mysql = new MySQL;
    session_start();
    $usuarios = new usuarios();
    $usuarios= $_SESSION['usuario'];
    $id = $usuarios->getId();
    echo $id;

    $mysql->conectar();

    $consulta = $mysql->efectuarConsulta("select * from bd_mascotas.cita 
    where bd_mascotas.cita.horaCita BETWEEN '".$horaInicial."' and '".$horaFinal."' and bd_mascotas.cita.fechaCita = '".$fecha."';");

    $mysql->desconectar();

    

    $num = mysqli_num_rows($consulta);
    echo $num;

 
   

        if($num>0){

        //poner alerta de que ya hay cita agendada

        }
        else{

        $mysql->conectar();
        $queryPet = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.resgistromascota VALUES (null, '".$nombre."','".$edad."',
        '".$raza."','".$tipo."','".$id."')");
         
        $queryIdMascota = $mysql->efectuarConsulta("SELECT bd_mascotas.resgistromascota.idMascota FROM bd_mascotas.resgistromascota
        where bd_mascotas.resgistromascota.idCliente = '".$id."'");
         
        $array = mysqli_fetch_assoc($queryIdMascota);

        $idMascota = $array['idMascota'];
        echo $idMascota;

        
 

   
        $consulta3 = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.cita VALUES (null,'".$idMascota."','".$id."','".$fecha."', 
        '".$horaInicial."')");
        
        //alerta de cita exitosa
        $_SESSION['inserto']="inserto";

        echo $_SESSION['inserto'];
        header("Location: ../userpet.php");
        

        }
   
  
    
 
}
else{
    $_SESSION['datosIncompletos']=true;
    header("Location: ../userpet.php");
    // sweetalert campos incompletos

}

?>