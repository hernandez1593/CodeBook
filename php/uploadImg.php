<?php
    require './Person.php';
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];

        $imageName = $rowUser['img_name'];

        $archivo = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];
        $target_path = '../images/';
        //chown("C:/wamp/www/webProyecto/php/uploadImage.php", 777);
        //chmod("C:/wamp/www/webProyecto/php/uploadImage.php", 777);
        // $target_path = $_SERVER['DOCUMENT_ROOT']."webProyecto/images/".$imageName;
        if($imageName != 'teddy.png'){
            unlink($target_path,$imageName);
        }
        move_uploaded_file($archivo, $target_path.$nombreArchivo);
        $_SESSION['rowUser']['img_name'] = $imageName;
        header('Location: /webProyecto/views/Main.php');
    }
?>
