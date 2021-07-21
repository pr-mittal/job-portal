$(document).ready(function(){
    $("#postWork").click(function(){
        var cust_uid=$("#uidPost").val();
        alert(cust_uid);
        var category=$("#categoryPost").val();
        var problem=$("#descriptionPost").val();
        var location=$("#addressPost").val();
        var city=$("#city").val();
		var state=$("#state").val();
        if((cust_uid=="")|(category=="")|(problem=="")|(location=="")|(city=="")|(state==""))
            {
                alert("ENTER ALL VALUES.");
                return;
            }
        //alert($("#postWorkForm").serialize());
        if(confirm("Changes wil be saved.Sure?"))
            {
                var actionUrl="php/citizen/dash-citizen-postWork.php?"+$("#postWorkForm").serialize();
                alert(actionUrl);
                $.get(actionUrl,function(response){
                  //alert(aresponse);  
                });
//                window.location.reload();
                $("#postWorkForm")[0].reset();
            }
        
                
    });
    $("#fetchPost").click(function(){
        var cust_uid=$("#uidPost").val();
        //alert("uid");
        var actionUrl="php/citizen/dash-citizen-postFetch.php?cust_uid="+cust_uid;
        $.get(actionUrl,function(response){
            //alert("uid");
            var info=response.split(",");
			//alert(response);
			$("#addressPost").val(info[0]);
			$("#state").val(info[1]);
			print_cities();
            $("#city").val(info[2]);
			
        });
    });
    $("#changepwdBtn").click(function(){

        var actionUrl="php/citizen/profile-citizen-changepwd.php?"+$("#changepwdForm").serialize();
        alert(actionUrl);
        $.get(actionUrl,function(response){
            alert(response);
            $("#changepwdForm")[0].reset();
        });
    });
  
    var regex_psswd=/(?=^.{8,15}$)(?=.*\d)(?![.\n])(?=.*[A-Za-z]).*$/;

    $("#changepwdNew").click(checkPwd);
    $("#changepwdNew").keyup(checkPwd);

    $("#changepwdPrev").click(checkPwd);
    $("#changepwdPrev").keyup(checkPwd);

    
	function checkPwd()
	{
		if($(this).val()=="")
			{
				$(this).parent().children('.errmsg').html("MUST CONTAIN NUMBER,CHARACTER.");
			}
		else if(regex_psswd.test($(this).val()))
			{
				$(this).parent().children('.errmsg').html("STRONG PASSWORD");
                check=1;
                $("#signupBtn").removeAttr("disabled");
			}
		else
			{
				$(this).parent().children('.errmsg').html("SHORT");
                check=0;
                $("#signupBtn").attr("disabled",'disabled');
			}
        //console.log(check);
	}
              
//    $(".star").click(function(){
        //$(this).attr("id");
        //$(this).css("background-color","green");
        //$(this).parent().children().eq(0).css("background-color","green");
        //alert($(this).attr("class"));
        //$(this).removeClass("fa-star");
        //alert($(this).hasClass("fa-star"));
//        alert($(this).parent().children().index(this));
        //in javascript
        //var index = Array.prototype.indexOf.call(this.parentElement.children, this);
        //alert(Array.from(this.parentElement.children).indexOf(this));
        //alert(index);
        
        //code
        
//        var id=$(this).parent().children().index(this);
//        var length=$(this).parent().children().length;
//        //giving a filled star
//        for(i=0;i<=id;i++)
//            {
//                var childElement=$(this).parent().children().eq(i);
//                if(childElement.hasClass("fa-star-o"))
//        
//                {
//                        childElement.removeClass("fa-star-o");
//                        childElement.addClass("fa-star");
//                    }
//            }
        //giving a empty star
//        for(i=id+1;i<length;i++)
//            {
//                var childElement=$(this).parent().children().eq(i);
//                if(childElement.hasClass("fa-star"))
//                    {
//                        childElement.removeClass("fa-star");
//                        childElement.addClass("fa-star-o");
//                    }
//            }
//        //storing values in the last hidden input type box
//        length=$(this).parent().parent().children().length;
//        $(this).parent().parent().children().eq(length-2).val(id+1);
//    });
//    $(".ratingBtn").click(function(){
//        var workerUid=$(this).parent().children().eq(0).val()
//        var length=$(this).parent().children().length;
//        var rating=$(this).parent().children().eq(length-2).val();
//        //alert("rating"+rating+workerUid);
//        actionUrl="php/citizen/dash-citizen-setRating.php?uid="+workerUid+"&rating="+rating;
//        alert(actionUrl);
//        $.get(actionUrl,function(response){
//            alert(response);
//        });
//    });
    
	function print_cities()
    {
        state=document.getElementById("state");
        city=document.getElementById("city");
        //alert(this.selectedIndex);
        if(state.selectedIndex==0)
            {
                //if no option is selected in state
                city.innerHTML="<option value='none'>Choose..</option>";
            }
        let selected=state.selectedIndex;
        var array_cities= s_a[selected].split("|");
        //alert(array[0]);
        //city.innerHTML="";
        for(i=0;i<array_cities.length;i++)
            {
                var newoption=document.createElement("option");
                newoption.innerHTML=array_cities[i];
                newoption.value=array_cities[i];
                //var newoption=new Option("txt"+i,"value");
                city[i+1]=newoption;
            }
        
    }
});
  //  const starTotal = 5;
 
