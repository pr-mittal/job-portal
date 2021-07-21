<?php
$tableName="users";
$uid=$_GET["uid"];
//echo "Welcome :".$userid;
include_once("../php-connection.php");
if(preg_match("^[6-9]{1}[0-9]{9}$^",$uid))
	   {
		   //uid is a mobile number
		   //echo "FALSE";
            //check if that is mobile number
            $query="select * from $tableName where mobile='$uid'";
            $table=mysqli_query($connection,$query);//0-1
            if(mysqli_num_rows($table)==1)
                echo "Not Available";
            else
                echo "Available";
	   }
else{
    echo  "INVALID INPUT";
}
?>