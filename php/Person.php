<?php

require './dbconnection.php';
session_start();

class Person{
    //Inserts a new user
    function insertPerson($fName,$lName,$id,$user,$pass,$email,$admission,$typeUser,$gender){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "insert into person (first_name,last_name,id_person,username,pass,email,admission_date,type_user,gender)
                 values ('$fName','$lName',$id,'$user','$pass','$email','$admission','$typeUser','$gender');";
                 echo $query;
        $result = pg_query($conn, $query) or die("Consult Error");
        $_SESSION["rowUser"] = $result;
        header('Location: /webProyecto/views/principal.php');
    }

    //Functions gets the persons with all of its forums and publications made
    function getPersons(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $arr = [];
        $query = "select * from person";
        $result = pg_query($conn,$query) or die("Error while getting persons");
        while($row = pg_fetch_assoc($result)) {
            //Fetch all the forumns
            $forum_arr = [];
            $id = $row['id_person'];
            $query2 = "select id_forum, description, title from forum f inner join person p
                       on f.id_person = p.id_person
                       where p.id_person = $id";
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
            where p.id_person = $id";
            $result3 = pg_query($conn,$query3);
            //JSON ALl the result
            while($row3 = pg_fetch_assoc($result3)){
                $forum_arr = array('name'=>($row3['publication_name']),
                                  'description'=>($row3['description']),
                                  'code'=>($row3['code']),
                                  'language_name'=>($row3['language_name'])
                                  );
            }

            //Create the JSON ARrray
            $arr[] = array( 'fName'=>$row['first_name'],
                            'lName'=>$row['last_name'],
                            'id'=>$row['id_person'],
                            'user'=>$row['username'],
                            'pass'=>$row['pass'],
                            'email'=>$row['email'],
                            'admission_date'=>$row['admission_date'],
                            'typeUser'=>$row['type_user'],
                            'gender'=>$row['gender'],
                            'forum'=>$forum_arr,
                            'publication'=>$publication_arr
                          );
        }
        return $arr;
    }

    //Gets all of the types of users
    function getUser($name){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $arr = [];
        $query = "select * from person where lower(CONCAT(first_name,last_name)) like lower('%$name%')";
        $result = pg_query($conn, $query) or die ("Error while getting User Type");
        while($row = pg_fetch_assoc($result)) {
            //Fetch all the forumns
            $forum_arr = [];
            $id = $row['id_person'];
            $query2 = "select id_forum, description, title from forum f inner join person p
                       on f.id_person = p.id_person
                       where p.id_person = $id";
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
            where p.id_person = $id";
            $result3 = pg_query($conn,$query3);
            //JSON ALl the result
            while($row3 = pg_fetch_assoc($result3)){
                $forum_arr = array('name'=>($row3['publication_name']),
                                  'description'=>($row3['description']),
                                  'code'=>($row3['code']),
                                  'language_name'=>($row3['language_name'])
                                  );
            }

            //Create the JSON ARrray
            $arr[] = array( 'fName'=>$row['first_name'],
                            'lName'=>$row['last_name'],
                            'id'=>$row['id_person'],
                            'user'=>$row['username'],
                            'pass'=>$row['pass'],
                            'email'=>$row['email'],
                            'admission_date'=>$row['admission_date'],
                            'typeUser'=>$row['type_user'],
                            'gender'=>$row['gender'],
                            'forum'=>$forum_arr,
                            'publication'=>$publication_arr
                          );
        }
        return $arr;
    }

    function removePerson($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "delete from person where id_person = '$id'";
        $result = pg_query($conn, $query) or die ("Error while removing persons");
        return $result;
    }

    function editPerson($fName,$lName,$id,$user,$pass,$email,$admission,$typeUser,$gender){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "update person
                  set first_name = '$fName', last_name = '$lName', username = '$user', pass ='$pass', email = '$email', admission_date = '$admission' , type_user = '$typeUser', gender = '$gender'
                  where id_person = '$id'";
        $result = pg_query($conn, $query) or die ("Error while editing person");
    }

}

$person = new Person();

if($_REQUEST['action'] == 'get'){
    $var = json_encode($person->getPersons());
     echo $var ;
}
if($_REQUEST['action'] == 'getuser'){
    $var = json_encode($person->getUser($_REQUEST['name']));//
    echo $var;

}
if($_REQUEST['action'] == 'remove'){
    $person->removePerson($_REQUEST['id']);
    $var = json_encode($person->getPersons());
    echo $var;
}
if($_REQUEST['action'] == 'insert'){
    //http://localhost:81/database%20scripts/Person.php?action=insert&fName=yorbi&lName=mendez&id=207160775&user=yorbigmendez&pass=1234&email=ymenderz&admission=1993-09-30&typeUser=admin&gender=Male
    $person->insertPerson($_REQUEST['fName'], $_REQUEST['lName'],$_REQUEST['id'],$_REQUEST['user'],md5($_REQUEST['pass']),$_REQUEST['email'],$_REQUEST['admission'],$_REQUEST['typeUser'],$_REQUEST['gender']);
    $var = json_encode($person->getPersons());
    echo $var;
}

if($_REQUEST['action'] == 'edit'){
    $person->editPerson($_REQUEST['fName'], $_REQUEST['lName'],$_REQUEST['id'],$_REQUEST['user'],md5($_REQUEST['pass']),$_REQUEST['email'],$_REQUEST['admission'],$_REQUEST['typeUser'],$_REQUEST['gender']);
    $var = json_encode($person->getPersons());
     echo $var ;
}
