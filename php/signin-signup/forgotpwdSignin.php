
<?php
include_once("../php-connection.php");
include_once("SMS_OK_sms.php");

//echo phpinfo();
$tableName="users";

$uid=$_GET["uid"];
if(preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^",$uid))
{
		    //uid is an email
		    //echo "TRUE";
			//check if that email id exists then ask user to adda nther email or go for forgot password
            $query="select * from $tableName where email='$uid'";
            $table=mysqli_query($connection,$query);//0-1
            //echo mysqli_error($connection);
            if(mysqli_num_rows($table)==1)
            {
                $row=mysqli_fetch_array($table);
                //mail($to_email_address,$subject,$message,[$headers],[$parameters]);
                // Always set content-type when sending HTML email
                //$headers = "MIME-Version: 1.0" . "\r\n";
                //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //
                //// More headers
                //$headers .= 'From: <webmaster@example.com>' . "\r\n";
                //$headers .= 'Cc: myboss@example.com' . "\r\n
                $to=$uid;
                $subject="CURRENT PASSWORD FOR YOUR MPS.COM ACCOUNT";
                $msg="YOUR PASSWORD:'".$row["pwd"]."' FOR EMAIL ID- '$to'";
                $headers = "From: MPS.com" . "\r\n";
                $msg=mail($to,$subject,$msg,$headers);
//                echo $msg;
                if(!$msg)
                {
                    echo "EMAIL SENDING FAILUE";
                }
                else{
                    echo "EMAIL SENT SUCCESSFULLY TO".$to;
                }
                
            }
            else
                echo "ENTER VALID ID.";
			
			
	   }
	else
	   {
		   //uid is a mobile number
		   //echo "FALSE";
            $query="select * from $tableName where mobile='$uid'";
            $table=mysqli_query($connection,$query);//0-1
            //echo mysqli_error($connection);
            if(mysqli_num_rows($table)==1)
            {
                $row=mysqli_fetch_array($table);
                $msg="YOUR PASSWORD:'".$row["pwd"]."' FOR MOBILE NUMBER $uid";
                $msg=SendSMS($uid,$msg);
//                echo "YOUR PASSWORD:'".$row["pwd"]."'";
                echo $msg;
            }
            else
                echo "ENTER VALID ID.";
			
	   }
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
?>