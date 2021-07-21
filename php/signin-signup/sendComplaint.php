<?php
include_once("../php-connection.php");
$tableName="complaints";
$uid=$_GET["contactComplaint"];
$text=$_GET["textComplaint"];
$query="insert into $tableName (uid,complaint) values('$uid','$text')";
$msg=mysqli_query($connection,$query);
//echo $msg;
if($msg)
{
    echo "done";
}
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
?>