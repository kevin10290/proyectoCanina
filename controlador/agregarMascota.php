<?php




$nombre = $_POST['nombreMascota'];
$edad = $_POST['edadMascota'];
$raza = $_POST['razaMascota'];
$tipo = $_POST['tipoMascota'];


if( isset($_POST['nombreMascota']) && !empty($_POST['nombreMascota']) && isset($_POST['edadMascota']) && !empty($_POST['edadMascota'])
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





//verificar existencia del animal XD


        $queryExistPet = $mysql->efectuarConsulta("SELECT * FROM bd_mascotas.resgistromascota
        where bd_mascotas.resgistromascota.idCliente = '".$id."' and bd_mascotas.resgistromascota.nombreMascota = '".$nombre."' and
        bd_mascotas.resgistromascota.edadMascota = '".$edad."' and bd_mascotas.resgistromascota.razaMascota = '".$raza."' and
        bd_mascotas.resgistromascota.tipoMascota = '".$tipo."' or bd_mascotas.resgistromascota.nombreMascota = '".$nombre."' ");

        
        $numRowsExistPet = mysqli_num_rows($queryExistPet);

        if($numRowsExistPet>0){

            header("Location: ../paginas/clientes/addpet.php?Error=true&Mensaje=El animal ya existe XD");

            

        }
        else
        {
            $queryPet = $mysql->efectuarConsulta("INSERT INTO bd_mascotas.resgistromascota VALUES (null, '".$nombre."','".$edad."',
            '".$raza."','".$tipo."','".$id."')");

            header("Location: ../paginas/clientes/userpet.php?Exito=true&Mensaje=Se ha registrado tu mascota");

        }


}
else{



}

?>