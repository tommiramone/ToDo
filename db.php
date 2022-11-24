<?php

//abriendo una sesion para poder guardar valores dentro de ella 
session_start();

//Conexion a la base de datos

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
);

// if (isset($conn)) {
//     echo 'db connected';
// }

?>