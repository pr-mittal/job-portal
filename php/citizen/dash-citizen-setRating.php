<?php
include_once("../php-connection.php");

$tableName="workers";
$uid=$_GET["uidWorker"];
$uid2=$_GET["uidCitizen"];
$rating=$_GET["rating"];

//setting rating workers table
$query="update $tableName set rating=rating+$rating,count=count+1 where uid='$uid'";
mysqli_query($connection,$query);

//deleting record from  ratings table
$tableName="ratings";
$query="delete from $tableName where citizenUid='$uid2' and workerUid='$uid'";
mysqli_query($connection,$query);


if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
else{
    echo "SUCCESS";
}
?>