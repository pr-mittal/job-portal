<?php
include_once("../php-connection.php");
$tableName="users";

$uid=$_GET["uid"];
$status=$_GET["status"];

$query="update $tableName set status=$status where uid='$uid'";
mysqli_query($connection,$query);
if(mysqli_error($connection)!="")
{
  echo mysqli_error($connection);
}
?>