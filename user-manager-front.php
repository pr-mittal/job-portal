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
    <script src="js/user-manager-front.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
</head>
    <body ng-app="adminModule" ng-controller="adminController" ng-init="getDetails();">
      <div class="container">
        <div class="row" style="margin-top:50px;">
          <div class="col-md-6">
            <select class="custom-select" ng-model="selectedCategory" ng-options="obj for obj in category" ng-change="getDetails()"></select>
          </div>
          <button class="col-md-6 btn btn-primary" id="fetchDetails" ng-click="getDetails();">FETCH DETAILS</button>
        </div>
        
<!--[{"uid":"2001pranavmittal@gmail.com","mobile":"","email":"2001pranavmittal@gmail.com","pwd":"hellodear1234","category":"WORKER","dos":"2020-07-08","status":"1"},{"uid":"9876542222","mobile":"9876542222","email":"","pwd":"HelloDear@1234","category":"WORKER","dos":"2020-07-07","status":"1"},{"uid":"HelloDear@gmail.com","mobile":"","email":"HelloDear@gmail.com","pwd":"HelloDear@1234","category":"WORKER","dos":"2020-07-07","status":"1"}]-->
        <div class="row" style="margin-top:10px;">
          <div class="col-md-8">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" ng-model="google.uid">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table style="width:100%;height:100%"  rules="rows">
              <tr style="width:100%" >
                <th>UID</th>
                <th>MOBILE</th>
                <th>EMAIL</th>
                <th>date of signup</th>
                <th>Block/Resume</th>
                <th>Delete</th>
              </tr>
              <tr ng-repeat="obj in users|filter:google">
                <td>{{obj.uid}}</td>
                <td>{{obj.mobile}}</td>
                <td>{{obj.email}}</td>
                <td>{{obj.dos}}</td>
                <td><button style="width:100% " class="btn btn-primary" ng-click="setStatus($index)">{{status(obj.status)}}</button></td>
                <td><button style="width:100%" class="btn btn-primary" ng-click="setDelete($index)">DELETE</button></td>
                
              </tr>
            </table>
          </div>
        </div>
      </div>
    
    </body>
  
</html>