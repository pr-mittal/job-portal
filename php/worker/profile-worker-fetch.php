<?php
include_once("../php-connection.php");
$tableName="workers";
$uid=$_GET["uid"];
$ary=array();

$query="select * from $tableName where uid='$uid'";
$table=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
//echo mysqli_error($connection);
?>