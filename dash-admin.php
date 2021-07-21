<?php session_start();
if(isset($_SESSION["activeUser"])!=true)
  header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Document</title>
<!--	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
<!--    <script src="js/angular.min.js"></script>-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/dash-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body >
<!--        navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#" id="logoHref">
                <img src="pics/logo.JPG" class="d-inline-block align-top" alt="ERROR" loading="lazy" onerror=this.src='pics/camera.jpg' id="logoImg">
                EasyWork.com
              </a>
              <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
				
                <ul class="navbar-nav">
                    <li class="nav-item" style="color:white">WELCOME,<?php echo $_SESSION["activeUser"]?></li>
					<li class="nav-item"><a class="btn btn-primary mr-2 mb-2 ml-2" href="signout.php">
					   Logout
                        </a></li>
				</ul>
		      </div>
            </div>
        </nav>
                

<!--        grid for cards-->
        <div class="container" id="contentSite">
            <div class="row" >
                <div class="col-md-4 col-sm-6">
            <!--        card for profile-->
                    <a href="user-manager-front.php">
                        <div class="card" >
                          <img src="#" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                          <div class="card-body">
                            <h5 class="card-title">USER MANAGEMENT</h5>
                            <p class="card-text">Click to see all profiles.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>         
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
              <!--        card to logout-->
                    <a href="signout.php">
                        <div class="card" >
                          <img src="#" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                          <div class="card-body">
                            <h5 class="card-title">Logout</h5>
                            <p class="card-text">log out.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div id="footer">
            <!--    page numbers-->
            <nav aria-label="Page navigation example" id="pagenumbernav">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>

            <div class="row">
                <div id="essay" class="col-md-7">
                    <span >
                        <h1>Hello,May I Help You ?</h1>
                    </span>
                    <p id="contentEssay">Our purpose is to takek user information and to share it publicaly <b>with user consent</b> so that more people learn about you in a decentralised way. After seeing each others details one can contact each other on an indiviual level and fix a price for the work. Here our only aim is to provide you a free/public platform for benefit of the user.</p>
                </div>
                <div id="quickLinks1" class="col-md-5">
                  <div class="row">
                    <div class="col-sm-6" style="text-align:center">
                      <h2>QUICK-LINKS</h2>
                      <ol>
                        <a><li>User Data and Privacy</li></a>
                        <a><li>Get Premium</li></a>
                        <a><li>What We Do</li></a>
                        <a><li>Get Started</li></a>
                    </ol>
                    </div>
                    <div class="col-sm-6" id="quickLinks2" style="text-align:center">
                      <ol style="list-style: none">
                        <li class='links'><a href="#" class="fa fa-twitter">twitter</a></li>
                        <li class='links'><a href="#" class="fa fa-facebook">facebook</a></li>
                        <li class='links'><a href="#" class="fa fa-instagram">insta</a></li>
                        <li class='links'><a href="#" class="fa fa-linkedin">linkedIn</a></li>
                        <li class='links'><a href="#" class="fa fa-youtube">youtube</a></li>
                      </ol>
                    </div>
                  </div>
                    
                </div>
            </div>
            <div class="row">
              <div class="col-md-12" style="text-align:center">Made with <i class="fa fa-heart-o" aria-hidden="true" style="color:red;font-weight:bolder"></i> by Pranav while at Bangalore Computer Classes, Bathinda</div>
            </div>
        </div>
        
    
    </body>
</html>