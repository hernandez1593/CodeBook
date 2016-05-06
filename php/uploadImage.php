<?php
    echo 'I am here';
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];

        $imageName = md5($rowUser['img_name']);

        $archivo = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];

        unlink("/images/$imageName");
        move_uploaded_file($archivo, "/images/$imageName");

       //header('Location: /views/principal.php');
    }
?>
