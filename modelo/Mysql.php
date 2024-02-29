<?php

class MYSQL
{
    private $ipServidor = "localhost";
    private $usuarioBase = 'root';
    private $contrasena = '';
    private $nombreBaseDatos = 'bd_mascotas';
    
    public function conectar()
    {
        $conexion = mysqli_connect($this->ipServidor, $this->usuarioBase, $this->contrasena, $this->nombreBaseDatos);
        if (!$conexion) {
            die("La conexión ha fallado: " . mysqli_connect_error());
        }
        return $conexion;
    }

    public function desconectar($conexion)
    {
        mysqli_close($conexion);
    }

    public function efectuarConsulta($conexion, $consulta)
    {
        mysqli_query($conexion, "SET lc_time_names = 'es_Es'");
        mysqli_query($conexion, "SET NAMES 'utf8'");

        $resultadoConsulta = mysqli_query($conexion, $consulta);
        return $resultadoConsulta;
    }
}

?>
