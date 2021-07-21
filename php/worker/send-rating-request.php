<?php
include_once("../php-connection.php");
$tableName="ratings";

//workerUid=aaaaaaaaaaa&citizenUid=aaaaaaaaaaaa
$citizenUid=$_GET["citizenUid"];
$workerUid=$_GET["workerUid"];

//SELECT avg(rating) FROM `ratings` WHERE rating is NOT NULL;
$query="insert into $tableName (citizenUid,workerUid) values('$citizenUid','$workerUid')";
mysqli_query($connection,$query);

if(mysqli_error($connection)=="")
{
    echo "Request Sent";
}
else{
    echo mysqli_error($connection);
}
?>