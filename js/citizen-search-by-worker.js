
var module=angular.module("workerModule",[]);
module.controller("workerController",function($scope,$http){
    $scope.coverModal={
								'position': 'fixed',
								'width':'100%',
								'height':'100%',
								'top':'0',
								'left':'0',
								'background-color': 'black',
								'opacity':'0.5',
								'text-align': 'center',
								'display':'none'
							};
    $scope.categoryOption;
    $scope.selectedCategory;
    $scope.cityOption;
    $scope.selectedCity;
    $scope.setCategories=function()
    {
        $scope.coverModal.display="block";
        $scope.actionUrl="php/worker/citizen-search-setCategories.php";
        $http.get($scope.actionUrl).then(success,fail);
        function success(response)
        {
            $scope.coverModal.display="none";

//            alert(JSON.stringify(response.data));
            $scope.categoryOption=response.data;
//            alert($scope.categoryOption.length);
            if(!$scope.categoryOption.length){
                alert("NO WORK.");
                location.href="dash-worker.php";
            }
            $scope.selectedCategory=$scope.categoryOption[0];
            
            $scope.setCities();
        }
        function fail(response)
        {
            alert("ERROR+"+response.data);
        }
    }
    //taking value of ccities according to the selected category
    $scope.setCities=function()
    {
        $scope.coverModal.display="block";
        $scope.actionUrl="php/worker/citizen-search-setCities.php?category="+$scope.selectedCategory.category;
        $http.get($scope.actionUrl).then(success,fail);
        function success(response)
        {
            
//            alert(JSON.stringify(response.data));
            $scope.cityOption=response.data;
            //this is done so that in select first option is not empty
//            alert($scope.cityOption.length);
            if(!$scope.cityOption.length)
               {
                    alert("NO WORK.");
                    location.href="dash-worker.php";
               }
            
            $scope.selectedCity=$scope.cityOption[0];
            
            $scope.coverModal.display="none";
        }
        function fail(response)
        {
            alert("ERROR+"+response.data);
        }
        
    }
    $scope.getRequirements=function()
    {
        $scope.coverModal.display="block";
//        alert($scope.selectedCategory.category);
        $scope.actionUrl="php/worker/citizen-search-getRequirements.php?category="+$scope.selectedCategory.category+"&city="+$scope.selectedCity.city;
//        alert($scope.actionUrl);
        $http.get($scope.actionUrl).then(success,fail);
        function success(response)
        {
            $scope.coverModal.display="none";

//            alert(JSON.stringify(response.data));
            $scope.requirements=response.data;
            
        }
        function fail(response)
        {
            alert("ERROR+"+response.data);
        }
    }
    $scope.getCitizenDetail=function(cust_uid)
    {
        $scope.coverModal.display="block";
        $scope.actionUrl="php/worker/citizen-search-getDetail.php?uid="+cust_uid;
//        alert($scope.actionUrl);
        $http.get($scope.actionUrl).then(success,fail);
        function success(response)
        {
            $scope.coverModal.display="none";
//            alert(JSON.stringify(response.data));
            $scope.citizenDetail=response.data;
            
        }
        function fail(response)
        {
            alert("ERROR+"+response.data);
        }
    }
//    $scope.addDays=function(date,days)
//    {
//        var parts =date.split('-');
//        // Please pay attention to the month (parts[1]); JavaScript counts months from 0:
//        // January - 0, February - 1, etc.
//        var mydate = new Date(parts[0], parts[1] - 1, parts[2]); 
////        console.log(mydate.toDateString())
////        console.log(mydate.getDate());
//         mydate.setDate(mydate.getDate() + Number(days));
////        alert(days);
//        return mydate.toDateString();
//    }
    
});