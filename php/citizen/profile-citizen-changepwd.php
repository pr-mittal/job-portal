<?php
include_once("../php-connection.php");
$uid=$_GET["uid"];
$previous=$_GET["previous"];
$new=$_GET["new"];

$tableName="users";

$query="select pwd from $tableName where uid='$uid'";
$table=mysqli_query($connection,$query);
if(mysqli_num_rows($table))
{
    if(mysqli_fetch_assoc($table)["pwd"]==$previous)
    {
        $query="update $tableName set pwd='$new' where uid='$uid'";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            echo "PASSWORD CHANGED";
        }
    }
    else
    {
        die("INVALID PASSWORD");
    }
}
else
{
    die("INVALID UID");
}
if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection)!="";
}


?>