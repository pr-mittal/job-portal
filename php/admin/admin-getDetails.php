<?php
include_once("../php-connection.php");
$tableName="users";

$category=$_GET["category"];

$query="select * from $tableName where category='$category'";
$table=mysqli_query($connection,$query);
$ary=array();
while($row=mysqli_fetch_assoc($table))
{
  $ary[]=$row;
}
echo json_encode($ary);
if(mysqli_error($connection)!="")
{
  echo mysqli_error($connection);
}
?>