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


    <!--DOCTYPE html -->
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CodeBook</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/principal.css" rel="stylesheet">
        <link href="../css/friends.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/friends.css">

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>

    </head>

    <body>

        <div class="container">
        <div id="navgiation" class="col-md-2">

                    <!-- Navigation -->
                    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" >Acerca de</a>
                        </div>
                        <!-- Top Menu Items -->
                        <ul class="nav navbar-right top-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                                <ul class="dropdown-menu message-dropdown">
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                                            </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong><?php echo $rowUser['fName']; ?></strong>
                                                </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                                            </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong><?php echo $rowUser['fName']; ?></strong>
                                                </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="message-preview">
                                        <a href="#">
                                            <div class="media">
                                                <span class="pull-left">
                                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                                            </span>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><strong></strong>
                                                </h5>
                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="message-footer">
                                        <a href="#">Read All New Messages</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $nombre; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="../index.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav side-nav">
                                <li class="active">
                                    <a onclick="carga('principal.php','contentX')"><i class="fa fa-fw fa-dashboard"></i>My Profile</a>
                                </li>
                                <li>
                                    <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i>Posts</a>
                                </li>
                                <li>
                                    <a onclick="carga('friends.php','contentX')"><i class="fa fa-fw fa-table"></i> Friends</a>
                                </li>
                                <li>
                                    <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
            </div>
                    <div id="content1" class="contenido col-md-11">
                            <div id="contentX">
                            <!-- Page Heading -->
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
                </div>
                        </div>
            </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/principal.js"></script>
        <script type="text/javascript" src="../js/perfil.js"></script>
        <script src="../js/friends.js" text="text/javascript"></script>


    </body>

    </html>
    <?php
    }
    else
    {
        header("location: /index.php");
    }
    ?>
