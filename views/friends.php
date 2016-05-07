<div class="row">
    <div class="col-md-12">
        <h2>Mis amigos</h2>
        <hr>
    </div>
</div>

<div clas="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>My Friends</h2></div>
                    <div id="my-friends" class="panel-body friend-list">
                        <div class="col-md-12 ">
                            <div class="grid-item grid-item--height2 grid-item--width2 ">


                            </div>
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
</div>
