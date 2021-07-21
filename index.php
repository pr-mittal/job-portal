<!--writing  this php code to destroy session incase person forgets to logout-->
<?php session_start();
if(isset($_SESSION["activeUser"]))
{
    session_unset();session_destroy();
}?>
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Merriweather">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/signin-signup.js"></script>
    <link href="css/signin-signup.css" rel="stylesheet">
</head>
<body onload="signinForm.reset();signupForm.reset();forgotForm.reset()">
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
					<li class="btn btn-primary nav-item mr-2 mb-2 ml-2" data-toggle="modal" data-target="#signinModal">
					  Signin/Login
					</li>
					<li class="btn btn-primary nav-item mr-2 mb-2 ml-2" data-toggle="modal" data-target="#signupModal">
					  Signup
					</li>
					<li class="btn btn-primary nav-item mr-2 mb-2 ml-2" data-toggle="modal" data-target="#forgotModal">
					  Forgot Password
					</li>
				</ul>
			  </div>
			</div>
        </nav>
			<div id="carouselExampleCaptions w-100" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="pics/carousel3.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Contact From Home</h5>
					<p>See For Daily Work Employees from home.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="pics/carousel1.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Working Satisfaction.</h5>
					<p>Work by your own rules.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="pics/carousel2.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Rating Tracker</h5>
					<p>Get the job done with best in the field.</p>
				  </div>
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 " style="text-align:center">
				<span class="mainHeading">OUR SERVICES</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="card">
				  <img class="card-img-top" src="pics/cardService1.png" alt="Card image cap">
				  <div class="card-body">
					<p class="card-text">Worker Search</p>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card">
				  <img class="card-img-top" src="pics/cardService2.jpg" alt="Card image cap">
				  <div class="card-body">
					<p class="card-text">Get work</p>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card">
				  <img class="card-img-top" src="pics/cardService3.jpg" alt="Card image cap">
				  <div class="card-body">
					<p class="card-text">Post Work</p>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="card">
				  <img class="card-img-top" src="pics/cardService4.jpg" alt="Card image cap">
				  <div class="card-body">
					<p class="card-text">Give Ratings</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 " style="text-align:center">
				<span class="mainHeading">REACH US</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 card">
				<div class="card-body">
					<form id="complaintForm">
						<div class="form-group">
							<label for="contactComplaint">Email Id</label>
							<input type="text" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" class="form-control" name="contactComplaint" id="contactComplaint" maxlength="30" placeholder="example@xyz.com">
							<small id="contactComplaintErr"></small>
						</div>
						<div class="form-group">
							<label for="textComplaint">Message</label>
							<textarea  class="form-control" name="textComplaint" id="contactText" maxlength="50" placeholder="Max 50 characters"></textarea>
						</div>
						<input type="button" class="btn btn-primary" id="sendComplaint" value="Send">
					</form>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="card" id="addressCard" style="height:100%">
					<div class="card-body" style="height:100%">
						<div class="row">
							<div class="col-md-12"><h4>MPS.com</h4><p class="card-text">Find workers check their profile or get a job start working and pay your bills. At best place , At best prices and all this for free. </p></div>
						</div>
						<br><br>
						<div class="row">
							<div class="col-md-4 col-lg-3"><h5>Email:</h5></div>
							<div class="col-md-8 col-lg-8"><p class="card-text"><i class="fa fa-envelope" aria-hidden="true"></i> pranavmittalguest@gmail.com</p></div>
						</div>
						<div class="row">
							<div class="col-md-4 col-lg-3"><h5>Contact:</h5></div>
							<div class="col-md-8 col-lg-9"><p class="card-text" ><i class="fa fa-mobile" aria-hidden="true"></i> 941*****89</p></div>
						</div>
						<div class="row">
							<div class="col-md-4 col-lg-3">Address:</div>
							<div class="col-md-8 col-lg-8" ><p class="card-text"> <i class="fa fa-map-marker" aria-hidden="true" ></i> C-106,ARYABHATTA HOSTEL</p></div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 " style="text-align:center">
				<span class="mainHeading">MEET THE DEVELOPER</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6" style='height:100%'>
				<div class="card" style='height:100%'>
					<img src="pics/developer.JPG" height="100%" width="200px" alt="My image" style="margin:auto">
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h4>NAME</h4>
						<p class="card-text">Pranav Mittal</p>
						<h4>BRANCH</h4>
						<p class="card-text">ECE(2nd YEAR)</p>
						<h4>COUNTRY</h4>
						<p class="card-text">INDIA</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 " style="text-align:center">
				<span class="mainHeading">Meet My Mentor</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6" style="text-align:center">
					<img src="pics/mentor.jpg" height="100%" width="200px" alt="My image" >
			</div>
			
			<div class="col-md-6">
				<div class="card">
					<div class="card-body card-h-100">
						<h4>Name</h4>
						<p class="card-text">Rajesh Bansal</p>
						<h4>Specialisation</h4>
						<p class="card-text">Java(J2SE, J2EE), C++,PHP, Python, AngularJS, Android and counting</p>
						<h4>Contact</h4>
						<p class="card-text">98722-46056 </p>
						<p class="card-text"> <small>Do visit <a href="https://www.realjavaonline.com/">realjavaonline.com</a></small></p>
				  </div>
				</div>
			</div>
		</div>
			
	</div>
	<div id="footer">Made with <i class="fa fa-heart-o" aria-hidden="true" style="color:red;font-weight:bolder"></i> by Pranav while at Bangalore Computer Classes, Bathinda</div>
	
	
	
	
	
	
	
