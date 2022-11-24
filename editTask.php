<?php
include("db.php");

if (isset($_GET['ID'])) {
    //Si existe un ID se guarda en esta variable
    $id = $_GET['ID'];
    //Se borra de la tabla task donde id sea igual a la variable $id    
    $query = "SELECT * FROM task WHERE ID = $id";
    //Se ejecuta la conexion y el pedido
    $result = mysqli_query($conn, $query);

    //si existe UNA tarea con ese id
    if (mysqli_num_rows($result) == 1) {
        //tomando en un array todo lo obtenido en $result
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

//Si existe en post un metodo update...
if (isset($_POST['update'])) {
    $id = $_GET['ID'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    //CARGAR LOS NUEVOS VALORES EN LA TABLA MIENTRAS EL ID = $ID INGRESADO
    $query = "UPDATE task SET title = '$title', description = '$description' WHERE ID = $id";
    //ejecucion de la consulta
    mysqli_query($conn, $query);

    $_SESSION['message'] = "task updated succesfully";
    $_SESSION['message_type'] = "warning";
    header("Location: index.php");
}


?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card-body">
                <form action="editTask.php?ID=<?php echo $_GET['ID'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title ?>" class="form-control"
                            placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Update description"><?php echo $description ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>