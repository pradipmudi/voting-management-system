<?php
ob_start();
session_start();
error_reporting(0);
require_once("dbcon/dbcon.php");
if(isset($_POST['save']) && isset($_SESSION['user']))
{

$name = $_POST['name'];
$roll = $_POST['roll'];
$cr = $_POST['cr'];
$activeStatus=$_POST['activeStatus'];

if($activeStatus=='no')
{
	$sql1 = "insert into tempvotes values('','$roll','$name','$cr','1');";

$query1=mysqli_query($dbhandle,$sql1);
header('location:vote.php?vote_success=1');
	
}
else
{
$sql1 = "insert into votes values('','$roll','$name','$cr','1');";

$query1=mysqli_query($dbhandle,$sql1);
header('location:vote.php?vote_success=1');
}

}//end if
else
{
	header('location:index.php');
}
?>


