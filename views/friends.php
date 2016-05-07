<?php
    session_start();

    //chmod("/php/", 0755);
    //cho substr(sprintf('%o', fileperms('../PHP'), -4);

    if (isset( $_SESSION["rowUser"]))
    {

        $rowUser = $_SESSION["rowUser"];
        $nombre = $rowUser['fName'];
        $type = $rowUser['typeUser'];


?>
    <div class="row">
        <div class="col-md-12">
            <h2>Mis amigos</h2>
            <hr>
        </div>
    </div>

    <div id="modalP" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-6">
                        <div id="modalM" class="col-md-3">

                        </div>

                    </div>
                    <div class="col-md-6">
                        <h4 id="modalName"></h4>
                    </div>
                    <div class="col-md-6">
                        <h4 id="modalEmail"></h4>

                    </div>
                    <div class="col-md-6">
                        <h4 id="modal"></h4>
                    </div>
                    <div class="col-md-6">
                        <div id="modalM" class="col-md-3">

                        </div>

                    </div>
                    <div class="col-md-6">
                        <h4 id="modalName"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div clas="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2 onclick="loadMyFriends(<?php echo $type; ?>)">My Friends</h2></div>
                        <div id="my-friends" class="panel-body friend-list">

                            <!--  <div class="grid-item grid-item--height2 grid-item--width2 ">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-5">
                                    <img class="img-responsive img-rounded" max-width="100%" src="../images/teddy.png" alt="">
                                </div>
                                <div class="col-md-6">
                                    <h4>changa</h4>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-lg center-block" onclick="return validateSearch();">
                                        <span class="glyphicon glyphicon-question-sign"></span> Info
                                    </button>
                                </div>


                            </div>







                        </div> -->


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Search for a new friend</h2></div>
                    <div id="add-friend" class="panel-body text-center">
                        <form id="form-search'" method="POST">
                            <input id="box-search-name" class="from-control input-lg" type="text" name="name" placeholder="Name">
                            <button type="button" class="btn btn-primary btn-lg" onclick="return validateSearch();">
                                <span class="glyphicon glyphicon-search"></span> Search
                            </button>
                        </form>
                        <hr>
                        <div id='friend-result'>

                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Solicitudes Pendientes</h2></div>
                    <div id="friend-requests" class="panel-body">
                        <label class="label-size">Here are going to be your friend requests</label>
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
