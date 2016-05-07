<?php
    session_start();

    //chmod("/php/", 0755);
    //cho substr(sprintf('%o', fileperms('../PHP'), -4);

    if (isset( $_SESSION["rowUser"]))
    {

        $rowUser = $_SESSION["rowUser"];
        $nombre = $rowUser['fName'];
        $changa = [];
        foreach($rowUser["publication"] as $pub) {
            $changa.push($pub["publication_name"]);
        }
        //$changa = json_decode($rowUser['publication']);
        $company = "";


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/principal.css" rel="stylesheet">
        <link href="../css/friends.css" rel="stylesheet">


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
                        <a class="navbar-brand fa fa-user" onclick="return log_out();">Log out</a>
                    </ul>
                    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <li class="active">
                                <a onclick="onNavigtionClick('Profile')"><i class="fa fa-fw fa-dashboard"></i>My Profile</a>
                            </li>
                            <li>
                                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i>Posts</a>
                            </li>
                            <li>
                                <a onclick="onNavigtionClick('Friends')"><i class="fa fa-fw fa-table"></i> Friends</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-desktop"></i>Programming is Fun</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="contenido col-md-10">
                    <div id="page_content">
                    <!-- Page Content here -->
                    </div>
            </div>
        </div>

         <!-- Scripts here -->
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/Profile.js"></script>
        <script src="../js/friends.js" text="text/javascript"></script>

    </body>

    </html>

<?php
        }
    else{
        header('Location: /webProyecto/views/Main.php');
    }
?>
