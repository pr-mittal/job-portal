<?php
$connection=mysqli_connect("localhost","root","","id13907008_easywork");
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