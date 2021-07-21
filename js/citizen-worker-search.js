
		var mymodule =angular.module("myModule",[]);
		mymodule.controller("myController",function($scope,$http){
			//using ng-style to give css to coverModal(id:serverCallModal)
			//in future there individual properties can be changed $scope.coverModal.<property>=String;
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
	//				alert($scope.coverModal);
			$scope.selectedCategory;
			$scope.selectedCity;
			//calling to get different categories
			$scope.getCategories=function()
			{
				$scope.coverModal.display="block";
				$http.get("php/citizen/worker-search-categories.php").then(ok,error);
				function ok(response)
				{
//					alert(JSON.stringify(response.data));
					$scope.categoryOption=response.data;
					$scope.selectedCategory=$scope.categoryOption[0];
					$scope.getCities();
					$scope.coverModal.display="none";
				}
				function error(response)
				{
					$scope.coverModal.display="none";
					alert("ERROR:"+response.data);
				}
				
			}
			//searching for cities matching category inn database
			$scope.getCities=function()
			{
				$scope.coverModal.display="block";
				$http.get("php/citizen/worker-search-cities.php?category="+$scope.selectedCategory.category).then(ok,error);
				function ok(response)
				{
//					alert(JSON.stringify(response.data));
					$scope.cityOption=response.data;
					$scope.selectedCity=$scope.cityOption[0];
					$scope.coverModal.display="none";
				}
				function error(response)
				{
					$scope.coverModal.display="none";
					alert("ERROR:"+response.data);
				}
			}
			//seacrhing for match in database
			$scope.doSearch=function()
			{
				$scope.coverModal.display="block";
				//alert("php/citizen/worker-search.php?category="+$scope.selectedCategory.category+"&city="+$scope.selectedCity.city);
				$http.get("php/citizen/worker-search.php?category="+$scope.selectedCategory.category+"&city="+$scope.selectedCity.city).then(ok,error);
				function ok(response)
				{
//					alert(JSON.stringify(response.data));
					$scope.cardArray=response.data;
					$scope.coverModal.display="none";
				}
				function error(response)
				{
					$scope.coverModal.display="none";
					alert("ERROR:"+response.data);
					
				}
			}
			//storing  the clicked values of card in obj for display 
			$scope.displayModal=function(index)
			{
				//alert(index);
				$scope.obj=$scope.cardArray[index];
			}

		});