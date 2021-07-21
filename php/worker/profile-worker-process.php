<?php
//setting values for updation in query
include_once("../php-connection.php");
$columns="";
$values="";
$updatequery="";
$tableName="workers";

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
if(isset($_POST["email"]))
{
    $email=$_POST["email"];
    $columns=$columns."email,";
    $values=$values."'$email',";
    $updatequery=$updatequery."email='$email',";
    
}
if(isset($_POST["cnumber"]))
{
    $cnumber=$_POST["cnumber"];
    $columns=$columns."cnumber,";
    $values=$values."'$cnumber',";
    $updatequery=$updatequery."cnumber='$cnumber',";
}
if(isset($_POST["wname"]))
{
    $wname=$_POST["wname"];
    $columns=$columns."wname,";
    $values=$values."'$wname',";
    $updatequery=$updatequery."wname='$wname',";
}
if(isset($_POST["firmshop"]))
{
    $firmshop=$_POST["firmshop"];
    $columns=$columns."firmshop,";
    $values=$values."'$firmshop',";
    $updatequery=$updatequery."firmshop='$firmshop',";
}

if(isset($_POST["address"]))
{
    $address=$_POST["address"];
    $columns=$columns."address,";
    $values=$values."'$address',";
    $updatequery=$updatequery."address='$address',";
}
if(isset($_POST["city"]))
{
    $city=$_POST["city"];
    $columns=$columns."city,";
    $values=$values."'$city',";
    $updatequery=$updatequery."city='$city',";
}
if(isset($_POST["stat"]))
{
    $stat=$_POST["stat"];
    $columns=$columns."stat,";
    $values=$values."'$stat',";
    $updatequery=$updatequery."stat='$stat',";
}
if(isset($_POST["category"]))
{
    $category=$_POST["category"];
    $columns=$columns."category,";
    $values=$values."'$category',";
    $updatequery=$updatequery."category='$category',";
}
if(isset($_POST["spl"]))
{
    $spl=$_POST["spl"];
    $columns=$columns."spl,";
    $values=$values."'$spl',";
    $updatequery=$updatequery."spl='$spl',";
}
if(isset($_POST["exp"]))
{
    $exp=$_POST["exp"];
    $columns=$columns."exp,";
    $values=$values."'$exp',";
    $updatequery=$updatequery."exp='$exp',";
}
if(isset($_POST["otherinfo"]))
{
    $otherinfo=$_POST["otherinfo"];
    $columns=$columns."otherinfo,";
    $values=$values."'$otherinfo',";
    $updatequery=$updatequery."otherinfo='$otherinfo',";
}

if(file_exists($_FILES['apic']['tmp_name']) || is_uploaded_file($_FILES['apic']['tmp_name']))
{
    $apic=$_FILES["apic"]["name"];

    $tmpname=$_FILES["apic"]["tmp_name"];
    $error=$_FILES["apic"]["error"];
    $size=$_FILES["apic"]["size"];
    $ext=pathinfo($apic,PATHINFO_EXTENSION);
    
    $apic=$uid.".".$ext;
    //echo $ext;
    //saving the file with the unique uid name and adding the file extension in the end
    $done=move_uploaded_file($tmpname,"../../uploads/worker/aadhar/".$apic);
    //echo $error;
    $columns=$columns."apic,";
    $values=$values."'$apic',";
    $updatequery=$updatequery."apic='$apic',";

}
if(file_exists($_FILES['ppic']['tmp_name']) || is_uploaded_file($_FILES['ppic']['tmp_name']))
{
    $ppic=$_FILES["ppic"]["name"];

    $tmpname=$_FILES["ppic"]["tmp_name"];
    $error=$_FILES["ppic"]["error"];
    $size=$_FILES["ppic"]["size"];
    $ext=pathinfo($ppic,PATHINFO_EXTENSION);
    
    $ppic=$uid.".".$ext;
    //echo $ext;
    //saving the file with the unique uid name and adding the file extension in the end
    move_uploaded_file($tmpname,"../../uploads/worker/".$ppic);
    $columns=$columns."ppic,";
    $values=$values."'$ppic',";
    $updatequery=$updatequery."ppic='$ppic',";

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
header('location:../../dash-worker.php');

?>