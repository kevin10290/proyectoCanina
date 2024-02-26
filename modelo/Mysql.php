<?php

//clase para conexines 

class MySQL
{

  //Datos de validacion para la conexion

  private $ipServidor = "localhost:4400";
  private $user = "root";
  private $pass = '';
  private $bd = "bd_mascotas";
  private $conexion;

  //Metodo para conectar a la base de datos
  public function conectar()
  {

    $this->conexion = mysqli_connect($this->ipServidor, $this->user, $this->pass, $this->bd);
   
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
}
?>