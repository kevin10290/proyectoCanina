<?php



if(isset($_POST['fecha']) && !empty($_POST['fecha']) && isset($_POST['hora']) && !empty($_POST['hora'])
&& isset($_POST['opciones']) && !empty($_POST['opciones'])){

  
  $fecha= $_POST['fecha'];
  $hora = $_POST['hora'];
  $nombre = $_POST['opciones'];
  
  //genero un tiempo de cita
  
  $horafin = new DateTime($hora);
  $horafin->modify("+60 minutes");
  $horaFinal = $horafin->format("H:i:s");
  $horaInicio = new DateTime($hora);
  $horaInicial = $horaInicio->format("H:i:s");
 


  require_once '../modelo/MySQL.php';
  require_once '../modelo/usuarios.php';

//obtengo con la clase usuarios el id del usuario

  $usuarios = new usuarios();

  $mysql = new MySQL;
  session_start();
  $usuarios = new usuarios();
  $usuarios= $_SESSION['usuario'];
  $id = $usuarios->getId();
  

  $mysql->conectar();
//consulta para saber si la fecha de la cita esta disponible, sino lo reenvia a pagina de inicio con alerta

  $consulta = $mysql->efectuarConsulta("SELECT * FROM  bd_mascotas.cita WHERE
   bd_mascotas.cita.horaCita BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
   bd_mascotas.cita.fechaCita LIKE '".$fecha."' OR 
   bd_mascotas.cita.horaFin BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
   bd_mascotas.cita.fechaCita LIKE '".$fecha."';");

  

  

  $num = mysqli_num_rows($consulta);

  
  
 

      if($num>0){

      //poner alerta de que ya hay cita agendada

      header("Location: ../paginas/clientes/userpet.php?Error=true&Mensaje=Ya existe una cita agendada a esa hora");

      }
      else{

        $mysql->conectar();

        //Obtengo los datos de la mascota con el nombre unico en la base de datos

        $dataWithName = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota WHERE
         bd_mascotas.resgistromascota.nombreMascota = '".$nombre."';");

         $arrayPet= mysqli_fetch_array($dataWithName);

          $idMascota = $arrayPet['idMascota'];

          echo $idMascota;
          echo " ", $id;
          

          //inserto datos en la cita 

          $mysql->conectar();

          $insertCita = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.cita VALUES (null,".$idMascota.",".$id.", '".$fecha."', 
          '".$horaInicial."', 'pendiente', '".$horaFinal."')");

          

          //lo envio a pagina userpet por agenda de cita existosa


         header("Location: ../paginas/clientes/userpet.php?Exito=true&Mensaje=Cita Agendada Exitosamente");



      
      
      
      }


  

}
else{

  header("Location: ../paginas/clientes/userpet.php?faltaNomMascota=true&Mensaje=Faltan datos por rellenar");
}




?>