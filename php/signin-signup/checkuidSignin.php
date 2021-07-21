<?php
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$tableName="users";
//echo "Welcome :".$userid;
//echo $uid." ".$pwd;
include_once("../php-connection.php");
if(preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^",$uid))
	   {
		    //uid is an email
		    //echo "TRUE";
			//check if that email id exists then ask user to adda nther email or go for forgot password
            $query="select * from $tableName where email='$uid' and pwd='$pwd'";
            $table=mysqli_query($connection,$query);//0-1
//            echo mysqli_error($connection);
            if(mysqli_num_rows($table)==1)
            {
                $row=mysqli_fetch_array($table);
                if($row["status"])
                {
                    //signin successfull
                    session_start();
                    //to fetch various data from the server
                    $_SESSION["activeUser"]=$row["uid"];
                    //to avoid citizen going on workers page and vice versa
                    $_SESSION["category"]=$row["category"];

                    //echo $row["category"];
                    headerLocation($row["category"],$connection,$row["uid"]);
                }
                else
                {
                    echo "YOUR ID HAS BEEN BLOCKED DUE TO MALICIOUS ACTIVTY.";
                }
            }
           else
                echo "ENTER VALID ID AND PASSWORD.";
			
			
	   }
	else
	   {
		   //uid is a mobile number
		   //echo "FALSE";
            //check if that is mobile number
            $query="select * from $tableName where mobile='$uid' and pwd='$pwd'";
            $table=mysqli_query($connection,$query);//0-1
            if(mysqli_num_rows($table)==1)
            {
                $row=mysqli_fetch_array($table);
                if($row["status"])
                {
                    //signin successfull
                    session_start();
                    //to fetch various data from the server                    
                    $_SESSION["activeUser"]=$row["uid"];
                    //to avoid citizen going on workers page and vice versa                    
                    $_SESSION["category"]=$row["category"];
//                    echo $row["category"];
                    headerLocation($row["category"],$connection,$row["uid"]);

                }
                else
                {
                    echo "YOUR ID HAS BEEN BLOCKED.EMAIL US AT xyz@gmail.com";
                }
                
            }
           else
                echo "ENTER VALID ID AND PASSWORD.";
			
	   }
if(mysqli_error($connection)!="")
{
  echo mysqli_error($connection);
}
function headerLocation($category,$connection,$uid)
{
    if($category=="CITIZEN")
    {
        //echo $uid;
        $tableName="citizens";
        $query="select * from $tableName where uid='$uid'";
//        echo $query;
        $table=mysqli_query($connection,$query);
//        echo $connection;
//        echo $table;
        if(mysqli_num_rows($table))
        {
            //profile is filled
//            header("location:../../dash-citizen.php");
            echo "CITIZEN";
        }
        else
        {
            //means profile has not yet been filled
//            header("location:../../profile-citizen-front.php");
            echo "CITIZENPROFILE";

        }
    }
    else if($category=="WORKER")
    {
        
        $tableName="workers";
        $query="select * from $tableName where uid='$uid'";
        $table=mysqli_query($connection,$query);
        if(mysqli_num_rows($table))
        {
            //profile is filled
//            header("location:../../dash-worker.php");
            echo "WORKER";
        }
        else
        {
            //means profile has not yet been filled
//            header("location:../../profile-worker-front.php");
            echo "WORKERPROFILE";

        }
    }
    else if($category=="ADMIN")
    {
//        header("location:../../dash-admin.php");
        echo "ADMIN";
    }
}
?>