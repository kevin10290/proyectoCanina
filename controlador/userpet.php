<?php





$fecha= $_POST['fecha'];
$hora = $_POST['hora'];
$nombre = $_POST['nomMascota'];
$edad = $_POST['edadMascota'];
$raza = $_POST['razaMascota'];
$tipo = $_POST['tipoMascota'];

//genero un tiempo de cita

$horafin = new DateTime($hora);
$horafin->modify("+60 minutes");
$horaFinal = $horafin->format("H:i:s");

$horaInicio = new DateTime($hora);
$horaInicial = $horaInicio->format("H:i:s");



echo $horaFinal;

if(isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['hora']) && !empty($_POST['hora'])
&& isset($_POST['nomMascota']) && !empty($_POST['nomMascota']) && isset($_POST['edadMascota']) && !empty($_POST['edadMascota'])
&& isset($_POST['razaMascota']) && !empty($_POST['razaMascota']) && isset($_POST['tipoMascota']) && !empty($_POST['tipoMascota']) ){


    require_once '../modelo/MySQL.php';
    require_once '../modelo/usuarios.php';
//obtengo con la clase usuarios el id del usuario
    $usuarios = new usuarios();

    $mysql = new MySQL;
    session_start();
    $usuarios = new usuarios();
    $usuarios= $_SESSION['usuario'];
    $id = $usuarios->getId();
    echo $id;

    $mysql->conectar();
 //consulta para saber si la fecha de la cita esta disponible, sino lo reenvia a pagina de inicio con alerta

    $consulta = $mysql->efectuarConsulta("SELECT * FROM  bd_mascotas.cita WHERE
     bd_mascotas.cita.horaCita BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
     bd_mascotas.cita.fechaCita LIKE '".$fecha."' OR 
     bd_mascotas.cita.horaFin BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
     bd_mascotas.cita.fechaCita LIKE '".$fecha."';");

    

    

    $num = mysqli_num_rows($consulta);

    $mysql->conectar();
 
   

        if($num>0){

        //poner alerta de que ya hay cita agendada

        header("Location: ../userpet.php?Error=true&Mensaje=Ya existe una cita agendada a esa hora");

        }
        else{

        $mysql->conectar();
      
        //mostrar si la mascota ya existe con su identificacion 

        $queryExistPet = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota
        where bd_mascotas.resgistromascota.idCliente = '".$id."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombre."' and
        bd_mascotas.resgistromascota.edadMascota = '".$edad."' and bd_mascotas.resgistromascota.razaMascota = '".$raza."' and
        bd_mascotas.resgistromascota.tipoMascota = '".$tipo."'");
         
         //implemento una decision de existencia de mascota

         $numRowsExistPet = mysqli_num_rows($queryExistPet);

          if($numRowsExistPet>0){

// si existe se inserta en la cita 

$array = mysqli_fetch_assoc($queryExistPet);
  
$idMascota = $array['idMascota'];

//inserto los datos para agendar cita 

$consulta3 = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.cita VALUES (null,'".$idMascota."','".$id."','".$fecha."', 
'".$horaInicial."', 'pendiente', '".$horaFinal.")");

//lo envio a pagina userpet por agenda de cita existosa

header("Location: ../userpet.php?Exito=true&Mensaje=Cita Agendada Exitosamente");


          }
          else{

 //insertar mascota si no existe en la base de datos y se quiere generar una cita
 $queryPet = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.resgistromascota VALUES (null, '".$nombre."','".$edad."',
 '".$raza."','".$tipo."','".$id."')");

 //vuelvo a verificar en la base de datos la existencia  para obtener el id de la mascota

 $queryIdMascota = $mysql->efectuarConsulta("SELECT bd_mascotas.resgistromascota.idMascota FROM bd_mascotas.resgistromascota
 where bd_mascotas.resgistromascota.idCliente = '".$id."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombre."' and
 bd_mascotas.resgistromascota.edadMascota = '".$edad."' and bd_mascotas.resgistromascota.razaMascota = '".$raza."' and
 bd_mascotas.resgistromascota.tipoMascota = '".$tipo."'");

 $array = mysqli_fetch_assoc($queryIdMascota);
  
$idMascota = $array['idMascota'];

//inserto la data para agendar la cita 

$consulta3 = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.cita VALUES (null,'".$idMascota."','".$id."','".$fecha."', 
'".$horaInicial."', 'pendiente', '".$horaFinal."')");

//lo envio a pagina userpet por agenda de cita existosa
header("Location: ../userpet.php?Exito=true&Mensaje=Cita Agendada Exitosamente");


          }
        }
   
  
    
 
}
else{
  //sweetalert campos incompletos
  header("Location: ../userpet.php?Error=true&Mensaje=Completa los campos");
 

}

?>