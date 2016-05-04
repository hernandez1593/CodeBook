<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "{$rowUser['fName']} {$rowUser['lName']}";

        //$imageName = md5($rowUser[4]);
        //$routeImage = "http://localhost/usuariosGitBook/$imageName";

        $company = "";
        /*f (isset($_SESSION["rowCompany"]))
        {
            $company = $_SESSION["rowCompany"][1];
        }
        */
        //echo $rowUser['fName'];

?>


    <!DOCTYPE html>
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

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">SB Admin</a>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $nombreUsuario; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Publicaciones Amigos</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-fw fa-table"></i> Buscar Amigos</a>
                        </li>
                        <li class="active">
                            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                        </li>
                        <li>
                            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                            Perfil
                        </h1>
                        </div>
                    </div>
                    <!-- /.row   aqui pegar el perfil.html-->
                    <form action="">
                        <div class="row">
                            <div class="col-lg-1">
                                <img src="../images/teddy.png" class="img-thumbnail img-responsive" style="wi" alt="">
                                <button type="button" class="btn btn-primary center">
                                    <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> Subir Imagen
                                </button>


                            </div>
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="mostrar">
                                                    <label for="nombrePerfil">Nombre: </label>
                                                    <label id="nombrePerfil">
                                                        <?php echo $nombreUsuario; ?>
                                                    </label>
                                                </div>
                                                <div class="editar">

                                                    <label for="nombreEditar">Nombre: </label>
                                                    <input type="text" class="" name="nombreEditar">
                                                    <label for="apellidosEditar">Apellidos: </label>
                                                    <input type="text" name="apellidosEditar">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
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
                            <div class="col-lg-11">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
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
                                                    <input type="text" class="" name="cedulaEditar">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
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
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-default btn-lg">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                </button>
                                <button type="button" class="btn btn-default btn-lg">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                </button>


                            </div>
                            <div class=" col-lg-11">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
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
                                                    <input type="text" class="" name="usuarioEditar">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
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
                                                    <input type="text" class="" name="correo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <!-- /.row -->

                        <div class="row">

                            <div class="col-lg-8">
                                <div class="row">
                                    <div class>
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
                                    </div>

                                </div>


                            </div>
                            <div class="col-lg-4">



                                <h1>mensajeria</h1>



                            </div>
                        </div>
                        <!-- /.row -->
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

    </body>

    </html>


    <?php
    }
    else
    {
        header("location: /index.php");
    }
    ?>
