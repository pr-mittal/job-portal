<?php
include_once('../php-connection.php');

$tableName="citizens";
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
$cust_uid=$_GET["cust_uid"];
$query="select * from $tableName where uid='".$cust_uid."'";
if(mysqli_error($connection)!="")
	{
		echo mysqli_error($connection);
	}
//echo $query;
$table=mysqli_query($connection,$query);
$count=mysqli_num_rows($table);
if($count)
{
	$row=mysqli_fetch_array($table);
	echo $row["address"].",";
	echo $row["state"].",";
	echo $row["city"];
}
else{
	echo "NO ROW";
}
if(mysqli_error($connection)!="")
	{
		echo mysqli_error($connection);
	}
?>
