<?php
session_start();
include './dbconnection.php';

$connection = new Connection();
$conn = $connection->getConnection();

$user = $_REQUEST['user'];
$pass = md5($_REQUEST['pass']);

$query = "select * from person where username = '$user' and pass = '$pass'";

$result = pg_query($query);
if (pg_num_rows($result) > 0)
{
    $row = pg_fetch_assoc($result);
    $array[] = array( 'fName'=>$row['first_name'],
                            'lName'=>$row['last_name'],
                            'id'=>$row['id_person'],
                            'user'=>$row['username'],
                            'pass'=>$row['pass'],
                            'email'=>$row['email'],
                            'admission_date'=>$row['admission_date'],
                            'typeUser'=>$row['type_user'],
                            'gender'=>$row['gender']
                          );
    //echo json_encode($array[0]);
    $_SESSION["rowUser"] = $array[0];
    header('Location: /webProyecto/views/principal.php');


}
else{
    echo "false";
}
