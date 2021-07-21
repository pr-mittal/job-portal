var mymodule=angular.module("adminModule",[]);
mymodule.controller("adminController",function($scope,$http){
  $scope.users;
  $scope.category=['worker','citizen'];
  $scope.selectedCategory=$scope.category[0];
//  
//<!--[{"uid":"2001pranavmittal@gmail.com","mobile":"","email":"2001pranavmittal@gmail.com","pwd":"hellodear1234","category":"WORKER","dos":"2020-07-08","status":"1"},{"uid":"9876542222","mobile":"9876542222","email":"","pwd":"HelloDear@1234","category":"WORKER","dos":"2020-07-07","status":"1"},{"uid":"HelloDear@gmail.com","mobile":"","email":"HelloDear@gmail.com","pwd":"HelloDear@1234","category":"WORKER","dos":"2020-07-07","status":"1"}]-->
  $scope.getDetails=function()
  {
    $scope.actionUrl="php/admin/admin-getDetails.php?category="+$scope.selectedCategory;
    $http.get($scope.actionUrl).then(ok,error);
    function ok(response)
    {
//      alert(JSON.stringify(response.data));
      $scope.users=response.data;
    }
    function error(response)
    {
      alert("ERROR:"+response.data);
    }
  }
  
  $scope.status=function(value)
  {
    if(value==1)
      {
        return 'BLOCK';
      }
    if(value==0)
      {
        return 'RESUME';
      }
  }
  $scope.setStatus=function(index)
  {
    //toggling the value of button
    $scope.statusVal;
    if($scope.users[index].status==1)
      {
        $scope.users[index].status=0;
        $scope.statusVal=0;
      }
    else
      {
        $scope.users[index].status=1;
        $scope.statusVal=1;
      }
    $scope.uid=$scope.users[index].uid;
//    sending http request to change status at respective uid
    $scope.actionUrl="php/admin/admin-setStatus.php?uid="+$scope.uid+"&status="+$scope.statusVal;
    $http.get($scope.actionUrl).then(ok,error);
    function ok(response)
    {
//      alert(response.data);
    }
    function error(response)
    {
      alert("ERROR:"+response.data);
    }
  }
  $scope.setDelete=function(index)
  {
    $scope.actionUrl="php/admin/admin-setDelete.php?uid="+$scope.users[index].uid+"&category="+$scope.users[index].category;
    alert($scope.actionUrl)
    $http.get($scope.actionUrl).then(ok,error);
    function ok(response)
    {
          alert(response.data);
          $scope.users.splice(index,1);

    }
    function error(response)
    {
      alert("ERROR:"+response.data);
    }
  }
});