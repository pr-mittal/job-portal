$(document).ready(function(){
    $("#postWork").click(function(){
//        var cust_uid=$("#uidPost").val();
//        var category=$("#categoryPost").val();
//        var problem=$("#descriptionPost").val();
//        var location=$("#addressPost").val();
//        var city=$("#cityPost").val();
        //alert($("#postWorkForm").serialize());
//        if(confirm("Changes wil be saved.Sure?"))
//            {
//                var actionUrl="php/citizen/dash-citizen-postWork.php?"+$("#postWorkForm").serialize();
//                $.get(actionUrl,function(response){
//                  alert(response);  
//                });
//                window.location.reload();
//                $("#postWorkForm")[0].reset();
//            }
        
                
    });
    $("#fetchPost").click(function(){
//        var cust_uid=$("#uidPost").val();
//        //alert("uid");
//        var actionUrl="php/citizen/dash-citizen-postFetch.php?cust_uid="+cust_uid;
//        $.get(actionUrl,function(response){
//            //alert("uid");
//            var info=response.split(",");
//           //alert(response);
//            $("#addressPost").val(info[0]);
//          $("#state").val(info[1]);
//			print_cities();
//			$("#city").val(info[2]);
//        });
    });
    $("#sendRatingRequest").click(function(){
        //alert($("#ratingRequestForm").serialize());
        //workerUid=aaaaaaaaaaa&citizenUid=aaaaaaaaaaaa
        actionUrl="php/worker/send-rating-request.php?"+$("#ratingRequestForm").serialize();
        $.get(actionUrl,function(response){
            alert(response);
        });
        $("#ratingRequestForm")[0].reset();
        //SELECT avg(rating) FROM `ratings` WHERE rating is NOT NULL;
    });
//		function print_cities()
//    {
//        state=document.getElementById("state");
//        city=document.getElementById("city");
//        //alert(this.selectedIndex);
//        if(state.selectedIndex==0)
//            {
//                //if no option is selected in state
//                city.innerHTML="<option value='none'>Choose..</option>";
//            }
//        let selected=state.selectedIndex;
//        var array_cities= s_a[selected].split("|");
//        //alert(array[0]);
//        //city.innerHTML="";
//        for(i=0;i<array_cities.length;i++)
//            {
//                var newoption=document.createElement("option");
//                newoption.innerHTML=array_cities[i];
//                newoption.value=array_cities[i];
//                //var newoption=new Option("txt"+i,"value");
//                city[i+1]=newoption;
//            }
//        
//    }

});