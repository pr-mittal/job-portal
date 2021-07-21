<?php

include_once("../php-connection.php");

$tableName="ratings";
$citizenUid=$_GET["citizenUid"];

$query="select * from $tableName where citizenUid='$citizenUid'";
$table=mysqli_query($connection,$query);
$ary=array();

while($row=mysqli_fetch_assoc($table))
{
    $ary[]=$row;
}
if(mysqli_error($connection)=="")
{
    echo json_encode($ary);
}
else{
    echo mysqli_error($connection);
}
?>