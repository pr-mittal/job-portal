<?php
include_once("../php-connection.php");

$tableName="requirements";
$category=$_GET["category"];

$query="select distinct city from $tableName where abs(DATEDIFF(curdate(),dop))<10 AND category='$category'";

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