<?php
	include("../php-connection.php");
	$tableName="users";
	$exists=mysqli_query($connection,"select * from $tableName");
if($exists)
{
//print table;
//	while($row = mysqli_fetch_array($exists2)){
//    foreach($row as $cname => $cvalue){
//        print "$cname: $cvalue\t";
//    }
//    print "\r\n";}
//	//table exists
	//echo mysqli_fetch_array($exists2)["txtUid"];
	addRow($connection,$tableName);
	
}
else 
{
	echo "table doesnt exist do something";
    //mysqli_query($connection,"create table ".$tableName."(email varchar(20),mob varchar(15),password varchar(20))");
	//$count=mysqli_affected_rows($connection);
	//echo mysqli_error($connection);
	//echo "TABLE CREATED<br>";
	
	//-1 implies no rows
	//addRow($connection,$tableName);
}
function addRow($connection,$tableName)
{
	$uid=$_GET["uid"];
	$pwd=$_GET["pwd"];
    $category=$_GET["category"];
//	echo $uid." ".$pwd." ".$category;
	if(preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^",$uid))
	   {
		    //uid is an email
		    //echo "TRUE";
			//check if that email id exists then ask user to adda nther email or go for forgot password
			$result=mysqli_query($connection,"select * from $tableName where email='$uid'");
			$count= mysqli_num_rows($result);
			if($count)
			{
				echo "EMAIL ALREADY REGISTERED.";
			}
			else
			{
				//adding email id and password to the list
				//echo "RUNNING QUERY";
				session_start();
				$_SESSION["activeUser"]=$uid;
				$query="insert into $tableName (uid,email,pwd,category,dos) values('$uid','$uid','$pwd','$category',curdate())";
				mysqli_query($connection,$query);
				echo $category;
			}
			
	   }
	else
	   {
		   //uid is a mobile number
		   //echo "FALSE";
			//check if that is mobile number
			$result=mysqli_query($connection,"select * from $tableName where mobile='$uid'");
			$count= mysqli_num_rows($result);
			if($count)
			{
				echo "MOBILE NUMBER ALREADY REGISTERED.";
			}
			else
			{
				session_start();
				$_SESSION["activeUser"]=$uid;
				//adding phone number and password to the list
				// echo "RUNNING QUERY";
				$query="insert into $tableName (uid,mobile,pwd,category,dos) values('$uid','$uid','$pwd','$category',curdate())";
				mysqli_query($connection,$query);
				echo $category;
//				header("location:../../dash-citizen.php");
			}
	   }
	if(mysqli_error($connection)!="")
	{
		echo mysqli_error($connection);
	}
}
?>
