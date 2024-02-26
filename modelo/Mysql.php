<?php
class MySql
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bd_mascotas";

    private $cnn;

<<<<<<< HEAD
  private $ipServidor = "localhost:4400";
  private $user = "root";
  private $pass = '';
  private $bd = "bd_mascotas";
  private $conexion;
=======
    public function Conectar()
    {
        try {
            $this->cnn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
            return true;
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
            return false;
        }
    }

    public function Desconectar()
    {
        try {
            mysqli_close($this->cnn);
            return true;
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
            return false;
        }
    }
>>>>>>> c40213239790a2f01e3719670df5c9970df78347

    public function ConsultaSimple($consulta)
    {
        try {
            if ($this->Conectar()) {
                mysqli_query($this->cnn, $consulta);
                if ($this->Desconectar()) {
                    return true;
                } else {
                    echo "Error al Desconectarse...\n";
                    return false;
                }
            } else {
                echo "Error al conectarse...\n";
                return false;
            }
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
            return false;
        }
    }

<<<<<<< HEAD
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
=======
    public function ConsultaCompleja($consulta)
    {
        try {
            if ($this->Conectar()) {
                $resultado = mysqli_query($this->cnn, $consulta);
                if ($this->Desconectar()) {
                    return $resultado;
                } else {
                    echo "Error al Desconectarse...\n";
                    return false;
                }
            } else {
                echo "Error al conectarse...\n";
                return false;
            }
        } catch (mysqli_sql_exception $ex) {
            echo $ex;
            return false;
        }
    }
>>>>>>> c40213239790a2f01e3719670df5c9970df78347
}
?>