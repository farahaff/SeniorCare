<?php
require_once("inc/dbcall.php");
$db = new Db();
//if already logged in redirect to home
if (isset($_SESSION['name'])) {
    $db->redirect('home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jinjang Reformation Initiative</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="css/agency.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation
      //-->
        <nav class="navbar new navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo4.png" height="45px"; width="250px";></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#page-top">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact -->
        <section id="signup">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Login</h2><br/>
                    </div>
                </div>
                <?php
                if (isset($_POST['login'])) {
                    if ($_POST['uname']!=""&&$_POST['pwd']!=""){
                    if ($db->authenticate($_POST['uname'], $_POST['pwd'], "") == "jobseeker") {
                        $db->redirect('home.php');
                        $_SESSION['userType']='jobseeker';
                    } elseif ($db->authenticate($_POST['uname'], $_POST['pwd'], "") == "employer") {
                        $db->redirect('home.php');
                        $_SESSION['userType']='employer';
                    }else {
                        echo "<div class='row alert alert-success' >
                    <div class='col-lg-12'>"
                        . $_SESSION['msg'] .
                        "</div></div>";
                    }
                } else {
                        echo "<div class='row alert alert-success' >
                    <div class='col-lg-12'>Username or password cannot be empty.</div></div>";
                    }
                }

                ?>
                <!-- if session has a msg  change later to single msg!-->

                <?php if (isset($_SESSION['logoutmsg'])): ?>
                  <!--
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $_SESSION['logoutmsg']; ?>
                    </div>
                  -->
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12 offset-md-3">
                        <form id="contactForm" method="POST" action="" name="sentMessage" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="uname" type="text" placeholder="Username*" required data-validation-required-message="Please enter your username.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="pwd" type="password" placeholder="Password*" required data-validation-required-message="Please enter your password.">
                                        <p class="help-block text-danger"></p>
                                        <a href="signup.php" style="float:right;color: #b20000;">New user? Click here to sign up.</a><br>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <br/>
                                        <div id="success"></div>
                                        <button name="login"  class="btn btn-primary btn-xl text-uppercase" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <?php
        require_once 'template/welfooter.php';
