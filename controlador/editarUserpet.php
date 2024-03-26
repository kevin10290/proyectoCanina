<?php


$idMascota = $_POST['idMascota'];
$idCita = $_POST['idCita'];
$fecha = $_POST['fecha'];
$fechaAntigua = $_POST['fechaAntigua'];
$horaAntigua = $_POST['horaAntigua'];
$hora = $_POST['hora'];
$nombreMascota = $_POST['nombreMascota'];
$edadMascota = $_POST['edadMascota'];
$razaMascota = $_POST['razaMascota'];
$tipoMascota = $_POST['tipoMascota'];

  
  //genero un tiempo de cita
  
  $horafin = new DateTime($hora);
  $horafin->modify("+60 minutes");
  $horaFinal = $horafin->format("H:i:s");
  $horaInicio = new DateTime($hora);
  $horaInicial = $horaInicio->format("H:i:s");



if(isset($_POST['idCita']) && !empty($_POST['idCita']) && isset($_POST['fecha']) && !empty($_POST['fecha'])
&& isset($_POST['hora']) && !empty($_POST['hora']) && isset($_POST['nombreMascota']) && !empty($_POST['nombreMascota'])
&& isset($_POST['edadMascota']) && !empty($_POST['edadMascota']) && isset($_POST['razaMascota']) && !empty($_POST['razaMascota']) &&
isset($_POST['tipoMascota']) && !empty($_POST['tipoMascota']) ){






    require_once '../modelo/MySQL.php';
    require_once '../modelo/usuarios.php';

    //obtengo con la clase usuarios el id del usuario

    $usuarios = new usuarios();
    $mysql = new MySQL;

    session_start();
    $usuarios = new usuarios();
    $usuarios= $_SESSION['usuario'];

    
    $mysql->conectar();

    $id = $usuarios->getId();

    if($fechaAntigua != $fecha || $horaAntigua != $hora){

        $consultaHora = $mysql->efectuarConsulta("SELECT * FROM  bd_mascotas.cita WHERE
        bd_mascotas.cita.horaCita BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
        bd_mascotas.cita.fechaCita LIKE '".$fecha."' OR 
        bd_mascotas.cita.horaFin BETWEEN '".$horaInicial."' and '".$horaFinal."' AND 
        bd_mascotas.cita.fechaCita LIKE '".$fecha."';");

        $horaExist = mysqli_num_rows($consultaHora);

        if($horaExist>0){

            header("Location: ../paginas/clientes/userpet.php?Error=true&Mensaje=Ya esta Agendada la cita!!");

        }
        else{


  //edita la cita
     
  $consulta1 = $mysql->efectuarConsulta("UPDATE bd_mascotas.cita SET bd_mascotas.cita.fechaCita = '".$fecha."',
  bd_mascotas.cita.horaCita = '".$hora."' WHERE idCita = ".$idCita."");

  //edita los datos de la mascota

 $consulta2 = $mysql->efectuarConsulta("UPDATE bd_mascotas.resgistromascota SET bd_mascotas.resgistromascota.nombreMascota= '".$nombreMascota."',
 bd_mascotas.resgistromascota.edadMascota= '".$edadMascota."', bd_mascotas.resgistromascota.razaMascota='".$razaMascota."',
 bd_mascotas.resgistromascota.tipoMascota='".$tipoMascota."' WHERE idMascota = ".$idMascota."");



header("Location: ../paginas/clientes/userpet.php?editado=true&Mensaje=Cita Editada Exitosamente!!");

        }
    }
    else{

        $mysql->conectar();

         //Verifico antes de editar si el nombre existe ya en la base de datos
    
         $queryExistPet = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota
         where bd_mascotas.resgistromascota.nombreMascota = '".$nombreMascota."' ");
     
         $numRowsExistPet = mysqli_num_rows($queryExistPet);
     
         if($numRowsExistPet>0){
     
             $cambioDatos = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota 
             where bd_mascotas.resgistromascota.edadMascota = '".$edadMascota."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombreMascota."' 
             and bd_mascotas.resgistromascota.idCliente = ".$id." and bd_mascotas.resgistromascota.idMascota=".$idMascota." 
             or bd_mascotas.resgistromascota.razaMascota = '".$razaMascota."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombreMascota."' 
             and bd_mascotas.resgistromascota.idCliente = ".$id." and bd_mascotas.resgistromascota.idMascota=".$idMascota." 
             or bd_mascotas.resgistromascota.tipoMascota = '".$tipoMascota."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombreMascota."' 
             and bd_mascotas.resgistromascota.idCliente = ".$id." and bd_mascotas.resgistromascota.idMascota=".$idMascota." ");
     
             $numRowsCambioDatos = mysqli_num_rows($cambioDatos);
     
             if($numRowsCambioDatos==0){
 
 
                 
                 $consulta3 = $mysql->efectuarConsulta("UPDATE bd_mascotas.resgistromascota SET bd_mascotas.resgistromascota.nombreMascota= '".$nombreMascota."',
                 bd_mascotas.resgistromascota.edadMascota= '".$edadMascota."', bd_mascotas.resgistromascota.razaMascota='".$razaMascota."',
                 bd_mascotas.resgistromascota.tipoMascota='".$tipoMascota."' WHERE idMascota = ".$idMascota."  ");
          
           
           
                header("Location: ../paginas/clientes/userpet.php?editado=true&Mensaje=Cita Editada Exitosamente!!");
          
     
             
             }
             else{
                 //verifico si no hizo ningun cambio y le dio al boton editar 
     
                 $verificacion= $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota 
                 where bd_mascotas.resgistromascota.edadMascota = '".$edadMascota."' and bd_mascotas.resgistromascota.razaMascota = '".$razaMascota."'  
                 and bd_mascotas.resgistromascota.tipoMascota = '".$tipoMascota."' and  bd_mascotas.resgistromascota.nombreMascota = '".$nombreMascota."' 
                 and bd_mascotas.resgistromascota.idCliente = ".$id." and bd_mascotas.resgistromascota.idMascota=".$idMascota."");
     
                 $numRowsNoCambioDatos = mysqli_num_rows($verificacion);
     
                 if($numRowsNoCambioDatos>0){
                     header("Location:../paginas/clientes/userpet.php?Error=true&Mensaje= Antes de editar debes de cambiar los campos");
     
                 }
                 else{
     
                     $consulta4 = $mysql->efectuarConsulta("UPDATE bd_mascotas.resgistromascota SET bd_mascotas.resgistromascota.nombreMascota= '".$nombreMascota."',
                     bd_mascotas.resgistromascota.edadMascota= '".$edadMascota."', bd_mascotas.resgistromascota.razaMascota='".$razaMascota."',
                     bd_mascotas.resgistromascota.tipoMascota='".$tipoMascota."' WHERE idMascota = ".$idMascota."  ");

                     $consulta1 = $mysql->efectuarConsulta("UPDATE bd_mascotas.cita SET bd_mascotas.cita.fechaCita = '".$fecha."',
                     bd_mascotas.cita.horaCita = '".$hora."' WHERE idCita = ".$idCita."");

                     header("Location:../paginas/clientes/userpet.php?editado=true&Mensaje=Cita Editada Exitosamente!!");
     
                 }
     
                 
     
             }
     
            
         }
     
         else{
     
         //edita la cita
     
         $consulta1 = $mysql->efectuarConsulta("UPDATE bd_mascotas.cita SET bd_mascotas.cita.fechaCita = '".$fecha."',
         bd_mascotas.cita.horaCita = '".$hora."' WHERE idCita = ".$idCita."");
     
         //edita los datos de la mascota
     
        $consulta2 = $mysql->efectuarConsulta("UPDATE bd_mascotas.resgistromascota SET bd_mascotas.resgistromascota.nombreMascota= '".$nombreMascota."',
        bd_mascotas.resgistromascota.edadMascota= '".$edadMascota."', bd_mascotas.resgistromascota.razaMascota='".$razaMascota."',
        bd_mascotas.resgistromascota.tipoMascota='".$tipoMascota."' WHERE idMascota = ".$idMascota."");
     
      
      
     header("Location: ../paginas/clientes/userpet.php?editado=true&Mensaje=Cita Editada Exitosamente!!");
     
         }
         

    }





       

    



    
   
   
   
}
else{
    header("Location:  ../paginas/clientes/editUserpet.php");
}

?>