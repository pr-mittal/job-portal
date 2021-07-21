
$(document).ready(function(){
	//current selected value
	var selected="";
	//array storing all the values entered yet
	//to avoid confuson array is of ten elements and first elemenet arr[0] is never used
	var arr=[0,0,0,0,0,0,0,0,0];
	//---------------------see rules-----------------//
	$("#btnrules").click(function(){
		$(".modal").slideToggle();
	});
	$(".close").click(function(){
		$(".modal").fadeOut();
	});
	//--------------Select start value---------------//
	$(".btn").mouseenter(function (){
//		console.log("5");
		$(this).addClass("selected");
	});
	$(".btn").mouseout(function(){
//		console.log("6");
		$(this).removeClass("selected");
	});
	$(".btn").click(function(){
		selected=$(this).html();
		console.log(selected);
		$("#message").val("Refresh to start again");
		$(".btn").unbind("mouseout");
		$(".btn").unbind("mouseenter");
		$(".btn").unbind("click");
	});
	//when user clicks anywhere outside mmodal close it
	window.onclick=function(event)
	{
		//getting element by class in jq and then comapring he first elememt
		var modal=$(".modal")[0];
		if(event.target==modal)
			{
//				console.log("1");
				$(".modal").css("display","none");
			}
	}
	//---------------Toggle value ------------------------//
	$(".turn").click(function(){
		if(selected!="")
			{
				//cant overwrite writtem
				if(($(this).html())!="")
					{
						//alert("1");
						return;
					}
				//basic woring
				$(this).html(selected);
				var id=$(this).attr("value");
				id=Number(id);
				if(selected=="x")
					{
						arr[id]=1;
						$("#cross").removeClass("selected");
						$("#zero").addClass("selected");
						selected="o";
					}
				else if(selected=="o")
					{
						arr[id]=-1;
						$("#zero").removeClass("selected");
						$("#cross").addClass("selected");
						selected="x";
					}
		        //console.log(Number(id));
				console.log(arr[id]);
				check();
			}
	});
	//---------------match 3 consecutive ------------------//
	function check()
	{
		var list=[[1,2,3],[4,5,6],[7,8,9],[1,4,7],[2,5,8],[3,6,9],[1,5,9],[3,5,7]];
		//123,456,789,147,258,369,159,357
		//alert(5);
		//storing the value which might win
		if(selected=="x")
			{
				var res="O";
			}
		else 
			var res="X";
		//going throught the list and seeing if any of the combination happens
		for(var i=0;i<list.length;i++)
			{
//				console.log();
			if((arr[list[i][0]]==arr[list[i][1]])&(arr[list[i][1]]==arr[list[i][2]])&(arr[list[i][0]]!=0))
				{
					alert(1);
					str="#"+list[i][0];
					$(str).css("color","green");
					str="#"+list[i][1];
					$(str).css("color","green");
					str="#"+list[i][2];
					$(str).css("color","green");
					//unbinding so no input can be changed
					$(".turn").unbind("click");
					$("#message").val(res+" wins.REFRESH page to start again.");
				}
			}
	}	
});
