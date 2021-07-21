<?php

//setting values for updation in query
include_once("../php-connection.php");
$columns="";
$values="";
$updatequery="";
$tableName="citizens";

//if isset any field then move forward to update its value
if(isset($_POST["uid"]))
{
    $uid=$_POST["uid"];
}
else
{
    echo "UID NOT RECEIVED";
    return;
}
if(isset($_POST["name"]))
{
    $name=$_POST["name"];
    $columns=$columns."name,";
    $values=$values."'$name',";
    $updatequery=$updatequery."name='$name',";
}
if(isset($_POST["contact"]))
{
    $contact=$_POST["contact"];
    $columns=$columns."contact,";
    $values=$values."'$contact',";
    $updatequery=$updatequery."contact='$contact',";
}
if(isset($_POST["address"]))
{
    $address=$_POST["address"];
    $columns=$columns."address,";
    $values=$values."'$address',";
    $updatequery=$updatequery."address='$address',";
}
//echo $_POST["city"];
if(isset($_POST["city"]))
{
    //echo city;
    $city=$_POST["city"];
    $columns=$columns."city,";
    $values=$values."'$city',";
    $updatequery=$updatequery."city='$city',";
}
if(isset($_POST["state"]))
{
    //echo state;
    $state=$_POST["state"];
    $columns=$columns."state,";
    $values=$values."'$state',";
    $updatequery=$updatequery."state='$state',";
}
//echo $_POST["state"];
if(file_exists($_FILES['pic']['tmp_name']) || is_uploaded_file($_FILES['pic']['tmp_name']))
{
    $pic=$_FILES["pic"]["name"];

    $tmpname=$_FILES["pic"]["tmp_name"];
    $error=$_FILES["pic"]["error"];
    $size=$_FILES["pic"]["size"];
    $ext=pathinfo($pic,PATHINFO_EXTENSION);
    
    $pic=$uid.".".$ext;
    //echo $ext;
    //saving the file with the unique uid name and adding the file extension in the end
    move_uploaded_file($tmpname,"../../uploads/citizen/".$pic);
    
    $columns=$columns."pic,";
    $values=$values."'$pic',";
    $updatequery=$updatequery."pic='$pic',";

}
if(isset($_POST["email"]))
{
    $email=$_POST["email"];
    $columns=$columns."email,";
    $values=$values."'$email',";
    $updatequery=$updatequery."email='$email',";
    
}

//$uid=$_POST["uid"];
//$name=$_POST["name"];
//$contact=$_POST["contact"];
//$address=$_POST["address"];
//$city=$_POST["city"];
//$state=$_POST["state"];
//$pic=$_FILES["pic"]["name"];
//$email=$_POST["email"];


//echo $uid." ".$name." ".$contact." ".$address." "." ".$city." ".$state." ".$pic." ".$email;
//echo $columns."<br>";
//echo $values."<br>";
$columns=substr($columns,0,strlen($columns)-1);
$values=substr($values,0,strlen($values)-1);
$updatequery=substr($updatequery,0,strlen($updatequery)-1);
//echo $columns."<br>";
//echo $values."<br>";

//seding query to check if t euid aready exists or not
if(mysqli_error($connection)!="")
{
    echo "<br>".mysqli_error($connection);
}
$query="select * from $tableName where uid='$uid'";
$table=mysqli_query($connection,$query);
//if one row exists
//echo mysqli_error($connection);
//echo mysqli_num_rows($table); 
if(mysqli_num_rows($table)==1)
{
    //making query best on the above tested values that have been given values; 
    $query="update $tableName set $updatequery where uid='$uid'";
    //echo $query;
    mysqli_query($connection,$query);
    
    //unlink fetched pic-name stored in hidden,not required here as picname is the uid so auomatically pic gets replaced
    //unlink("../../uploads/".$hidden);
    
    echo "<br>".mysqli_error($connection);
    echo "Record Upadted";
}
else if(mysqli_num_rows($table)==0)
{
    //making query when new record is made with the given uidi.e. on first signin
    $query="insert into $tableName (uid,".$columns.") values('$uid',$values)";
    //echo $query;
    mysqli_query($connection,$query);
    echo "Record Created sucessfully";
    
}
else
{
    echo "<br>".mysqli_error($connection);
    echo "multiple users with same uid";
}
//echo mysqli_error($connection);
if(mysqli_error($connection)!="")
{
    echo "<br>".mysqli_error($connection);
}

header('location:../../dash-citizen.php');
?>