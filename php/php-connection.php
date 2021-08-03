<?php
$connection=mysqli_connect("localhost","root","","job-portal");
$error=mysqli_connect_error($connection);
if($error!="")
{
	die("SERVER ERROR:".$error);
}
//else
//{
//    echo "SUCCESSFULL";
//}
?>