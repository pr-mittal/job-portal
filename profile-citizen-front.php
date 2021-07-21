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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/profile-citizen-front.css" rel="stylesheet">
    <script src="js/profile-citizen-front.js"></script>
    <script src="js/cities.js"></script>
</head>
<body onload="document.citizen.reset();autoFill();">
<!--<body>-->
<!--    navbar-->
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
					<li><a class="btn btn-primary nav-item mr-2 mb-2 ml-2" href="dash-citizen.php">
					   Go Back
                        </a></li>
				</ul>
			  </div>
            
            </div>
        </nav>
    <div id="spinnerDiv">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <form name="citizen" action="php/citizen/profile-citizen-process.php" enctype="multipart/form-data" method="post" id="citizen">
        <div class="container">
            <input type="hidden" id="hidden1">
            <div class="form-row">
                <div class="col-md-12 bg-primary" style="font-size:3vh;color:white;text-align: center">
                    <b>Citizen Profile</b>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <center>
                        <div id="outer">
                            <img src="" alt="Select file" onerror=this.src='pics/nopic.png' id="profilePic" style="width:20vh;height:20vh">
                            <!--img src="pics/camera.jpg" id="profileDecor"-->
                            <input type="file" id="profilePicFile" name="pic" onchange='showpreview(this)' id="profileFile">
                        </div>
                    </center>
                </div>

            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <label for="uid">UserID</label>
                    <input type="text" name="uid" class="form-control" required id="uid" value='<?php echo $_SESSION["activeUser"]?>' readonly>
                    <span id="errmsg"></span>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-6 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control" id="contact" required>
                </div>

            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <label for="address">Address</label>
                    <textarea type="text" name="address" class="form-control" id="address" required></textarea>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <select class="custom-select" id="city" name="city">
                        <option selected>Choose...</option>
                      </select>
<!--                    <input type="text" name="city" class="form-control" id="city">-->
                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label>
                    <select class="custom-select" id="state" name="state">
                        <option selected>Choose...</option>
<!--                    <input type="text" name="state" class="form-control" id="state">-->
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="col-md-6 form-group">
                    <label for="fecthDetails">Fetch</label>
                    <input type="button" value="fetch-profile" class="form-control btn-primary" id="fetchDetails">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="button" value="Save" class="form-control btn-primary" onclick="validateMyForm();">
                </div>
            </div>
        </div>
    </form>
</body>
</html>