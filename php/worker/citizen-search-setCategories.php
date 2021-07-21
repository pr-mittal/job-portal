<?php
include_once("../php-connection.php");

$tableName="requirements";

$query="select distinct category from $tableName where abs(DATEDIFF(curdate(),dop))<10";

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