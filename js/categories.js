var category_arr=new Array("AC Serices / Repair","Chiney Servicing","Gyser Service","Refrigirator Repair","TV Repair","Washing Machine Service","Water Purifier Repair","Carpenter","Car Cleaning","Pest Control","Sofa Cleaning","Water tank cleaning","Electrician","Mason","Painters","Plumber","Tiler","Other","Contracter");
$(document).ready(function(){
	category=document.getElementById("category");
//	alert(category.innerHTML);
	for(i=0;i<category_arr.length;i++)
		{
			option=document.createElement("option");
			option.value=category_arr[i];
			option.innerHTML=category_arr[i];
			category.appendChild(option);
		}
	
});