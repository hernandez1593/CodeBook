<?php

require './dbconnection.php';
session_start();

class Publication{
    //Insert into publications
    function insertPublication($language_name,$publication_name,$descrip,$code){
        //Obtain user session
        if (isset( $_SESSION["rowUser"]))
        {
            //Init connection
            $connection = new Connection();
            $conn = $connection->getConnection();
            //Get user id from session
            $rowUser = $_SESSION["rowUser"];
            $id_person = $rowUser[3];
            echo $id_person;
            //get the id of the language
            $getLanguageQuery = "select id_language from program_language where language_name = '$language_name'";
            $id_language = pg_query($conn, $getLanguageQuery) or die("Consult Error");
            //Query the insert to publication
            $query = "insert into publication (id_language, id_person, publication_name , description, code)
                     values ('$id_language','$id_person',$publication_name,'$descrip','$code');";
            echo $query;
            $result = pg_query($conn, $query) or die("Consult Error");
        }else{
            echo "Error due to the fact that ";
        }
    }

    //Get all my friends publications
    function getFriendPublications(){
        //Obtain user session
        if (isset( $_SESSION["rowUser"]))
        {
            //Do connnection
            $connection = new Connection();
            $conn = $connection->getConnection();
            $arr = [];
            //Get user id
            $rowUser = $_SESSION["rowUser"];
            $id_person = $rowUser[3];
            echo $id_person;
            //Get all my friends posts
            $query = "SELECT  pg.language_name, pub.publication_name, pub.description, pub.code
                FROM    person p
                INNER JOIN friend f
                ON      p.id_person = f.id_user2
                INNER JOIN 	publication pub
                ON	pub.id_person = f.id_user2
                INNER JOIN 	program_language pg
                ON 	pg.id_language = pub.id_language
                WHERE	p.id_person = '$id_person' AND f.friends = 1
                UNION
                SELECT  pg.language_name, pub.publication_name, pub.description, pub.code
                FROM    person p
                INNER JOIN friend f
                ON      p.id_person = f.id_user1
                INNER JOIN publication pub
                ON	pub.id_person = f.id_user1
                INNER JOIN 	program_language pg
                ON 	pg.id_language = pub.id_language
                WHERE	p.id_person = '$id_person' AND f.friends = 1";
            echo $query;
            $result = pg_query($conn, $query) or die("Consult Error");
            //Create JSON
            while($row = pg_fetch_assoc($result)) {
                //Create the JSON ARrray
                $arr[] = array( 'first_name'=>$row['first_name'],
                            'last_name'=>$row['last_name'],
                            'language_name'=>$row['language_name'],
                            'publication_name'=>$row['publication_name'],
                            'description'=>$row['description'],
                            'code'=>$row['code']
                          );
            }
            return $arr;
        }else{
            echo "Error due to the fact that ";
        }
    }

    //Gets all my posted publications
    function getMyPublications(){
        //Obtain user session
        if (isset( $_SESSION["rowUser"]))
        {
            //Do connnection
            $connection = new Connection();
            $conn = $connection->getConnection();
            $arr = [];
            //Get user id
            $rowUser = $_SESSION["rowUser"];
            $id_person = $rowUser[3];
            echo $id_person;
            //Get all my friends posts
            $query = "select pg.language_name,pub.publication_name,pub.description,pub.code from person p inner join publication pub  on p.id_person = pub.id_person inner join program_language pg on pub.id_language = pg.id_language
            where p.id_person = '$id_person'";
            echo $query;
            $result = pg_query($conn, $query) or die("Consult Error");
            //Create JSON
            while($row = pg_fetch_assoc($result)) {
                //Create the JSON ARrray
                $arr[] = array('language_name'=>$row['language_name'],
                            'publication_name'=>$row['publication_name'],
                            'description'=>$row['description'],
                            'code'=>$row['code']
                          );
            }
            return $arr;
        }else{
            echo "Error due to the fact that ";
        }
    }

    //Gets all the publications
    function getAllPublications(){
        //Do connnection
        $connection = new Connection();
        $conn = $connection->getConnection();
        $arr = [];
        echo $id_person;
        //Get all my friends posts
        $query = "select pg.language_name,pub.publication_name,pub.description,pub.code from person p inner join publication pub  on p.id_person = pub.id_person inner join program_language pg on pub.id_language = pg.id_language ";
        echo $query;
        $result = pg_query($conn, $query) or die("Consult Error");
        return $result;
    }

    function editPublication($language_name,$publication_name,$descrip,$code){
        $connection = new Connection();
        $conn = $connection->getConnection();
        //get the id of the language
        $getLanguageQuery = "select id_language from program_language where language_name = '$language_name'";
        $id_language = pg_query($conn, $getLanguageQuery) or die("Consult Error");

        $query = "update publication
                  set id_language = '$id_language', last_name = '$lName', username = '$user', pass ='$pass', email = '$email', admission_date = '$admission' , type_user = '$typeUser', gender = '$gender'
                  where id_person = '$id' and publication_name = '$publication_name'";
        $result = pg_query($conn, $query) or die ("Error while editing person");
    }

}

$publication = new Publication();

if($_REQUEST['action'] == 'getAll'){
    $var = json_encode($publication->getAllPublications());
    print_r($var);
}
if($_REQUEST['action'] == 'getMy'){
    $var = json_encode($publication->getMyPublications());
    print_r($var);
}
if($_REQUEST['action'] == 'getFriendPublication'){
    $var = json_encode($publication->getFriendPublications());
    print_r($var);
}
if($_REQUEST['action'] == 'insert'){
    $language_name,$publication_name,$descrip,$code
    //http://localhost:81/database%20scripts/Person.php?action=insert&fName=yorbi&lName=mendez&id=207160775&user=yorbigmendez&pass=1234&email=ymenderz&admission=1993-09-30&typeUser=admin&gender=Male
    $publication->insertPublication($_REQUEST['language_name'], $_REQUEST['publication_name'], $_REQUEST['description'], $_REQUEST['code']);
    $var = json_encode($person->getMyPublications());
    print_r($var);
}

if($_REQUEST['action'] == 'edit'){
    $person->editPerson($_REQUEST['fName'], $_REQUEST['lName'],$_REQUEST['id'],$_REQUEST['user'],md5($_REQUEST['pass']),$_REQUEST['email'],$_REQUEST['admission'],$_REQUEST['typeUser'],$_REQUEST['gender']);
    $var = json_encode($person->getPersons());
    print_r($var);
}

?>
