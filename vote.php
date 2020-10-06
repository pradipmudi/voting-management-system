<?php
ob_start();
session_start();
error_reporting(0);
//echo $_SESSION['type'];
/*if(($_SESSION['type']!='super') && ($_SESSION['type']!='other'))
{
header('location:responseClosed.php');
}
else {*/
if(isset($_SESSION['user']))
  {
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CR Voting</title>
</head>

<body style="margin:0px;" >

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here/////////////////////////////////////////-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td width="100%">
<?php include('header.php');?>
</td></tr>
</table>
<br/>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here/////////////////////////////////////////-->

<?php
	require_once("dbcon/dbcon.php");
	$sql1="select * from admin where username='".$_SESSION['user']."'";
	$query1=mysqli_query($dbhandle,$sql1);
	while($fetch=mysqli_fetch_array($query1))
	{
		$type=$fetch['type'];
		$name=$fetch['Name'];
		$roll=$fetch['rollNo'];
		$activeStatus=$fetch['activeStatus'];
		$img=$fetch['pic'];
	}
	if($img=="")
	{
		header('location:src/index.php');
	}
	$sql2="select * from votes where roll='$roll'";
	$query2=mysqli_query($dbhandle,$sql2);
	while($fetch=mysqli_fetch_array($query2))
	{
		$votedStatus1=$fetch['votedStatus'];
	}
	$sql3="select * from tempvotes where roll='$roll'";
	$query3=mysqli_query($dbhandle,$sql3);
	while($fetch=mysqli_fetch_array($query3))
	{
		$votedStatus2=$fetch['votedStatus'];
	}
?>

<?php
		$vote_success=$_GET['vote_success']; 
		if($votedStatus1==1 || $votedStatus2==1 || $vote_success==1)
		{
		
?><br>

<center><br>
<h3>Welcome  <b><font color="#FF0000"><?php echo strtoupper($name); ?></font></b>&nbsp;</h3><br>

<font color="#43B154" size="+2"><b>You have voted successfully!! Thanks for the response. Election results will be published soon!!</b></font>
</center>
<br>

<?php 	}

		else
		{

?>
<form name="f2" method="post" enctype="multipart/form-data" action="voteSubmit.php">


<table width="20%" border="0" cellspacing="4" cellpadding="0" align="center" bgcolor="#81CDC9">
	<tr><td colspan="2" align="center"></td></tr>
	<tr>
    <th colspan="2" scope="row"><h2>Choose Your CR</h2></th>
  </tr>
  <tr>
    <td><font size="+2">Abhishek Kasera</font></td>
    <td><input type="radio" style="height:40px;width:50px;" name="cr" value="kasera" required></td>
  </tr>
    <tr>
    <td><font size="+2">Ravi Maurya</font></td>
    <td><input type="radio" style="height:40px;width:50px;" name="cr" value="maurya" required></td>
  </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="hidden" value="<?php echo $name;?>" name="name">
    <input type="hidden" value="<?php echo $activeStatus;?>" name="activeStatus">
    <input type="hidden" value="<?php echo $roll;?>" name="roll">
    <input type="submit" name="save" value="Vote Now" style="height:40px;width:100px;"></td>
    </tr>
</table>

</form>
<?php }?>

</body>
</html>


<?php 
}
else
{
	header('location:index.php');
}

 ?>