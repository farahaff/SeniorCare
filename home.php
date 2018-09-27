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
                            <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
                        </li>

                        <?php if ($_SESSION['userType'] == "employer"): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="postJob.php">Post Job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="manageJobs.php">Manage Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="employerApplicationHistory.php">Manage Applications</a>
                            </li>
                          <?php endif; ?>

                        <?php if ($_SESSION['userType'] == "jobseeker"): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="searchJobs.php">Job Postings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="jobSeekerApplicationHistory.php">My Applications</a>
                            </li>
                        <?php endif; ?>

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

    <div class="container" id="aboutHome">

        <!-- About -->
        <section>
          <!---Welcome Alert-->
          <div class="row" id="msg">
              <div class="col-md-12">
                  <div class="alert alert-success alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Hi <strong><?php echo ucfirst($_SESSION['name']) ?>,</strong> Welcome back!
                  </div>
              </div>
          </div>
          <br>
          <!-- About -->
          <div class="container" id="">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">How You Can Help</h2><br>
                <h3 class="section-subheading text-muted">Education has an important role to play in the eradication of poverty. Unfortunately for many families living in poverty, education is a luxury they cannot afford. This is a great tragedy, as education should be a basic human right that must be met.
                  <br><br>
                  The effects of poverty had resulted in some children growing up in poverty stricken homes, suffering more frequent and persistent health problems compared to children who grow up under better financial circumstances.
                  Children raised under poverty noticeably, tend to miss school more often because of illness, level of stress at home, lack of child- care facilities, and unfortunately, sometimes, violence at home.
                  As our nation progresses, there needs to be intervention programmes for the poor to ensure they are not left behind.
                  <br><br>
                  Even though schooling is free here in Malaysia, those who live in poverty still cannot afford to pay for their children’s miscellaneous fees such as activities, textbooks and uniforms, and their meals. Now in this age and era, each child needs a computer, and these items that we take for granted are not cheap for those who are destitute.
                  <br><br>
                  Sadly, those who are destitute would rather send their children out to work, so that they can earn a living to support their parents and siblings. These children should remain in school, as it is proven that each year they remain in school their earning potential increases by 10-20%.
                  <br><br>
                  English may not be the most spoken language in the world, but it remains as the dominant language for business and has become almost a necessity for people to enter a global workforce. Its importance in the global market place therefore cannot be understated, as learning English really can change lives.
                  <br><br>
                  Hence, the literacy project was launched in December 2014, giving opportunities for the resident children to unlock their full potential and find meaningful careers in the future.
                  The children in the Jinjang community are especially weak in the foundational subjects of English, Maths and Science.
                  The Maths Numeracy Project for the children from Jinjang Utara then followed suit in early 2017.
                  <br><br>
                  We are committed to do what we can to improve the literacy and numeracy skills of those who are left behind.
                  <br><br>
                  Although some supporters have donated generously each year to charity, the needs of the poor cannot all be met. There are only so much we can do. Many households in destitute require financial aid for many things including tuition and remedial classes for subjects that they are weak in.
                  <br><br>
                  This is a small project, but one that must continue and sustain itself, so that it will have a greater impact on these children’s lives. We encourage you to join us in our effort in uplifting our communities and making a difference in their lives.
                  It stems from a simple conviction that we all share, that every child and every life matters, for our community and for the future of our nation.
                  <br><br>
                  “Life is not a competition. Life is about helping and inspiring others, so we can reach our full potential”


    </h3><hr><br><br>

                <div class="col-md-2" style="float:left">
                  <span class="fa-stack fa-4x">
                    <img class="img-fluid" src="img/ebiz.png" alt="" style="padding-bottom:20px">
                  </span>
                  <h4 class="service-heading" id="volunteer">E-Business</h4>
                </div>
                <div class="col-md-10 offset-md-2">
                  <p class="text-muted">In all poor communities, girls and women bear the brunt of poverty. When families struggle with getting enough food to eat,
                    or earn enough money to send their children to school, it is always the girls who find the last to eat and first to be kept home from school.
                    In some communities like Jinjang, the girls will be the target of vices, especially if they are not able to find jobs to help sustain their families.
                    In families with many children, the mothers struggle with finding jobs, as they still have very young children who need to be taken care of, at home.
                    Unable to leave the home or join the work force, they remain destitute and helpless. When you empower a woman, she can become a catalyst for positive change, whose success can benefit the family and even her community.
                  </p>
                </div><br><br><hr><br><br>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img class="img-fluid" src="img/supplies.png" alt="">
                </span>
                <h4 class="service-heading" id="#children">Children School Supplies</h4>
                <p class="text-muted">¬ We need school bags, school shoes, socks, books, stationery, etc that can be used by the children to start the school year.
                  Each year before Christmas (early December), we host a big Christmas event for the children from this community, where we provide games, songs and lunch for the children.
                  At the end of the party, we will distribute school bags, stationery and other essential items to encourage them to get the new year started
                </p>
              </div>
              <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img class="img-fluid" src="img/sponsor.png" alt="">
                </span>
                <h4 class="service-heading" id="sponsor">Sponsor a child</h4>
                <p class="text-muted">How the child sponsorship works:
                  Contact us to find out the details of needy children
                  Choose a child to sponsor
                  Sponsor at least RM150 per month which will cover the cost of school bus, daily lunch allowance and compulsory school fees
                  Alternately, your sponsorship can be pooled with other sponsors to support a child
                  By sponsoring a child, you get to see the impact your sponsorship has on the child and on the community
                </p>
              </div>
              <div class="col-md-4">
                <span class="fa-stack fa-4x">
                  <img class="img-fluid" src="img/volunteer.png" alt="">
                </span>
                <h4 class="service-heading" id="ebusiness">Volunteering</h4>
                <p class="text-muted" style="padding-top:10px">With your support we can: Help poor families send their children to school,
                  Help poor children in their studies to enable them to stay in school,
                  Help children learn new skills to be able to secure employment in the future
                  Help women build a better life for themselves, their families and their community
                  <br>Volunteer as a teacher: We need teachers who can teach Primary Maths and English to children from Jinjang. Our classes are on Saturdays from 2 pm to 5 pm, in HELP University, KPD,  Jalan Dungun, Kuala Lumpur
    </p>
              </div>

            </div>
            <hr>
          </div>
        </section>



<!-- Contact -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div><br><br>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once './template/homefooter.php';
