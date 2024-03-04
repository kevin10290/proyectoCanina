<?php


require_once '../modelo/Usuarios.php';

session_start();
unset($_SESSION['usuario']);
unset($_SESSION['acceso']);
unset($_SESSION['rol']);
session_destroy();
header("Location: ../index.php");
exit();