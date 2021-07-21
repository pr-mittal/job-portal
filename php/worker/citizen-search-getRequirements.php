<?php
include_once("../php-connection.php");

$tableName="requirements";
$category=$_GET["category"];
$city=$_GET["city"];

$query="select * ,DATE_FORMAT(DATE_ADD(dop,INTERVAL 10 DAY), '%d-%M-%y') as lastDate from $tableName where abs(DATEDIFF(curdate(),dop))<10 AND category='$category' AND city='$city'";
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
