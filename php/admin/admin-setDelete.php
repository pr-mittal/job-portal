
<?php
//deletion of image

include_once("../php-connection.php");
$uid=$_GET["uid"];
$category=$_GET["category"];
//delete from users
$tableName="users";


$query="delete from $tableName where uid='$uid'";
mysqli_query($connection,$query);

if($category=="CITIZEN")
{
  
  $tableName="citizens";
  //getting images from citizens/worker
  $query="select pic from $tableName where uid='$uid'";
  $table=mysqli_query($connection,$query);
  if(mysqli_num_rows($table))
  {
    $row=mysqli_fetch_assoc($table);
    unlink("../../uploads/citizen/".$row["pic"]);
  }
  
  //delete from citizens/worker
  $query="delete from $tableName where uid='$uid'";
  mysqli_query($connection,$query);
  
  //delete from ratings
  $tableName="ratings";
  $query="delete from $tableName where citizenUid='$uid'";
  mysqli_query($connection,$query);
  
  //delete form requirements
  $tableName="requirements";
  $query="delete from $tableName where cust_uid='$uid'";
  
}
else if($category=="WORKER")
{
  $tableName="workers";
  //getting images from citizens/worker
  $query="select apic,ppic from $tableName where uid='$uid'";
  $table=mysqli_query($connection,$query);
  if(mysqli_num_rows($table))
  {
    $row=mysqli_fetch_assoc($table);
    unlink("../../uploads/worker/aadhar/".$row["apic"]);
    unlink("../../uploads/worker/".$row["ppic"]);
  }
  //delete from citizens/worker
  $query="delete from $tableName where uid='$uid'";
  mysqli_query($connection,$query);
  
  //delete from ratings
  $tableName="ratings";
  $query="delete from $tableName where workerUid='$uid'";
  mysqli_query($connection,$query);
  
}
if(mysqli_error($connection)!="")
{
  echo mysqli_error($connection);
}

?>