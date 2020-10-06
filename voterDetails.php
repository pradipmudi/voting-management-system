<?php
ob_start();
session_start();
error_reporting(0);
require_once("dbcon/dbcon.php");
if(isset($_SESSION['user']))
{
	$deletedRoll=$_GET['deletedRoll'];
	$activatedRoll=$_GET['activatedRoll'];
	if(isset($_POST['activate']))
	{
		$roll=$_POST['roll'];
		echo "roll=".$roll;
		$sql1="update admin set activeStatus='yes' where rollNo='$roll'";
		$query1=mysqli_query($dbhandle,$sql1);
		$sql3="select * from tempvotes where roll='$roll'";
		echo "sql3=".$sql3;
		$query3=mysqli_query($dbhandle,$sql3);
		$num2=mysqli_num_rows($query3);
		echo "num=".$num;
		if($num2>0)
		{
		while($fetch=mysqli_fetch_array($query3))
		{
			$roll=$fetch['roll'];
			$name=$fetch['name'];
			$crName=$fetch['crName'];
			$votedStatus=$fetch['votedStatus'];
		}
		$sql4="insert into votes values('','$roll','$name','$crName','$votedStatus')";
		echo "sql4=".$sql4;
		$query4=mysqli_query($dbhandle,$sql4);
		}
		
		header('location:voterDetails.php?activatedRoll='.$roll.'');
	}
	else if(isset($_POST['block']))
	{
		$roll=$_POST['roll'];
		$sql1="delete from admin where rollNo='$roll'";
		$query1=mysqli_query($dbhandle,$sql1);
		header('location:voterDetails.php?deletedRoll='.$roll.'');
	}
	$sql2="select * from admin where type!='super' and activeStatus='no'";
	$query2=mysqli_query($dbhandle,$sql2);
	$num=mysqli_num_rows($query2);
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Details</title>
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

<table width="80%" border="0" cellspacing="4" cellpadding="0" align="center" bgcolor="#CCCCCC">
<tr>
<td colspan="5" align="center"><b>
  <?php
			if($activatedRoll>157900)
			{
	?>
  <font color="#0000FF" size="+2"><b>Roll No. <?php echo $activatedRoll;?> has been successfully activated.</b></font><br>
  <?php }	
	?>
  <?php 
	
	
	if($signUpFailed>157900)
			{
	?>
  <font color="#FFA29F" size="+1"><b>Roll No. <?php echo $activatedRoll;?> has been successfully deleted.</b></font><br>
  <?php }	
	?>
</b>

</td>
</tr>
  <tr>
    <td align="left"><b>&nbsp;Name</b></td>
    <td align="center"><b>Roll&nbsp;</b></td>
    <td align="center"><b>Registration No&nbsp;</b></td>
    <td align="center"><b>Photo&nbsp;</b></td>
    <td align="center"><b>Active&nbsp;</b></td>
  </tr>
 <?php 
 			
		$i=0;
 	if($num>0)
	{
 		while($fetch=mysqli_fetch_array($query2))
		{
 ?>
 <form name="<?php echo "f".$i;?>" method="post" enctype="multipart/form-data" action="voterDetails.php">
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;<?php echo strtoupper($fetch['Name']);?></td>
    <td align="center">&nbsp;<?php echo $fetch['rollNo'];?></td>
    <td align="center">&nbsp;<?php echo strtoupper($fetch['regNo']);?></td>
    <td align="center">&nbsp;<input type="hidden" name="roll" value="<?php echo $fetch['rollNo'];?>"><img src="<?php echo $fetch['pic'];?>" height="160" width="140"/></td>
    <td align="center">
    <input type="submit" value="&#10003;" name="activate" style="font-size:18px; color:#0C0;">
    <input type="submit" value="&#10008;" name="block" style="font-size:18px; color:#F00;">
    </td>
  </tr>
  </form>
  <?php $i++;}
	}
	else
	{
  ?>
  <tr><td colspan="5" align="center"><font size="+1" color="#FF0000"><b>No records found!!</b></font></td></tr>
  <?php }?>
</table>

</body>
</html>

<?php
}//end if
else
{
	header('location:index.php');
}
?>
