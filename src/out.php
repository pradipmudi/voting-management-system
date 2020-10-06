<?php
ob_start();
session_start();
error_reporting(0);
if(isset($_SESSION['user']))
  {
	  require_once("../../nitwMca2015/dbcon/dbcon.php");
?>

<?php

echo "** Post Array **\n";
print_r($_POST);

echo "** Files Array **\n";
print_r($_FILES);

echo "** Image **\n";
foreach($_FILES as $file) {
	$imgData = base64_encode(file_get_contents($file['tmp_name']));
	$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;

	echo '<img src="'.$src.'"><br>';
}
	$sql1="update admin set pic='$src' where username='".$_SESSION['user']."'";
	$query1=mysqli_query($dbhandle,$sql1);
	header('location:../vote.php');


?>

<?php 
}
else
{
	header('location:../../nitwMca2015/index.php');
}
 ?>