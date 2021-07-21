<?php
include_once("../php-connection.php");

$tableName="citizens";
$uid=$_GET["uid"];

$query="select * from $tableName where uid='$uid'";
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
