<?php
    require './Person.php';
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
        $id = $rowUser['id'];
        //Change the img name in the database
        $query = "update person set img_name = '$imageName' where id_person = '$id'";
        $query_answer = pg_query($conn,$query);
        //Get user updated info and set as row user
        $arr = $person->getInfo($id);
        $_SESSION['rowUser'] = $arr[0];

        header('Location: /webProyecto/views/Main.php');
    }
?>
