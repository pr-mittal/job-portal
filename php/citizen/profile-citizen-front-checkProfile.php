
<?php
include_once("../php-connection.php");

$tableName="users";
$uid=$_GET["uid"];
$email=$_GET["email"];
$cnumber=$_GET["contact"];

//checking for copy of email
$query="select * from $tableName where (not (uid ='$uid') )and (email='$email') and not(email is NULL)";
//or mobile='$cnumber')
$table=mysqli_query($connection,$query);
if(mysqli_num_rows($table))
{
    die("EMAIL");
}

//checking for copy of mobile number
$query="select * from $tableName where (not (uid ='$uid') )and (mobile='$cnumber') ";
//or mobile='$cnumber')
$table=mysqli_query($connection,$query);
if(mysqli_num_rows($table))
{
    die("MOBILE");
}

$tableName="users";
//updating email and mobile and uid in table
$query="update $tableName set uid='$cnumber',email='$email',mobile='$cnumber' where uid ='$uid' ";
//or mobile='$cnumber')
mysqli_query($connection,$query);

//updating uid in all tables
$tableName="requirements";
$query="update $tableName set cust_uid='$cnumber' where cust_uid ='$uid' ";
mysqli_query($connection,$query);
//updating uid in all tables
$tableName="ratings";
$query="update $tableName set citizenUid='$cnumber' where citizenUid ='$uid' ";
mysqli_query($connection,$query);
//updating uid in all tables
$tableName="citizens";
$query="update $tableName set uid='$cnumber' where uid ='$uid' ";
mysqli_query($connection,$query);


if(mysqli_error($connection)!="")
{
    echo mysqli_error($connection);
}

session_start();
$_SESSION["activeUser"]=$cnumber;
echo "TRUE";
?>