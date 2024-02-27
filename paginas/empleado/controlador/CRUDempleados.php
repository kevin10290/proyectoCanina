<?php include_once('MYSQL.php');

$sql= "SELECT * FROM empleado";

$result= $conexion->query($sql);

//validamos para mostrar datos

if ($resultado->num_rows > 0) {

    // hay información que mostrar

    while ($row = $resultado->fetch_assoc()) {

        echo "<hr> id asociado: " . $row["id"] . "-Nombre Usuario: " . $row["nombre"] . " " . $row["apellido"] . "<hr>";
    }
} else {

    echo "Sin información ingresada aún";
}

$conexion->close();
?>