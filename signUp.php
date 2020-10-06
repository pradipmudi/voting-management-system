<?php
ob_start();
session_start();
echo "roll=".$_POST['rollNo'];
if(isset($_POST['save']))
{
require_once("dbcon/dbcon.php");
$name=$_POST['name'];
$registrationNo=$_POST['regNo'];
$rollNo=$_POST['rollNo'];
echo "roll=".$rollNo;
$userId=$_POST['username'];
$password=$_POST['password'];
$rollValidate=explode("1579",$rollNo);
$registrationValidate=explode("MC151",strtoupper($registrationNo));
$validatedRoll=$rollValidate[0].$rollValidate[1];
$validatedReg=$registrationValidate[0].$registrationValidate[1];
if( ($validatedRoll>=1 && $validatedRoll<=42) && ($validatedReg>=1 && $validatedReg<=45))
{
	$sql1="select * from admin where rollNo='$rollNo' or regNo='$registrationNo'";
	$query1=mysqli_query($dbhandle,$sql1);
	$num3=mysqli_num_rows($query1);
	if($num>0)
	{
		header('location:index.php?alreadyExists=1');
	}
	else
	{
	$sql="insert into admin values('$name','$userId','$password','','$rollNo','$registrationNo','no','')";
	$query=mysqli_query($dbhandle,$sql);
	$_SESSION['user']=$userId;
	header('location:vote.php?signup_success=1');
	}
}
else
{
	header('location:index.php?signUpFailed=1');
}

}


?>