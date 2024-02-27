<?php

$ArregloProductos = $_POST['filas'];

// Iterar sobre cada fila del arreglo
foreach ($ArregloProductos as $fila) {
    // Acceder al primer valor de cada fila
    $primerValor = $fila[0];
    echo "<tr> <td>".$fila[0]." </td> <td>".$fila[0]." </td> <td>".$fila[0]." </td> <td>".$fila[0]." </td> <td>".$fila[0]." </td> <td>".$fila[0]." </td>    </tr>";
}