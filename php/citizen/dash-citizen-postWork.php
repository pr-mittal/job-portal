<?php

include_once('../php-connection.php');
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}

$tableName="requirements";

//uidPost=bnm&categoryPost=vbnm&descriptionPost=hjk&addressPost=rtyui&cityPost=jghji
$cust_uid=$_GET["uidPost"];
$category=$_GET["categoryPost"];
$problem=$_GET["descriptionPost"];
$location=$_GET["addressPost"];
$city=$_GET["cityPost"];
$state=$_GET["statePost"];

//dont give valuue for rid and set it to auto increment
//$query="insert into $tableName (rid,cust_uid,category,problem,location,city) select max(rid)+1,'$cust_uid','$category','$problem','$location','$city' from $tableName";

//auto increment in mysql colname=rid
$query="insert into $tableName (cust_uid,category,problem,location,city,state,dop) values('$cust_uid','$category','$problem','$location','$city','$state',curdate())";
mysqli_query($connection,$query);
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
else
{
    echo "COMPLETED";
}
?>
