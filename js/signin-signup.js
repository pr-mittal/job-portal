$(document).ready(function(){
	var regex_mail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/
//    var regex_psswd=/(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Za-z]).*$/;
	var regex_psswd=/(?=^.{8,}$)(?=.*\d)(?![.\n])(?=.*[A-Za-z]).*$/;
	var regex_len=/^.{1,30}$/;
	var regex_mob=/^[6-9]{1}[0-9]{9}$/;
    var check=0;
    var check1=0;
	$("#signinUid").click(clearErr);
	$("#signupUid").click(clearErr);
    $("#forogtUid").click(clearErr);
	$("#signinUid").blur(checkUid);
	$("#signupUid").blur(checkUid);
    $("#forgotUid").blur(checkUid);
    $("#forgotBtnSignin").click(getPwd);
    $("#forgotBtn").click(getPwd);
    //remove sigin modal when forgot password is clicked
    $("#forgotSigninLink").click(function(){
       $("#signinClose").click();
       $("#signinModal").modal("toggle");
        //alert("!");
    });
	    //code to check password
	$("#signupPwd").click(function(){
		$(this).parent().children('.errmsg').html("MUST CONTAIN NUM,CHARACTER.");
	});
	$("#signupPwd").click(checkPwd);
	$("#signupPwd").keyup(checkPwd);

//    $("#forgotModal").on('shown.bs.modal',function(){
//        $("#signinModal").hide();
//    });
	function clearErr()
	{
		$(this).parent().children('.errmsg').html("");
	}
	function checkUid()
	{
//        alert("");
//        $("#signinBtn").removeAttr("disabled");
		//alert("1");
		var str=$(this).val();
		if(regex_mail.test(str))
			{
					
				$(this).parent().children('.errmsg').html("EMAIL ENTERED.");
                check=1;
                if(!(regex_len.test(str)))
                {
                    $(this).parent().children('.errmsg').html("EMAIL RESTRICTED TO 30 CHAR");
                    check=0;
                }
				//$("#signinBtn").prop("disabled",false);
				//$("#signinBtn").attr("disabled",'disabled');
				//$("#signinBtn").removeAttr("disabled");
			}
		else
            {
                if(regex_mob.test(str))
                    {
                        $(this).parent().children('.errmsg').html("MOBILE NO. ENTERED.");
                        check=1;

                    }
                else
                    {
                         $(this).parent().children('.errmsg').html("INVALID ID.");
                        check=0;

                    }
            }
                
        $("#signupBtn").attr("disabled",'disabled');
        $("#signinBtn").attr("disabled",'disabled');
//      $("#forgotBtn").attr("disabled","disabled");
		//console.log(check);
        if(check==1){
			//    ajax call
				//calling signup php file for message when button is clicked 
				//alert("11");
				var uid=$(this).val();
				//console.log(uid);
				var actionUrl="php/signin-signup/checkuidSignup.php?uid="+uid;
				//alert(actionUrl);
				$.get(actionUrl,function(response){
					//changing title of signupp button
					//alert("1");
//					alert(response);
					$("#signupUidErr").html(response);
                    if(response.trim()=='Available')
                        {
                            check=1;

                        }
                    else{
                            check =0;
                            $("#signinBtn").removeAttr("disabled");
                        }
				});
                //alert("123");
                //$("#pwdDiv").css("display","flex");
		}
        
        if(check&check1)
            {
                $("#signupBtn").removeAttr("disabled");
            }
	}

	function checkPwd()
	{
		if($(this).val()=="")
			{
				$(this).parent().children('.errmsg').html("MUST CONTAIN NUMBER,CHARACTER.");
			}
		else if(regex_psswd.test($(this).val()))
			{
				$(this).parent().children('.errmsg').html("STRONG PASSWORD");
                check1=1;
			}
		else
			{
				$(this).parent().children('.errmsg').html("SHORT");
                check1=0;
                $("#signupBtn").attr("disabled",'disabled');
			}
        if(check&check1)
            {
                $("#signupBtn").removeAttr("disabled");
            }
        //console.log(check);
	}
	//    ajax call
    $("#signinBtn").click(function(){
		//calling signup php file for message when button is clicked
        var uid=$("#signinUid").val();
        var pwd=$("#signinPwd").val();
        //console.log(uid);
        //alert(uid+" "+pwd);
        var actionUrl="php/signin-signup/checkuidSignin.php?uid="+uid+"&pwd="+pwd;
		//alert(actionUrl);
        $.get(actionUrl,function(response){
          response=response.trim();
//            alert(response);

			//changing title of signupp button
//            alert(response);
//			$("#signinTitle").html(response);
			
			
			//starting session and redirecting citizen done on server side
			if(response=="CITIZEN")
				{
					location.href="dash-citizen.php";
				}
			else if(response=="WORKER")
				{
					location.href="dash-worker.php";
				}
			else if(response=="ADMIN")
				{
					location.href="dash-admin.php";
				}
            else if(response=="CITIZENPROFILE")
                {
                    location.href="profile-citizen-front.php";
                }
            else if(response=="WORKERPROFILE")
                {
                    location.href="profile-worker-front.php";
                }
			else
				{
					alert(response);
				}
            });
		});
	$("#signupBtn").click(function(){
		var actionUrl="php/signin-signup/signup.php?"+$("#signupForm").serialize();
//		alert(actionUrl);
//		alert($("#signupCategory").val());
		$.get(actionUrl,function(response){
//			starting session and redirecting citizen
			if(response=="CITIZEN")
				{
					location.href="profile-citizen-front.php";
				}
			else if(response=="WORKER")
				{
					location.href="profile-worker-front.php";
				}
			else
				{
					alert(response);
				}
            });
		});
    //ajax call to get password
    function getPwd()
    {
        $("#forgotPwd").val("");
        //alert(($(".modal-content")[0]).id);
        //acces nth class in model-content
//        alert($(".modal-content").eq(1).attr("id"));
        var callerId=$(this).attr("id");
//        if(callerId=="forgotBtn")
//            {
//                
//            }
//        else if(callerId=="forgotBtnSignin")
//            {
//                
//            }
//    
//        going to the parent element then searching for the class uid it and the resp value inside it
      var contentId=$(this).parent().parent().attr("id");
//        alert(uid);
//      alert($(this).attr("id"));
//        alert($("."+uid+" .uid").attr("id"));
//        alert(callerId);
        var uid=$("#"+contentId+" .uid").val();//this can be done using js queryselector also
        //alert(uid);
        actionUrl="php/signin-signup/forgotpwdSignin.php?uid="+uid;
        $.get(actionUrl,function(response){
//            alert(uid+$(this).attr("id")+response);
            //entering respone to respective places
            if(callerId=="forgotBtn")
            {
                //alert(response);
                $("#forgotPwd").val(response);   
            }
        else if(callerId=="forgotBtnSignin")
            {
                 $("#signinTitle").html(response);     
            }
        });
        
    }
	$("#sendComplaint").click(function(){
	
		if(!regex_mail.test($("#contactComplaint").val()))
			{
//				alert($("#contactComplaintErr").val());
				$("#contactComplaintErr").html("Enter Valid Email");
				return;
			}
		var actionUrl="php/signin-signup/sendComplaint.php?"+$("#complaintForm").serialize();
//		alert(actionUrl);
//		php/signin-signup/sendComplaint.php?contactComplaint=45678&textComplaint=6789
		
		$.get(actionUrl,function(response){
			if(response=="done")
				{
					$("#complaintForm").trigger('reset');
				}
			else{
				alert(response);
			}
		});
	});
});