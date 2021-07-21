<?php
include_once("../php-connection.php");
$category=$_GET["category"];
$tableName="workers";
$query="select distinct city from $tableName where category='$category'";
$table=mysqli_query($connection,$query);
if(mysqli_error($connection)!="")
	{
		echo mysqli_error($connection);
	}
$ary=array();
while($row =mysqli_fetch_assoc($table))
{
	$ary[]=$row;
}
echo json_encode($ary)

?>