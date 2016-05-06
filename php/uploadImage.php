<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];

        $imageName = md5($rowUser[4]);

        $archivo = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];

        unlink("http://localhost:81/webProyecto/$imageName");
        move_uploaded_file(
            $archivo, "http://localhost:81/webProyecto/$imageName");

       header('Location: /views/principal.php');
    }
?>
