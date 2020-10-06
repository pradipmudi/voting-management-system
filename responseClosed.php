<?php
ob_start();
session_start();
error_reporting(0);
if(isset($_SESSION['user']))
  {
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Voting Closed</title>
</head>

<body><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<center><b><br>
<font size="+2" color="#FF0000">Voting Closed!!</font>
<br>
<br>
<font size="+2" color="#0000FF">
We have stopped taking responses as elections are over. Thanks for your precious time. Have a nice day.</font> <font size="+4">:)</font> </b></center><br>
<br>
<br>
<center>
<a class="active" href="../../nitwMca2015/logout.php" title="Logout">Click here to go to LOGOUT</a>
</center>
</body>
</html>

<?php 
}
else
{
	header('location:index.php');
}

 ?>