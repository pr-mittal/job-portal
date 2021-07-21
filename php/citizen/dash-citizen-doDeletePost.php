<?php
include_once("../php-connection.php");

$tableName="requirements";
$rid=$_GET["rid"];

$query="delete from $tableName where rid='$rid'";
mysqli_query($connection,$query);
if(mysqli_error($connection)=="")
{
    echo "SUCCESS";
}
else
{
    echo mysqli_error($connection);
}

?>