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
	<script src="js/cities.js"></script>
	<script src="js/categories.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/dash-citizen.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/dash-citizen.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body onload="postWorkForm.reset()" ng-app="citizenModule" ng-controller="citizenController">
<!--      to remove error of Layout was forced before the page was fully loaded. -->
      <script>0</script>
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
                <a href="profile-citizen-front.php">
                    <div class="card" style="height:100%;">
                      <img src="pics/editProfile.png" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                      <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Click to check your profile and save changes.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>         
                </a>
            </div>
            
            <div class="col-md-4 col-sm-6">
        <!--        card for post work-->
                <div data-toggle="modal" data-target="#postModal" onclick="$('#fetchPost').click()" style="height:100%;">
                    <div class="card" style="height:100%;">
                      <img src="pics/postWork.png" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                      <div class="card-body">
                        <h5 class="card-title">Post Work</h5>
                        <p class="card-text">Click to check your post work and save changes.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
        <!--        card to find worker-->
        <a href="citizen-worker-search.php">
              <div class="card" style="height:100%;">
                <img src="pics/findWorker.jpg" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                <div class="card-body">
                  <h5 class="card-title">Find Worker</h5>
                  <p class="card-text">Check worker's posts.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
          </a>
            </div>
            <div class="col-md-4 col-sm-6">
        <!--        card to rate worker -->
                
                    <div class="card" data-toggle="modal" data-target="#ratingModal" onclick="$('#fetchRating').click()" style="height:100%;">
                      <img src="pics/rateWorker.jpg" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                      <div class="card-body">
                        <h5 class="card-title">Rate Worker</h5>
                        <p class="card-text">See requests for ratings.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                
            </div>
            <div class="col-md-4 col-sm-6">
        <!--        card to change Password -->
                
                    <div class="card" data-toggle="modal" data-target="#changepwdModal" style="height:100%;">
                      <img src="pics/changePassword.webp" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                      <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                
            </div>

			<div class="col-md-4 col-sm-6">
        <!--        card to see past requests -->
                
                    <div class="card" data-toggle="modal" data-target="#prevPostModal" onclick="$('#fetchPrevPost').click()" style="height:100%;">
                      <img src="pics/requiremenManager.png" class="card-img-top" alt="..." onerror=this.src='pics/camera.jpg'>
                      <div class="card-body">
                        <h5 class="card-title">Requirement Manager</h5>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                
            </div>
        </div>
        </div>
        <!-- Modal to post request for work-->
        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title " id="postModalLabel" style="color: white">Post Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="postWorkForm" name="postWorkForm">
                    <div class="container">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="uid">UID</label>
                                <input type="text" name="uidPost" id="uidPost" class="form-control" required readonly value='<?php echo $_SESSION["activeUser"];?>'>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="category">Category</label>
                                <select name="categoryPost" id="category" class="custom-select">
									<option value="" selected>CHOOSE..</option>
								</select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="description">Work Description</label>
                                <input type="text" name="descriptionPost" id="descriptionPost" class="form-control" maxlength="50">
                            </div>
                        </div>
						<div class="form-row">
							<div class="col-md-6 form-group">
                                <label for="state">State</label>
                                <select name="statePost" id="state" class="custom-select">
								<option value="" selected>CHOOSE..</option>
								</select>
							</div>
							<div class="col-md-6 form-group" >
								<label for="category">City</label>
								<select name="cityPost" id="city" class="custom-select">
									<option value="" selected>CHOOSE..</option>
								</select>
							</div>
						</div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="address">Address</label>
                                <textarea  name="addressPost" id="addressPost" class="form-control" maxlength="50"></textarea>
                            </div>
                        </div>
						
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="postWork">Post task</button>
                <button type="button" class="btn btn-primary" id="fetchPost">Fetch Details</button>
              </div>
            </div>
          </div>
        </div>
		<!--Modal for rating-->
		<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title " id="ratingModalLabel" style="color: white">Rating Requests</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             	<!--stars for citizen to rate-->
<!--                  ng-repeat="obj in ratings"-->
				<div class="row" ng-repeat="obj in ratingDetails">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        ID:{{obj.workerUid}}
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8" id="stars" style="text-align:center">

                            <!--uicode for filles star is /f005,emply /f006-->
                            <i class="fa fa-star-o star" aria-hidden="true" ng-click="setStar($event.currentTarget,$index,1);"></i>
                            <i class="fa fa-star-o star" aria-hidden="true" ng-click="setStar($event.currentTarget,$index,2);"></i>
                            <i class="fa fa-star-o star" aria-hidden="true" ng-click="setStar($event.currentTarget,$index,3);"></i>
                            <i class="fa fa-star-o star" aria-hidden="true" ng-click="setStar($event.currentTarget,$index,4);"></i>
                            <i class="fa fa-star-o star" aria-hidden="true" ng-click="setStar($event.currentTarget,$index,5);"></i>
