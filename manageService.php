<?php
require_once 'inc/dbcall.php';
$db = new Db();
//if not set
if (!isset($_SESSION['name'])) {
    $db->redirect('login.php');
}
//signout
if (isset($_GET['logout'])) {
    unset($_SESSION["name"]);
    $_SESSION["logoutmsg"] = "Successfully signed out";
    $db->redirect('login.php');
}
?>
<?php
$sql = "SELECT * FROM `jobposting` WHERE `createdBy`=" . $_SESSION['uniqueID'];
$result = $db->query($sql);
$numRows = $db->numRows($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jinjang Transformation Initiative</title>

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
        <link rel="stylesheet" type="text/css" href="css/datable.css">
    </head>
    <body id="page-top">
        <!-- Navigation
      //-->
        <nav class="navbar new navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logo4.png" height="45px"; width="250px";></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse dropdown-content" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
                        </li>
                        <?php // $_SESSION['usertype'];// USER TYpe = 1 member , 2= trainer     ?>

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="postJob.php">Post Job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#page-top">Manage Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="employerApplicationHistory.php">Manage Applications</a>
                            </li>

                        <!-- if member show this
                        <?php if ($_SESSION['usertype'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="registerSession.php">Register Session</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="viewHistoryMember.php">View Training History</a>
                            </li>
                        <?php endif; ?>
                      -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                              <p class="dropdown-item js-scroll-trigger" href="#"><strong><?php echo $_SESSION['name']; ?></strong></p>
                              <div class="dropdown-divider"></div>
                                <a class="dropdown-item js-scroll-trigger" href="editProfile.php">Edit Profile</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Portfolio Grid -->
<section class="bg-light" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><br>
              <?php if ($numRows > 0): ?>
                <h2 class="section-heading text-uppercase">Manage Jobs</h2><br><br>
              <?php else: ?>
              <h2>No Jobs Posted</h2><br><br>
            <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <table id="tdatable" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Edit Job</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($numRows > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['jobTitle']; ?></td>
                                    <td><?php echo $row['startTime']; ?></td>
                                    <td><?php echo $row['endTime']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td>
                                        <?php if($row['createdBy']==$_SESSION['uniqueID']): ?>
                                        <?php endif; ?>
                                        <a class="portfolio-link" data-toggle="modal" style="color: #b20000;"onclick="editJobModal(<?php echo $row['jobID']; ?>);" href="#portfolioModal1">Edit</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class=" modal-body">
                            <div id="content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './template/footer.php';
