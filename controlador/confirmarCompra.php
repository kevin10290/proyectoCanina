<?php
//Comprobar datos
require("fpdf.php");
$pdf = new FPDF();
$pdf -> AddPage('L');
$pdf->SetFont('Arial', '', 10);




if (
      (isset($_POST['arregloproductos']) && !empty($_POST['arregloproductos']))
) {
    //llamado del modelo de conexón de consultas


    require_once '../modelo/MySQL.php';


    //Capturar variables




   // $usuarios = $mysql->efectuarConsulta("UPDATE  inventarioproductos set strockProducto = strockProducto-1 where idinventarioProducto = 0");
  




    // Get reference to uploaded image
 

    //Instanciar la clase
    $mysql = new MySQL();

    //Usar método del modelo
    $mysql->conectar();

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
 
$elementos = explode(",",$_POST['arregloproductos']);
  
$pdf->Cell(50,9,"Producto",1);
$pdf->Cell(50,9,"Precio",1);




$pdf->Ln();
    //Realizo la consulta con mis comandos
 for ($i=0; $i < count($elementos); $i++) { 




    
    
    $usuarios = $mysql->efectuarConsulta("UPDATE  inventarioproductos set strockProducto = strockProducto-1 where idinventarioProducto = ".$elementos[$i]." and strockProducto>=1");

    $consulta = $mysql->efectuarConsulta("select * from inventarioproductos where idinventarioProducto =".$elementos[$i]);

 

        $fila = mysqli_fetch_array($consulta);
      
        $pdf->Cell(50,9,  utf8_decode($fila[1]),1);
        $pdf->Cell(50,9,  utf8_decode($fila[2]),1);
  
      
    
        $pdf->Ln();
    
  
    


    
    # code...
 }


 $pdf-> Output();




    //Desconectar de la base de datos para liberar memoria

    $mysql->desconectar();

    //Capturar los resultados de la consulta en una fila

  
    
   // header("Location: ../userindex.php");
 
}
else{

   
}
?>