<!--signin-->
	<!-- Signin Modal -->
	<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="signin-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="signinTitle">Login window</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="signinClose">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="container">
				<form name="signinForm" id="signinForm">
					<div class="form-row" id="emailDiv">
						<div class="col-md-12 form-group">
							<label for="">Email/Mobile no</label>
							<input type="text" class="form-control uid" id="signinUid">
							<span class="errmsg"></span>
						</div>
					</div>
					<div class="form-row" id="pwdDiv">
						<div class="col-md-12 form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" id="signinPwd" autocomplete="new-password" maxlength="15">
							<span class="errmsg"></span>
						</div>
					</div>
                    <div class="form-row" id="pwdDiv">
						<div class="col-md-12 form-group">
<!--							<a href="#forgotModal">Forgot Password?</a>-->
                            <a href="#" data-toggle="modal" data-target="#forgotModal" id="forgotSigninLink">Forgot Password?</a>
						</div>
					</div>
				</form>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="button" class="btn btn-primary" value="Signin" disabled id="signinBtn">
		  </div>
		</div>
	  </div>
	</div>
	<!--Signup Modal -->
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="signup-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="signupTitle">Signup</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="container">
				<form name="signupForm" id="signupForm">
					<div class="form-row">
						<div class="col-md-12 form-group">
							<label for="">Mobile no</label>
							<input type="text" class="form-control uid" name="uid" id="signupUid">
							<span class="errmsg" id="signupUidErr"></span>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="pwd" id="signupPwd" autocomplete="new-password" maxlength="15">
							<span class="errmsg"></span>
						</div>
					</div>
                    <div class="form-row">
						<div class="col-md-12 form-group">
							<select name="category" id="signupCategory">
                                <option value="CITIZEN">CITIZEN</option>
                                <option value="WORKER">WORKER</option>
                            </select>
							<span class="errmsg"></span>
						</div>
					</div>
                    
                    
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="button" class="btn btn-primary"  value="Signup" id="signupBtn" disabled>
		  </div>
		  </form>
		</div>
	   </div>
	  </div>
     </div>
    </div>
<!--    Forgot modal-->
    <div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="forgot-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="forgotTitle">Forgot Password</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="container">
				<form name="forgotForm" id="forgotForm">
					<div class="form-row">
						<div class="col-md-12 form-group">
							<label for="">Email/Mobile no</label>
							<input type="text" class="form-control uid" id="forgotUid">
							<span class="errmsg"></span>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 form-group">
							<label for="">Password</label>
							<input type="text" class="form-control password" id="forgotPwd" disabled maxlength="15">
							<span class="errmsg"></span>
						</div>
					</div>
				</form>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Forgot Password"  id="forgotBtn">
		  </div>
		</div>
	  </div>
	</div>
</body>
</html>