<?php

//clase para conexines 

class MySQL
{

  //Datos de validacion para la conexion

  private $ipServidor = "localhost";
  private $usuario = 'root';
  private $contrasena = '12345';

  private $conexion;

  //Metodo para conectar a la base de datos
  public function conectar()
  {

    $this->conexion = mysqli_connect($this->ipServidor, $this->usuario, $this->contrasena);
  }

  //Metodo para cerrar la conexion
  public function desconectar()
  {

    mysqli_close($this->conexion);
  }

  //Metodo que efectua una consulta devuelve su resultado
  public function efectuarConsulta($consulta)
  {

    mysqli_query($this->conexion, "SET lc_time_names = 'es_ES'");
    mysqli_query($this->conexion, "SET NAMES 'utf8'");

    $this->resultadoConsulta = mysqli_query($this->conexion, $consulta);

    return $this->resultadoConsulta;
  }

  public function consultVerificacion($consulta)
{
  try
  {
    if($this->conectar()){
      $resultado = mysqli_query(this->conexion, $consulta);
      if($this->desconectar()){
        return $resultado;
      } else{
        echo "Error al desconectarse";
        return false;
      }
    }else{
      echo "Error al conectarse";
      return false;
    }
  }
  catch(mysqli_sql_exception $ex)
  {
    echo $ex;
    return false;
  }
}
}


?>