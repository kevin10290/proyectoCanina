<?php
//Comprobar datos
require("fpdf.php");
   $pdf = new FPDF();
   $pdf->AddPage('L');
   $pdf->SetFont('Arial', '', 10);




if (
    ((isset($_POST['arregloproductof']) && !empty($_POST['arregloproductof'])) && isset($_POST['idcliente']) && !empty($_POST['idcliente']))
) {
    //llamado del modelo de conexón de consultas

  
    require_once '../modelo/MySQL.php';
    require_once '../modelo/usuarios.php';



    //Capturar variables




    // $usuarios = $mysql->efectuarConsulta("UPDATE  inventarioproductos set strockProducto = strockProducto-1 where idinventarioProducto = 0");





    // Get reference to uploaded image


    session_start();

    //Instanciar la clase
    $mysql = new MySQL();
    $usuario = new usuarios();

    //Usar método del modelo
    $mysql->conectar();


    $usuario = $_SESSION['usuario'];

    $elementos = explode(",", $_POST['arregloproductof']);
    $total = $_POST['total'];




    $consulta = $mysql->efectuarConsulta("select idinventarioProducto,strockProducto from inventarioproductos ");

 
  $resultado=  $consulta ->fetch_all(MYSQLI_NUM);
  
for ($i=0; $i < count( $resultado) ; $i++) { 

 
 for ($j=0; $j < count($elementos); $j++) { 
   if( $elementos[$j] ==$resultado[$i][0] ){
   $resultado[$i][1]=$resultado[$i][1]-1;
   if($resultado[$i][1] <0){
    header("Location: ../userindex.php?Error=true&Mensaje=Lo sentimos, no hay suficientes unidades");
  throw new Exception("Error Processing Request", 1);
  
 }
   }
}

}

$usuario = $_SESSION['usuario'];


 $pdf->Cell(50,9,"Cliente",1);
 $pdf->Cell(50,9,"Fecha",1);
 $pdf->Ln();
 $pdf->Cell(50,9,  utf8_decode($usuario->getUser()),1);
 $pdf->Cell(50,9,  utf8_decode( date_create()->format('Y-m-d')),1);
 $pdf->Ln();
 $pdf->Ln();

$elementos = explode(",",$_POST['arregloproductof']);
  $total =$_POST['total'];

$pdf->Cell(50,9,"Producto",1);
$pdf->Cell(50,9,"Precio",1);




$pdf->Ln();
    //Realizo la consulta con mis comandos\
    $usuarios = $mysql->efectuarConsulta("INSERT INTO facturaproducto  values ( Null,". $total + ($total * 0.19).",'". date_create()->format('Y-m-d')."',Null,". $_POST['idcliente'].",'".$_POST['modoPago']."')");
$ultimo = $mysql->efectuarConsulta("SELECT idfacturaproducto FROM facturaproducto ORDER BY idfacturaproducto DESC LIMIT 1");
$fila = mysqli_fetch_array($ultimo);    

$lastid= $fila[0];
 for ($i=0; $i < count($elementos); $i++) { 




    
    
    $usuarios = $mysql->efectuarConsulta("UPDATE  inventarioproductos set strockProducto = strockProducto-1 where idinventarioProducto = ".$elementos[$i]." and strockProducto>=1");

    $consulta = $mysql->efectuarConsulta("select * from inventarioproductos where idinventarioProducto =".$elementos[$i]);

 

        $fila = mysqli_fetch_array($consulta);
      
        $pdf->Cell(50,9,  utf8_decode($fila[1]),1);
        $pdf->Cell(50,9,  utf8_decode($fila[2]),1);
  
      
    
        $pdf->Ln();

 
        $usuarios = $mysql->efectuarConsulta("INSERT INTO detalleprodcuto  values ( Null,".$elementos[$i].",". $lastid  .")");


    
    # code...
 }
 $pdf->Ln();


 $pdf->Cell(50,9,"Total",1);
 $pdf->Ln();
 $pdf->Cell(50,9, $total,1);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->Cell(50,9,"Total a pagar",1);
 $pdf->Ln();
 $pdf->Cell(50,9,  $total + ($total * 0.19),1);


 $pdf-> Output();




    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();




    /*     while ( $fila = mysqli_fetch_array($consulta)) {
       
        
        if ($producto ==  $fila[1]) {
            $editar = false;
        }
      
    }
    $mysql->desconectar();

    $mysql->conectar();

    if ($editar == true) {
    //Realizo la consulta con mis comandos
 for ($i=0; $i < ; $i++) { 
echo $producto
    $usuarios = $mysql->efectuarConsulta("UPDATE  inventarioproductos set strockProducto = strockProducto-1 where idinventarioProducto = 0");
  


    # code...
 } */
} else {
}
