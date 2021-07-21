<?php session_start();
if(isset($_SESSION["activeUser"])!=true)
  header("location:index.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Document</title>
<!--	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/citizen-worker-search.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/worker-search.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body ng-app="myModule" ng-controller="myController" ng-init="getCategories();">
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
					<li class="nav-item"><a class="btn btn-primary mr-2 mb-2 ml-2" href="dash-citizen.php">
					   Go back
                        </a></li>
				</ul>
		</div>
      </div>
  </nav>
	<hr><hr>
	<div id="searchResult">
		<div id="sortSearch">
			<div class="container">
				<div class="form-row">
					<div class="col-md-4 form-group">
						<select class="custom-select" ng-model="selectedCategory" ng-options="obj.category for obj in categoryOption" ng-change="getCities();"></select>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 form-group">
						<select class="custom-select" ng-model="selectedCity" ng-options="obj.city for obj in cityOption"></select>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 form-group">
						<button class="btn btn-dark" ng-click="doSearch();">search</button>
					</div>
				</div>
			</div>
		</div>
		<div id="searchResultLabel" style="text-align: center;font-size: 2rem">RESULTS</div>
		 <div id="searchResultBody">
			<!--      modal for worker profile-->
			 <!--			[{"uid":"prnav","email":"2001pranavmittal@gmail.com","cnumber":"987283289","wname":"Pranav","firmshop":"pvt ltd","city":"bathinda","address":"sarabha nagar","stat":"punjab","category":"xyz","spl":"work","exp":"5","otherinfo":"no info","apic":"prnav.JPG","ppic":"prnav.JPG"}]-->
			<div class="modal fade" ng-model="obj" id="workerProfileModal" tabindex="-1" role="dialog" aria-labelledby="workerProfileModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header bg-dark">
					<h5 class="modal-title " id="workerProfileModalLabel" style="color: white">PROFILE:{{obj.wname}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					  <div class="container">
						  <div class="row">
							<div class="col-md-12 profile-img-div">
								<img src="uploads/worker/{{obj.ppic}}" class="profile-img-top" alt="NO PIC" onerror="if (this.src != 'pics/nopic.png') this.src = 'pics/nopic.png';">
							</div>
						  </div>
						  <div class="row">
							  <div class="col-md-6">NAME:<div class="form-control">{{obj.wname}}</div></div>
							  <div class="col-md-6">MOBILE:<div class="form-control">{{obj.cnumber}}</div></div>
						  </div>
						  <div class="row">
							  <div class="col-md-6">FIRM:<div class="form-control">{{obj.firmshop}}</div></div>
							  <div class="col-md-6">CITY:<div class="form-control">{{obj.city}}</div></div>
						  </div>
						  <div class="row">
							  <div class="col-md-6">STATE:<div class="form-control">{{obj.state}}</div></div>
							  <div class="col-md-6">SPECIALITY:<div class="form-control">{{obj.spl}}</div></div>
						  </div>
						  <div class="row">
							  <div class="col-md-6">EXPERINCE:<div class="form-control">{{obj.exp}}</div></div>
							  <div class="col-md-6">OTHER:<div class="form-control">{{obj.otherinfo}}</div></div>
						  </div>
						  <div class="row">
							<div class="col-md-12 profile-img-div">
								AADHAR:
								<img src="uploads/worker/{{obj.apic}}" class="profile-img-top" alt="NO PIC">
							</div>
						  </div>
					  </div>
				  </div>
				  <div class="modal-footer container">
					<button type="button" class="btn btn-success" style="width:100%;height:100%" class="workerProfileBtn">CHAT</button>
				  </div>
				</div>
			  </div>
			</div>
		  <div>
			<div class="container">
			  <div class="row">
				

<!--[{"uid":"aaxxyy","email":"abc@gmail.com","cnumber":"9417342289","wname":"mmmadbbddf","firmshop":"mmm","city":"Haryana","address":"aaaaaaaaaa","stat":"","category":"electronics","spl":"ubd","exp":"5","otherinfo":"kjdsbk","apic":"aaxxyy.ico","ppic":"aaxxyy.ico","rating":"25","count":"5"}]-->

					<div class="card col-md-3 col-sm-6" data-toggle="modal" data-target="#workerProfileModal" ng-click="displayModal($index)" ng-repeat="obj in cardArray">
						<div class="card-img-div">
							<img src="uploads/worker/{{obj.ppic}}" class="card-img-top" alt="NO PIC" onerror="if (this.src != 'pics/nopic.png') this.src = 'pics/nopic.png';">
						</div>
						<div class="card-body" style="margin: auto">
							<div class="stars-outer" ng-show="{{obj.count}}">
							  <div class="stars-inner"  style="width:{{obj.rating/obj.count*20}}%"></div>
							</div>
							<p class="card-text" style="text-align: center">NAME:{{obj.wname}}</p>
							<p class="card-text" style="text-align: center">EXPERIENCE:{{obj.exp}}</p>
							<p class="card-text" style="text-align: center">SPECIALIZACTION:{{obj.spl}}</p>
	<!--							<button class="btn btn-primary" style="margin: auto" disabled>VIEW-via click</button>-->
						</div>
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	<hr><hr>
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
	<div id="serverCallModal" ng-style="coverModal">
		<div class="spinner-border text-primary" role="status" id="spinner">
		  <span class="sr-only">Loading...</span>
		</div>
	</div>
</body>
</html>