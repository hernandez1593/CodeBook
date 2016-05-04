<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Proyecto Web</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../webProyecto/css/index.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-body">
                    <ul class="nav nav-tabs final-login">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Sign In</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Join us!</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <div class="innter-form">
                                <form method="POST" action="php/Login.php?" class="sa-innate-form" onsubmit="return validateLogin()">
                                    <label>Username</label>
                                    <input type="text" name="user">
                                    <label>Password</label>
                                    <input type="password" name="pass">
                                    <button type="submit">Sign In</button>
                                    <a href="">Forgot Password?</a>
                                </form>
                            </div>
                            <div class="social-login">
                                <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div id="error-login" class="alert alert-danger alert-dismissable hide-me">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                            </div>
                        </div>

                        <div id="sectionB" class="tab-pane fade">
                            <div class="innter-form">
                                <form method="POST" action="php/Person.php?action=insert" class="sa-innate-form" onsubmit="return validateRegistryForm()">
                                    <label>Identification</label>
                                    <input type="text" id="id" name="id">
                                    <label>First Name</label>
                                    <input type="text" id="fName" name="fName">
                                    <label>Last Name</label>
                                    <input type="text" id="lName" name="lName">
                                    <label>Email Address</label>
                                    <input type="text" id="email" name="email">
                                    <label>Username</label>
                                    <input type="text" id="username" name="user">
                                    <label>Password</label>
                                    <input type="password" id="pass" name="pass">
                                    <label for="selectUser">Type of User:</label>
                                    <select class="form-control" id="selectUser" name="typeUser">
                                        <option>Student</option>
                                        <option>Teacher</option>
                                    </select>
                                    <label for="selectGender">Sex:</label>
                                    <select class="form-control" id="selectGender" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>

                                    <label>Admission date</label>
                                    <input type="text" id="admission-date" name="admission">

                                    <button type="submit">Join now</button>
                                    <p>By clicking Join now, you agree to hifriends's User Agreement, Privacy Policy, and Cookie Policy.</p>
                                </form>
                                <div id="error-sign-up" class="alert alert-danger alert-dismissable hide-me">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/index.js" type="text/javascript"></script>
</body>

</html>
