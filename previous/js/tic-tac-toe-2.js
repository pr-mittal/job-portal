
$(document).ready(function(){
	//current selected value
	var selectedID="";
	//array storing all the values entered yet
	//to avoid confuson array is of ten elements and first elemenet arr[0] and last element arr[82] is never used
	var valArray=new Array(83).fill(0);
	//array for the bigger tic-tac-toe
	var resArray=new Array(10).fill(0);
	//flag just to selec the region for next player
	var flag=0;
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
		selectedID=$(this).html();
		console.log(selectedID);
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
				//console.log("1");
				$(".modal").css("display","none");
			}
	}
	//---------------Toggle value of selectedID and calling to check for solutions------------------------//
//	$(window).click(function(){
//		if(flag==1)
//			{
//				
//			}
//		else if(flag==0)
//			{
//				
//			}
//	});
	$(".turn").click(function(){
		if(selectedID!="")
			{
				//cant overwrite written
				if(($(this).html())!="")
					{
						//alert("1");
						return;
					}
				//basic working
				//writing cross or zero respectively
				$(this).html(selectedID);
				//asking user to choose the box for next user
				
				var id=$(this).attr("value");
				id=Number(id);
				//toogle value below
				if(selectedID=="x")
					{
						valArray[id]=1;
						$("#cross").removeClass("selected");
						$("#zero").addClass("selected");
						selectedID="o";
					}
				else if(selectedID=="o")
					{
						valArray[id]=-1;
						$("#zero").removeClass("selected");
						$("#cross").addClass("selected");
						selectedID="x";
					}
		        //console.log(Number(id));
				//console.log(valArray[id]);
				//sending slice of array respectively each time
				for(var i=0;i<9;i++)
					{
						
						//do checking only for non fixed output of small tictactoe
						if(resArray[i+1]==0)
							{
								checkSub([0].concat(valArray.slice(9*i+1,9*i+10)),i+1);
							}
					}
				console.log("end");
				//check for the winer in the bigger array
				checkMain();
			}
		
	});
	

	//---------------match 3 consecutive ------------------//
	function checkSub(arr,locator)
	{
		//console.log(arr);
		
		var list=[[1,2,3],[4,5,6],[7,8,9],[1,4,7],[2,5,8],[3,6,9],[1,5,9],[3,5,7]];
		//123,456,789,147,258,369,159,357
		//alert(5);
		//storing the value which might win
		if(selectedID=="x")
			{
				var res="O";
			}
		else 
			var res="X";
		//going throught the list and seeing if any of the combination happens
		for(var i=0;i<list.length;i++)
			{
				//case of winner
				
				if((arr[list[i][0]]==arr[list[i][1]])&(arr[list[i][1]]==arr[list[i][2]])&(arr[list[i][0]]!=0))
					{
						//making changes in id="r(locator+1)",i.e. where match occurs
						//alert(1);
						//unbinding so no input can be changed
						$("#"+"r"+(locator)+" .turn").unbind("click");
						$("#message").val(res+" wins here continue playing.Refresh to Start Again.");
						//sending a copy of variables 
						hide(locator,res);
					}
				
				
			}
		//case of draw
		var count=0;
		for(var i=1;i<arr.length;i++)
			{
				if(arr[i]!=0)
					{
						count++;
					}
			}
		if(count==9)
			{
				//unbinding so no input can be changed
				$("#"+"r"+(locator+1)+" .turn").unbind("click");
				$("#message").val("Draw Continue playing.Refresh to Start Again.");
				hide(locator+1,"OX");
			}
	}
	//hide one part of tic tac  toe when draw or win comes,or replace it with the winner 
	function hide(locator,message)
	{
		if(message=="X")
			{
				resArray[locator]=1;	
			}
		else if(message=="O")
			{
				resArray[locator]=-1;
			}
		else
		{
			resArray[locator]=2;
		}
		console.log("RES="+resArray[locator]);
		
		$("#"+"r"+locator).html(message);
	}
	//----------------------------------------------check winner in bigger tic-tac-toe--------------------------------
	//draw on small tic toe is covered on both sides
	function checkMain()
	{
		var list=[[1,2,3],[4,5,6],[7,8,9],[1,4,7],[2,5,8],[3,6,9],[1,5,9],[3,5,7]];
		//123,456,789,147,258,369,159,357
		//alert(5);
		arr=resArray;
		//going throught the list and seeing if any of the combination happens
		for(var i=0;i<list.length;i++)
			{
				//case of winner
				if((arr[list[i][0]]!=0)&(arr[list[i][1]]!=0)&(arr[list[i][2]]!=0))
					{
						if(arr[list[i][0]]==2)
							{

								if(arr[list[i][1]]==2)
									{
										if((arr[list[i][2]]==1)|(arr[list[i][2]]==(-1)))
											{
												var res=arr[list[i][2]];
												declareWinner(res,list[i])
												
											}
									}
								else
									{
										var res=arr[list[i][1]];
										if((arr[list[i][2]]==2)|(arr[list[i][2]]==res))
											{
												declareWinner(res,list[i]);
											}
									}
							}
						else
							{
								var res=arr[list[i][0]];
								if((arr[list[i][1]]==2)|(arr[list[i][1]]==res))
									{
										if((arr[list[i][2]]==2)|(arr[list[i][2]]==res))
											{
												declareWinner(res,list[i]);
											}

									}

							}
					}
				

				
			}
		
	}
//----------------------Dochanges in big tic-tac-toe according to winner--------------------------------- 
	function declareWinner(res,list)
	{
		if(res==1)
			{
				res="X";
			}
		else
			{
				res="O";
			}
		//making changes in id="r*",i.e. where match occurs
		//alert(1);
		//console.log(arr);
		str="#r"+(list[0]);
		//console.log(str);
		$(str).css("color","green");
		str="#r"+(list[1]);
		//console.log(str);
		$(str).css("color","green");
		str="#r"+(list[2]);
		//console.log(str);
		$(str).css("color","green");
		//unbind aalll click function 
		$(".turn").unbind("click");
		$("#message").val(res+" wins here.Refresh to Start Again.");
	}
});