<!--                            <input type="hidden" value="0" id='hiddenRating'>-->
                          </div>
    <!--					<button type="button" class="btn btn-primary col-md-3 ratingBtn" >Submit</button>-->
                            <button type="button" class="btn btn-primary col-md-4 " ng-click="setRating($index,obj.workerUid,'<?php echo $_SESSION["activeUser"];?>',$index);" >Submit</button>
                      </div>
                  </div>
                  </div>
                  <div class="row" ng-show="!ratingDetails.length">
                    <div class="col-md-12" style="text-align:center">No Ratings to show.</div>
                  </div>
              </div>
              <div class="modal-footer">
                <div class="row" style="width:100%">
                  <div class="col-md-4">CITIZEN UID:</div>
                  <div class="col-md-8"><input type="text" class="form-control" ng-model="ratingCitizenUid" style="width:100%" readonly ng-init="ratingCitizenUid='<?php echo $_SESSION["activeUser"];?>'"></div>
				</div>
                <div class="row" style="width:100%">
                  <div class="col-md-6"><button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%">Close</button></div>
                  <div class="col-md-6"><button type="button" class="btn btn-primary" id="fetchRating" style="width:100%" ng-click="getRating();">Fetch Rating</button></div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--		modal to change password-->
      <div class="modal fade" id="changepwdModal" tabindex="-1" role="dialog" aria-labelledby="changepwdModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title " id="changepwdModalLabel" style="color: white">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form name="changepwdForm" id="changepwdForm">
                  <div class="container">
                    <div class="form-row">
                      <div class="col-md-12 form-group">
                        <label for="changepwdUid">Citizen UID</label>
                        <input type="text" class="form-control" name="uid" id="changepwdUid" readonly value='<?php echo $_SESSION["activeUser"];?>'>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 form-group">
                        <label for="changepwdPrev">Previous Password:</label>
                        <input type="password" class="form-control" name="previous" id="changepwdPrev" maxlength="15">
                        <span class="errmsg">*</span>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 form-group">
                        <label for="changepwdNew">New Password</label>
                        <input type="password" class="form-control" name="new" id="changepwdNew" maxlength="15">
                        <span class="errmsg">*</span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="changepwdBtn">CHANGE</button>
              </div>
            </div>
          </div>
        </div>
<!--		modal to see past posted work-->
		<div class="modal fade" id="prevPostModal" tabindex="-1" role="dialog" aria-labelledby="prevPostModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title " id="prevPostModalLabel" style="color: white">Past Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table style="width:100%;height:100%">
<!--[{"rid":"13","cust_uid":"lmao","category":"Chimne Servicin","problem":"extra","location":"@home","city":" Bathinda ","state":"Punjab"}]-->
                  <tr style="width:100%;">
                    <th>CATEGORY</th><th>PROBLEM</th><th>LOCATION</th><th></th>
                  </tr>
                  <tr ng-repeat="obj in prevPost" style="width:100%;">
                    
                    <td>{{obj.category}}</td>
                    <td>{{obj.problem}}</td>
                    <td>{{obj.location}}<br><small>At {{obj.city}},{{obj.state}}</small></td>
                    <td><button style="width:100%;height:100%" class="btn btn-primary" ng-click="doDeletePost($index);">DELETE</button></td>
                  </tr>
                <tr ng-show="!prevPost.length" ><td colspan="4"  style="text-align:center">No Past requirements to show.</td></tr>
                </table>
              </div>
              <div class="modal-footer">
                <div class="row" style="width:100%;height: 100%">
					<div class="col-md-8">
						<label for="prevPostUid">Citizen UID:</label>
						<input type="text"  class="form-control" ng-model="prevPostUid" readonly ng-init="prevPostUid='<?php echo $_SESSION["activeUser"];?>'">
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-primary" id="fetchPrevPost" style="width: 100%;height:100%" ng-click="getPastRequirements();">Fetch Details</button>	
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>

<!--        stars to show on workers profile-->

<!--
        <div class="stars-outer">
            <div class="stars-inner"></div>
        </div>
-->

<hr><hr>
      <div id="chats">
          <div id="chatLabel" style="text-align: center;font-size: 2rem">CHATS</div>
          <div id="chatBody">
            HERE ALL THE PAST CHAT CARDS COME

            <div class="container">
              <div class="row">
              </div>
            </div>
          </div>
      </div>
<hr><hr>

<!--        footer-->
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
                        <h1 >Hello,May I Help You ?</h1>
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