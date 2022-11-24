<?php

include('db.php');

if (isset($_GET['ID'])) {
    //Si existe un ID se guarda en esta variable
    $id = $_GET['ID'];
    //Se borra de la tabla task donde id sea igual a la variable $id    
    $query = "DELETE FROM task WHERE ID = $id";
    //Se ejecuta la conexion y el pedido
    $result = mysqli_query($conn, $query);

    //Mensaje en caso de error
    if (!$result) {
        die("query failed");
    }

    $_SESSION["message"] = "task deleted succesfully";
    $_SESSION["message_type"] = "danger";
    header("Location: index.php");

}



?>