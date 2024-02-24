<?php
class MySql
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bd_mascotas";

    private $cnn;

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
}
?>