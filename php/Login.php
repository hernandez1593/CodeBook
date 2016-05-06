<?php
session_start();
include './dbconnection.php';
$connection = new Connection();
$conn = $connection->getConnection();


$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

$query = "select * from person where username = '$user' and pass = '$pass'";

$result = pg_query($conn,$query);
$row =  pg_fetch_row($result);
if (pg_num_rows($result) > 0)
{
    $row = pg_fetch_assoc($result);

    $forum_arr = [];
            $id = $row['id_person'];
            $query2 = "select id_forum, description, title from forum f inner join person p
                       on f.id_person = p.id_person
                       where p.id_person = '$id'";
            $result2 = pg_query($conn,$query2);
            //JSON ENCODE EACH ONE
            while($row2 = pg_fetch_assoc($result2)){
                $forum_arr = array('id_forum'=>($row2['id_forum']),
                                  'description'=>($row2['description']),
                                  'title'=>($row2['title']));
            }

            //Get all the publications of that user
            $publication_arr = [];
            $query3 = "select publication_name, description, code, language_name from publication p inner join program_language pg on p.id_language = pg.id_language
            where p.id_person = '$id'";
            $result3 = pg_query($conn,$query3);
            //JSON ALl the result
            while($row3 = pg_fetch_assoc($result3)){
                array_push($publication_arr,array('name'=>($row3['publication_name']),
                                  'description'=>($row3['description']),
                                  'code'=>($row3['code']),
                                  'language_name'=>($row3['language_name'])
                                  ));
            }


            //Create the JSON ARrray
            $arr[] = array( 'fName'=>$row['first_name'],
                            'lName'=>$row['last_name'],
                            'id'=>$row['id_person'],
                            'img_name'=>$row['img_name'],
                            'user'=>$row['username'],
                            'pass'=>$row['pass'],
                            'email'=>$row['email'],
                            'admission_date'=>$row['admission_date'],
                            'typeUser'=>$row['type_user'],
                            'gender'=>$row['gender'],
                            'forum'=>$forum_arr,
                            'publication'=>$publication_arr
                          );
    //echo json_encode($array[0]);
    echo $arr;
    $_SESSION["rowUser"] = $arr[0];
    header('Location: /webProyecto/views/principal.php');


}
else{
    echo "false";
}