//for(const rating in ratings) {  
  // 2
  //const starPercentage = (ratings[rating] / starTotal) * 100;
  // 3
 // const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
  // 4
 // document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
var module=angular.module("citizenModule",[]);
module.controller("citizenController",function($scope,$http){
    $scope.prevPostUid;
    $scope.getPastRequirements=function()
    {
        //alert($scope.prevPostUid);
        $scope.actionUrl="php/citizen/dash-citizen-pastPosts.php";
        $http.get($scope.actionUrl+"?cust_uid="+$scope.prevPostUid).then(success,fail);
        function success(response)
        {
//            alert(JSON.stringify(response.data));
            $scope.prevPost=response.data;
        }
        function fail(error)
        {
            alert("ERROR"+error.data);
        }
    }
    //delete post from table and list of posts by this citizen in database
    $scope.doDeletePost=function(index)
    {
        if(confirm("Are U sure?"))
            {
                $scope.actionUrl="php/citizen/dash-citizen-doDeletePost.php";
                $http.get($scope.actionUrl+"?rid="+$scope.prevPost[index].rid).then(success,fail);
                function success(response)
                {
                    //alert(response.data);
                    //remove this from array,removes index ,1 is to remove
                    $scope.prevPost.splice(index, 1);
                    //alert($scope.prevPost);
                }
                function fail(error)
                {
                    alert("ERROR"+error.data);
                }
            }
                
    }
    //get list of the rating requests
    $scope.getRating=function()
    {
        //$scope.ratingCitizenUid;
        $scope.actionUrl="php/citizen/dash-citizen-getRating.php";
//        alert('actionUrl');
        $http.get($scope.actionUrl+"?citizenUid="+$scope.ratingCitizenUid).then(success,fail);
        function success(response)
        {
            $scope.ratingDetails=response.data;
            
            //setting all rating to zero initially
            $scope.ratings=[];
            for(var i=0;i<response.data.length;i++)
                {
                    $scope.ratings[i]=0;
                }
            
//            alert($scope.ratings);
//            alert(response.data.length);
//            alert(JSON.stringify(response.data));
        }
        function fail(error)
        {
            alert("ERROR"+error.data);
        }
    }
    //getting reference usin $event.currentTarget and storing values in hidden and changing number of stars
    $scope.setStar=function(thisStar,index,rating)
    {
//        alert(thisStar);
        //alert("XYZ");
//        alert(thisStar.classList);
        var id=$(thisStar).parent().children().index(thisStar);
//        var length=$(thisStar).parent().children().length;
        var length=5;
//        alert(id+" "+length);
        //giving a filled star
        for(var i=0;i<=id;i++)
            {
                var childElement=$(thisStar).parent().children().eq(i);
                if(childElement.hasClass("fa-star-o"))
        
                {
                        childElement.removeClass("fa-star-o");
                        childElement.addClass("fa-star");
                    }
            }
        //giving a empty star
        for(i=id+1;i<length;i++)
            {
                var childElement=$(thisStar).parent().children().eq(i);
                if(childElement.hasClass("fa-star"))
                    {
                        childElement.removeClass("fa-star");
                        childElement.addClass("fa-star-o");
                    }
            }
        //storing values in the last hidden input type box
//        $(thisStar).parent().children().eq(length-1).val(id);
        //storing the values in $scope.rating
        $scope.ratings[index]=rating;
//        alert($scope.ratings);
    }
    //getting reference usin $event.currentTarget and calling ajax to setRating
    $scope.setRating=function(thisBtn,workerUid,citizenUid,index)
    {
//        alert("BTN");
//        alert($(this));
//        var rating=$("#hiddenRating").val();
        //alert("rating"+rating+workerUid);
        actionUrl="php/citizen/dash-citizen-setRating.php?uidWorker="+workerUid+"&rating="+$scope.ratings[index]+"&uidCitizen="+citizenUid;
//        alert(actionUrl);
        $http.get(actionUrl).then(success,fail);
        function success(response){
            alert(response.data);
            ($scope.ratingDetails).splice(index,1);
        }     
        function fail(response)
        {
            alert(response.data);
        }
    }
});
