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
    <link href="css/profile-worker-front.css" rel="stylesheet">
    <script src="js/profile-worker-front.js"></script>
    <script src="js/cities.js"></script>
	<script src="js/categories.js"></script>
</head>
<!--worker is the form name na we have reset its value-->
<body onload="document.worker.reset();autoFill();">
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
					<li><a class="btn btn-primary nav-item mr-2 mb-2 ml-2" href="dash-worker.php">
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
    <form name="worker" action="php/worker/profile-worker-process.php" enctype="multipart/form-data" method="post" id="worker">
        <div class="container">
            <input type="hidden" id="hiddenp">
            <input type="hidden" id="hiddena">
            <div class="form-row">
                <div class="col-md-12 bg-primary" style="font-size:3vh;color:white;text-align: center">
                    <b>Worker Profile</b>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <center>
                        <div id="outer">
                            <img src="" alt="Select file" onerror=this.src='pics/nopic.png' id="profilePic" style="width:20vh;height:20vh">
                            <!--img src="pics/camera.jpg" id="profileDecor"-->
                            <input type="file" id="profilePicFile" name="ppic" onchange='showpreview(this)'>
                        </div>
                    </center>
                </div>

            </div>
            <div class="form-row">
<!-- pattern="^[a-zA-Z0-9]*$" oninvalid="setCustomValidity('ENTER A VALID UID')" onchange="try{setCustomValidity('')}catch(e){}"-->
                <div class="col-md-4 form-group">
                    <label for="uid">UserID</label>
                    <input type="text" name="uid" class="form-control" id="uid" required value='<?php echo $_SESSION["activeUser"]?>' readonly required>
                    <span id="errmsg"></span>
                </div>
                <div class="col-md-8 form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="example@xyz.com" id="email" maxlength="30">
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-6 form-group">
                    <label for="wname">Name</label>
                    <input type="text" name="wname" class="form-control" id="wname" placeholder="firstName Lastname" required pattern="^\w+( \w+)*$" oninvalid="setCustomValidity('Enter Name')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="cnumber">Contact/Mobile Number</label>
                    <input type="text" name="cnumber" class="form-control" id="cnumber" required pattern="^[6-9]{1}[0-9]{9}$" oninvalid="setCustomValidity('Enter valid 10 digit mobile-number')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>

            </div>
            <div class="form-row">

                <div class="col-md-6 form-group">
                    <label for="firmshop">Your Firm/Shop</label>
                    <input type="text" name="firmshop" class="form-control" id="firmshop">
                </div>
                <div class="col-md-6 form-group">
                    <label for="category">Category</label>
					<select name="category" class="custom-select" id="category">
						<option value="">CHOOSE..</option>
					</select>
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
<!--                    <input type="text" name="city" class="form-control" id="city">-->
                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label>
                    <select class="custom-select" id="state" name="stat">
                        <option selected>Choose...</option>
                      </select>
<!--                    <input type="text" name="state" class="form-control" id="state">-->
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="exp">Experience</label>
                    <input type="number" class="form-control" name="exp" id="exp" required value="0">
                </div>
                <div class="col-md-6 form-group">
                    <label for="spl">Specialization</label>
                    <input type="text" class="form-control" name="spl" id="spl">
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <label for="otherinfo">Other Info</label>
                    <textarea type="text" name="otherinfo" class="form-control" id="otherinfo"></textarea>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="aadharPicFile">Upload Aadhar Card</label>
                    <input type="file" class="form-control" value="Upload Aadhar Card" id="aadharPicFile" name="apic" onchange='showpreview(this)'></div>
                <div class="form-group col-md-6"><img src="" alt="Select file" onerror=this.src='pics/nopic.png' id="aadharPic" style="width:100%"></div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <input type="button" value="Save" class="form-control btn-primary" onclick="validateMyForm();">
                </div>
                <div class="col-md-6 form-group">
                    <input type="button" value="fetch-profile" class="form-control btn-primary" id="fetchDetails">
                </div>
            </div>
        </div>
    </form>
</body>
</html>