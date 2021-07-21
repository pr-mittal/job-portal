//<!--
//<img id="imgFileUpload" alt="Select File" title="Select File" src="orange.png" style="cursor: pointer" />
//<br />
//<span id="spnFilePath"></span>
//<input type="file" id="FileUpload1" style="display: none" />
//<script type="text/javascript">
//    window.onload = function () {
//        var fileupload = document.getElementById("FileUpload1");
//        var filePath = document.getElementById("spnFilePath");
//        var image = document.getElementById("imgFileUpload");
//        image.onclick = function () {
//            fileupload.click();
//        };
//        fileupload.onchange = function () {
//            console.log(fileupload.value.split('\\'));//makes an array of splits
//            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
//            filePath.innerHTML = "<b>Selected File: </b>" + fileName;
//        };
//    };
//</script>
//-->

$(document).ready(function(){
    $(document).ajaxStart(function(){
        $("#spinnerDiv").css("display","flex");
    });
    $(document).ajaxStop(function(){
        $("#spinnerDiv").css("display","none");
    });
    $("#profilePic").click(function(){
        //alert("11");
       $("#profilePicFile").click();
        
    });
    $("#aadharPic").click(function(){
        $("#aadharPicFile").click();
    });
    //JSON CALL TO FETCH THE VALUES
    $("#fetchDetails").click(function(){
        var uid=$("#uid").val();
        //alert(uid);
        //as this code is same as written in html file
        var actionUrl="php/worker/profile-worker-fetch.php?uid="+uid;
        //alert(actionUrl);
        $.getJSON(actionUrl,function(ary){
            //alert("11");
            //alert(JSON.stringify(ary));
            if(ary.length==1)
                {
                   //alert("1");
                    //$("#uid").val(ary[0].uid);
                    $("#email").val(ary[0]["email"]);
                    $("#wname").val(ary[0]["wname"]);
                    $("#cnumber").val(ary[0]["cnumber"]);
                    $("#firmshop").val(ary[0]["firmshop"]);
                    $("#state").val(ary[0]["stat"]);
                    print_cities();
                    $("#city").val(ary[0]["city"]);
                    $("#address").val(ary[0]["address"]);
                    $("#category").val(ary[0]["category"]);
                    $("#spl").val(ary[0]["spl"]);
                    $("#exp").val(ary[0]["exp"]);
                    $("#otherinfo").val(ary[0]["otherinfo"]);
                    $("#hiddenp").val(ary[0]["ppic"]);
                    $("#hiddena").val(ary[0]["apic"]);
                    $("#profilePic").attr("src","uploads/worker/"+ary[0]["ppic"]);
                    $("#aadharPic").attr("src","uploads/worker/aadhar/"+ary[0]["apic"]);
                }
            else if(ary.length==0)
                {
//                    alert("2");
                    $("#errmsg").html("INVALID UID");
                }
            else
                {
                    alert("MULTIPLE USERS HAVE SAME UID");
                }
        });
    });
//  document.getElementById("fetchDetails").click();
  $("#fetchDetails").trigger('click'); 
    
});

var regex_mail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var regex_mob=/^[6-9]{1}[0-9]{9}$/;
function showpreview(file) {
        var id=file.id;
        //console.log(id);
        //console.log("1");
        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
				//console.log(ev.target.result);
                if(id=="profilePicFile")
                   {
                        $('#profilePic').attr('src', ev.target.result);
                   }
                else if(id=="aadharPicFile")
                    {
                        $('#aadharPic').attr('src', ev.target.result);
                    }
                
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
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
function autoFill()
{
//        alert("!");
    var value=$("#uid").val();
//    alert(value);
    if(regex_mail.test(value))
        {
              $("#email").val(value);   
        }
    else
        {
              $("#cnumber").val(value);                  
        }
}

function validateMyForm()
{
    var regex_mail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	var regex_mob=/^[6-9]{1}[0-9]{9}$/;
    var mob=$("#cnumber").val();
    var email=$("#email").val();
    if(!regex_mob.test(mob))
        {
//            alert(mob);
            alert("INVALID MOBILE");
            $("#cnumber").focus();
            return false;
        }
    if(!regex_mail.test(email)&email!="")
        {
            alert("INVALID EMAIL");
            $("#email").focus();
            return false;
        }
    //check if email/mob alredy exists in database
    var actionUrl="php/worker/profile-worker-front-checkProfile.php?uid="+$("#uid").val()+"&email="+email+"&cnumber="+mob;
//    alert(actionUrl);
    $.get(actionUrl,function(response)
         {
        if(response.trim()=="MOBILE"){
            alert("MOBILE NUMBER ALREDY REGISTERED");
            $("#cnumber").focus();
        }
        else if(response.trim()=="EMAIL"){
            alert("EMAIL ID ALREDY REGISTERED");
            $("#email").focus();
        }
        else if(response.trim()=="TRUE"){
//            alert("SUBMISSION");
                 //checking if the required fields are filled
            var flag=0;
            var fields = $("#worker").find("select, textarea, input").serializeArray();
              console.log(fields);
              $.each(fields, function(i, field) {
                  //check if field is empty or field is Choose.. or field is email
                if (!(field.name=="email")&!(field.name=="firmshop")&!(field.name=="spl")&!(field.name=="otherinfo")&(!field.value)|(field.value=="Choose...")|(field.value=="Choose.."))
                    {
//                        console.log(field.name=="email");
                        flag=1;
                        alert(field.name + ' is required');
                        return false;    
                    }
               });
              if(flag==0)
                  {
                        $("#uid").val(mob);
                        $("#worker").submit();          
                  }
        }
        else{
            alert(response);
        }
//        alert(response);
    });
}