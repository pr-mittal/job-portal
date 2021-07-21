<?php
include_once("../php-connection.php");

$category=$_GET["category"];
$city=$_GET["city"];

$tableName="workers";

if(mysqli_error($connection)!="")
{
	echo mysqli_error($connection);
}
$query="select * from $tableName where category='$category' and city='$city'";
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