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
            <p><?php echo $routeImage;?></p>
                <form id="form-image"method="post" action="../php/uploadImg.php" enctype="multipart/form-data">
                    <div id="input" class="button be-green white lato" onclick="getFile()">Seleccione una foto</div>
                    <div id="inputfile" style="height: 0px; width: 0px; overflow:hidden;">
                        <input name='imagen' id="upfile" type="file" value="upload" onchange="uploadImage();"/>
                    </div>
                </form>
    </div>
    <div class="col-md-10">
        <form action="">
        <div class="row">
            <div class="col-md-10 margin-left">
                <div class="row">
                    <div class="col-md-6 text-centermargin-left">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="nombrePerfil">Nombre: </label>
                                    <label id="nombrePerfil">
                                        <?php echo $nombre; ?>
                                    </label>
                                </div>
                                <div>
                                    <div>
                                        <div class="col-md-3">
                                            <label for="nombreEditar">Nombre: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nombreEditar">
                                        </div>
                                    </div>
                                    <div class="margin-top">
                                        <div class="col-md-3 ">
                                            <label for="apellidosEditar">Apellidos: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="apellidosEditar" class="form-control">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="generoPerfil">Genero: </label>
                                    <label>
                                        <?php echo $rowUser['gender']; ?>
                                    </label>
                                </div>
                                <div class="editar">

                                    <!-- falta edicion de radio button de sexo  -->
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
                                <div class="mostrar">
                                    <label for="cedulaPerfil">Cedula: </label>
                                    <label name="cedulaPerfil">
                                        <?php echo $rowUser['id']; ?>

                                    </label>
                                </div>
                                <div class="editar">

                                    <label for="cedulaEditar">Cedula: </label>
                                    <input type="text" class="form-control" name="cedulaEditar">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="name">Tipo Usuario: </label>
                                    <label>
                                        <?php echo $rowUser['typeUser']; ?>
                                    </label>
                                </div>
                                <div class="editar">

                                    <!-- aqui va un choose de select -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-11 indent">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="mostrar">
                                    <label for="name">Usuario: </label>
                                    <label class="usuarioPerfil">
                                        <?php echo $rowUser['user']; ?>
                                    </label>
                                </div>
                                <div class="editar">

                                    <label for="usuarioEditar">Usuario: </label>
                                    <input type="text" class="form-control" name="usuarioEditar">

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
                                <div class="editar">

                                    <label for="correo">Correo: </label>
                                    <input type="text" class="form-control" name="correo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>
    </div>

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
