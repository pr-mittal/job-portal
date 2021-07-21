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
    <script src="js/angular.min.js"></script>
    <script src="js/citizen-search-by-worker.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/citizen-search.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body ng-init="setCategories();" ng-app="workerModule" ng-controller="workerController">
<hr><hr>
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
					<li class="nav-item"><a class="btn btn-primary mr-2 mb-2 ml-2" href="dash-worker.php">
					   Go back
                        </a></li>
				</ul>
			  </div>
      </div>
  </nav>
  <div id="searchResult">
      <div id="searchResultLabel" style="text-align: center;font-size: 2rem">RESULTS</div>
      <div id="searchResultBody">
  <!--            HERE ALL THE SEARCH RESUTS COME.-->
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <select class="custom-select" ng-options="obj.category for obj in categoryOption" ng-model="selectedCategory" ng-change="setCities();">
              </select>

              <!--   filtter only the cities whose category match the selecedCategory-->
              <select class="custom-select" ng-options="obj.city for obj in cityOption" ng-model="selectedCity">
              </select>
            </div>
            <div class="col-md-4"><button class="btn btn-primary" ng-click="getRequirements()">Search</button></div>
          </div>
        </div>
    </div>
  </div>
<hr><hr>
<!--cards showing works of ths workers category in database-->
  <div class="container">
    <div class="row">
        <!-- [{"rid":"17","cust_uid":"prnav","category":"Refrigirator Re","problem":"xcfghjk","location":"Working","city":" Basar ","state":"Arunachal Pradesh","dop":"2020-07-03"}]-->
        <div class="card col-md-3 col-sm-6" ng-repeat="obj in requirements" style="padding:10px;margin-right:5px;margin-left: 5-px;" >
          <div class="card-body col-md-12" style="text-align: center">
            <h5 class="card-title">PROBELM:<b>{{obj.problem}}</b></h5>
            <p class="card-text">LOCATION:<b>{{obj.location}}</b></p>
            <p class="card-text">CITY:<b>{{obj.city}}</b></p>
            <p class="card-text">STATE:<b>{{obj.state}}</b></p>
            <p class="card-text">Last Date:<b>{{obj.lastDate}}</b></p>
          </div>
          <div class="col-md-12" style="text-align: center;margin-top: auto">
            <button class="btn btn-primary" ng-click="getCitizenDetail(obj.cust_uid)" data-toggle="modal" data-target="#detailModal">GET Details</button>
          </div>
        </div>
      </div>
  </div>
<!--  MOdal to display citizen detail-->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title " id="" style="color: white">DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body container" ng-repeat="obj in citizenDetail">
          <!-- [{"uid":"aaxxyy","name":"Pranav","contact":"9876543210","address":"near nh7","city":" Karnah ","state":"Jammu & Kashmir","pic":"","email":"abc@gmail.com"}]-->
          <div class="profile-img-div">
            <img class="profile-img-top" src="uploads/citizen/{{obj.pic}}" alt='NO PIC'>
          </div>
          <div class="row container">
            <div class="col-md-4">NAME:</div><div class="col-md-8 form-control">{{obj.name}}</div>
            <div class="col-md-4">ADDRESS:</div><div class="col-md-8 form-control">{{obj.address}},{{obj.city}},{{obj.state}}</div>
            <div class="col-md-4">CONTACT:</div><div class="col-md-8 form-control">{{obj.contact}}</div>
          </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-6"><button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%">Close</button></div>
        </div>
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

<div id="serverCallModal" ng-style="coverModal">
		<div class="spinner-border text-primary" role="status" id="spinner">
		  <span class="sr-only">Loading...</span>
		</div>
</div>
</body>

</html>