<?php
include("db.php");

//comprueba que estan enviado un formulado, mediante el metodo post, utilizando el boton de nombre "save_task".
if (isset($_POST['save_task'])) {
    //tomo mediante post el valor del titulo, name=title, y lo guardo en una variable
    $title = $_POST['title'];
    $description = $_POST['description'];

    //guardando los valores en el array
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

    //consultado si salio bien
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Fall");
    }

    //agregango un msj a la sesion. 
    $_SESSION['message'] = 'Task saved succesfuly';
    //coloreando de verde el mensaje
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}

?>