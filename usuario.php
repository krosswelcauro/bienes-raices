<?php

// Importar la conexion
require  'includes/config/database.php';
$db = conectarDB();

$email = "correo@correo.com";
$password = 123456;

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$query = " INSERT INTO  usuarios (email, password) VALUES ('{$email}', '{$password_hash}'); ";

// echo $query;

mysqli_query($db, $query);