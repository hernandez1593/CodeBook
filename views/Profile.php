<?php
    session_start();

    //chmod("/php/", 0755);
    //cho substr(sprintf('%o', fileperms('../PHP'), -4);

    if (isset( $_SESSION["rowUser"]))
    {

        $rowUser = $_SESSION["rowUser"];
        $nombre = $rowUser['fName'];
        //$nombreUsuario = "{$rowUser['fName']} {$rowUser['lName']}";
        //$imageName = md5($rowUser[4]);
        //$routeImage = "http://localhost/usuariosGitBook/$imageName";

        //echo $row['publication'];
        $changa = [];
        foreach($rowUser["publication"] as $pub) {
            $changa.push($pub["publication_name"]);
        }
        //$changa = json_decode($rowUser['publication']);
        $company = "";
        $imageName = $rowUser['img_name'];

        $dir = "../images/";
        if($opendir = opendir($dir)){
            while(($file = readdir($opendir)) != FALSE){
                if($file!="." && $file!=".."){
                    $routeImage = "<img src='$dir/$file'><br>";
                }
            }
        }


        /*f (isset($_SESSION["rowCompany"]))
        {
            $company = $_SESSION["rowCompany"][1];
        }
        */
        //echo $rowUser;

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
        Perfil
    </h1>
    </div>
</div>

<div class="row ">

    <div class="col-md-2">
        <div class>
            <p><?php echo $routeImage;?></p>
                <form id="form-image"method="post" action="../php/uploadImg.php" enctype="multipart/form-data">
                    <div id="input" class="button changeImgButton center" onclick="getFile()">Seleccione una foto</div>
                    <div id="inputfile" style="height: 0px; width: 0px; overflow:hidden;">
                        <input name='imagen' id="upfile" type="file" value="upload" onchange="uploadImage();"/>
                    </div>
                </form>
        </div>
    </div>
    <div class="col-md-10">
        <form action="">
        <div class="row">
            <div class="col-md-10 indent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="center">
                                    <label for="profile_name">Full Name: </label>
                                    <label id="profile_name">
                                        <?php echo $nombre; ?>
                                    </label>
                                </div>
                                <div>
                                    <div class = "edit hide-me col-md-9 col-md-offset-2 center">
                                            <input type="text" id="first_name" placeholder="First Name" class="form-control" name="first_name">
                                    </div>
                                    <div class="edit hide-me margin-top col-md-9 col-md-offset-2 center">
                                        <input type="text" id="last_name" placeholder="Last Name" name="last_name" class="form-control margin-top">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="center">
                                    <label for="generoPerfil">Genero: </label>
                                    <label>
                                        <?php echo $rowUser['gender']; ?>
                                    </label>
                                </div>
                                <div class="edit hide-me col-md-6 col-md-offset-3">
                                    <div class="margin-top ">
                                        <select class="form-control" id="selectGender" name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 indent">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="">
                                    <label for="identification">Identification: </label>
                                    <label name="identification">
                                        <?php echo $rowUser['id']; ?>

                                    </label>
                                </div>
                                <div class="edit hide-me margin-top col-md-6 col-md-offset-3">
                                        <input type="text" id="id_person" placeholder="Identification" name="id_person" class="form-control margin-top">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="name">User type: </label>
                                    <label>
                                        <?php echo $rowUser['typeUser']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-10 indent">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="name">Username: </label>
                                    <label class="user">
                                        <?php echo $rowUser['user']; ?>
                                    </label>
                                </div>
                                <div class="edit center hide-me col-md-6 col-md-offset-3">
                                    <input type="text"  id="username" placeholder="Username"text="Username" class="form-control" name="username">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="name">Correo: </label>
                                    <label>
                                        <?php echo $rowUser['email']; ?>
                                    </label>
                                </div>
                                <div class="edit hide-me col-md-6 col-md-offset-3">
                                    <input type="text" id="email" placeholder="E-mail" text="Email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-6 margin-top">
        <button onclick="return showAll();" class="fsSubmitButton">Edit profile settings</button>
        <button onclick="return hideAll();" class="fsSubmitButton">Save edited options</button>
    </div>
</div>
<div class="row hide-me">
    <div class="col-md-6 col-md-offset-6 margin-top">
        <button onclick="return showAll();" class="fsSubmitButton">Edit profile settings</button>
        <button onclick="return hideAll();" class="fsSubmitButton">Save edited options</button>
    </div>
</div>
<hr>
        <!-- /.row -->

<div class="row">

    <div class="col-md-11">
        <div class="row">
            <div class="col-md-12">
<!--
                <form role="form">


                    <div class="form-group">
                        <label>Text area</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <div class="form-group">
                        <label>File input</label>
                        <input type="file">
                    </div>

                </form>
-->
            </div>
            <div class="col-md-12 pubsHere">
                <div class="row">
                    <div class="col-md-12 myPubs">
                        <h2>Mis publicaciones</h2>
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3>hola </h3>
                                </div>
                                <div class="panel-body">
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h1>mensajeria</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    }
    else
    {
        header("location: /index.php");
    }
       ?>
