<?php
include_once("../php-connection.php");

$tableName="requirements";
$cust_uid=$_GET["cust_uid"];
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}
$query="select * from $tableName where cust_uid='$cust_uid'";

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