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
        $foundImg = false;

        $dir = "../images/";
        if($opendir = opendir($dir)){
            while(($file = readdir($opendir)) != FALSE){
                if($file!="." && $file!=".."){
                    if($file == $imageName){
                        $foundImg = true;
                        $routeImage = "<img src='$dir/$file' class='img-responsive'><br>";
                    }
                    else if($foundImg == false)
                        $routeImage = "<img src='$dir/$file' class='img-responsive'><br>";
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
    <div class="col-md-3 col-md-offset-9">
        <h1 class="">
        Perfil
        </h1>
    </div>
</div>
<hr>

<div class="row scrollingDiv">
    <div class="col-md-8">
        <form method="GET" id="editForm" action="../php/Person.php?action=insert" onsubmit="return saveChanges();" class="sa-innate-form">
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
                                            <input type="text" id="first_name" placeholder="First Name" class="form-control" name="fName">
                                    </div>
                                    <div class="edit hide-me margin-top col-md-9 col-md-offset-2 center">
                                        <input type="text" id="last_name" placeholder="Last Name" name="lName" class="form-control margin-top">
                                        <input class="hide-me" name='action' value="edit"/>
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
                                <div class="edit center hide-me col-md-6 col-md-offset-3">
                                    <input type="text" id="user" value = "<?php echo $rowUser['id']; ?>"  class="form-control" name="id">
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
                                    <input type="text"  name="user" id="user" placeholder="Username" text="Username" class="form-control">
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
            <div class="col-md-10 indent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <div class="center">
                                    <label for="pass">Password: </label>
                                    <label id="pass">
                                        <?php echo md5($rowUser['pass']); ?>
                                    </label>
                                </div>
                                <div class="edit hide-me col-md-6 col-md-offset-3">
                                    <input type="text" id="pass" placeholder="pass" class="form-control" name="pass">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div>
                                <div class="center">
                                    <label for="generoPerfil">Admission Date: </label>
                                    <label>
                                        <?php echo $rowUser['admission_date']; ?>
                                    </label>
                                </div>
                                <div class="edit hide-me col-md-6 col-md-offset-3">
                                    <input type="text" id="admission" placeholder="Admission Date" class="form-control" name="admission">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="col-md-4 ">
        <div class = "row">
        <div class="col-md-8 col-md-offset-1" syle="position:absolute;">
            <p><?php echo $routeImage;?></p>
                <form id="form-image"method="post" action="../php/uploadImg.php">
                    <div id="input" class="button changeImgButton center" onclick="getFile()">Change profile picture</div>
                    <div id="inputfile" style="height: 0px; width: 0px; overflow:hidden;">
                        <input name='imagen' id="upfile" type="file" value="upload" onchange="uploadImage();"/>
                    </div>
                </form>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" id="save_changes" style="width:100%;" class="fsSubmitButton hide-me">Save edited  options</button>
                </div>
            </div>
        </div>

        </form>
        <div class="col-md-8 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                        <button id="edit_profile" style="width:100%; "onclick="return showAll();" class="fsSubmitButton">Edit profile settings</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<hr class="hr-style">
        <!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8" id="add_post">
                <form role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group scrollingDiv">
                                <h2>New post</h2>
                                <textarea class="form-control" style="resize: none; " rows="30"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 margin-top">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <button type="submit" class="post-button btn-block" style="width:100%;">Add the new post</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div id="input" class="post-button center" onclick="getFile()">Load an archive</div>
                                    <div id="inputfile" style="height: 0px; width: 0px; overflow:hidden;">
                                        <input name='imagen' id="upfile" type="file" value="upload" onchange="uploadImage();"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h2>Chat</h2>
                            <div class="panel panel-info">
                                <div class="panel-body box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="center">Chat conversations go here</h4>
                                            <hr >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <textarea style="resize: none; " class="form-control" rows="3" style="width=100px;"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="post-button btn-block" style="width:100%;height:100%;">Send</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <p></p>
</div>
<div class="row">
    <p></p>
</div>
<div class="row">
    <p></p>
</div>
<div class="row">
    <footer class="footer">
                <div class="row">
                </h2>This website was created by Yorbi Mendez Soto and Alejandro Hernandez</h3>
                </h2>@Copy right reserved</h3>
                </div>
    </footer>
</div>

<?php
    }
    else
    {
        header("location: /index.php");
    }
       ?>
