<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
  {
	  error_reporting(0);
	  header('location:vote.php');
  }
  else
  {
?>
<html>
<head>
<title>CR ELECTIONS</title>
</head>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>

<script type="text/javascript">
function validate()
{
   if( document.login.user_id.value == "" )
   {
     alert( "Please enter your User ID!!" );
     document.login.user_id.focus() ;
     return false;

   }
   if( document.login.Password.value == "" )
   {
     alert( "Please enter your Password!!" );
     document.login.Password.focus() ;
     return false;

   }
   return( true );
}
</script>


<script type = "text/javascript">
function alphanumeric(alphane)
{
	var numaric = alphane;
	for(var j=0; j<numaric.length; j++)
		{
		  var alphaa = numaric.charAt(j);
		  var hh = alphaa.charCodeAt(0);
		  if((hh > 47 && hh<58) || (hh > 64 && hh<91) || (hh > 96 && hh<123))
		  {
		  }
		else	{
                         alert("PLEASE ENTER ONLY ALPHANEWMERIC WORD");
						document.login.Password.value = "";
						 Password.focus();
						 
						 
			 return false;
		  }
 		}
  return true;
}
</script>
<body style="margin:0px;" >

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here/////////////////////////////////////////-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td width="100%">
<?php include('top_header.php');?>
</td></tr>
</table>
<br/>
<table width="80%" border="0" cellspacing="4" cellpadding="0" align="right">
  <tr>
    <td>
    
    <form name="f1" action="signUp.php" method="post" enctype="multipart/form-data">
    
    <table width="40%" border="0" cellspacing="8" cellpadding="0" align="right">  
    <tr bgcolor="#000000">
    <td colspan="2" align="center"><font color="#FFFFFF"><h2>Sign up for CR voting</h2></font><b>
	<?php $signupSuccess=$_GET['signup_success'];
		  $alreadyExists=$_GET['alreadyExists'];
		  $signUpFailed=$_GET['signUpFailed'];
			if($signupSuccess==1)
			{
	?>
      <font color="#00FF00" size="+1"><b>You have signed up successfully!!</b></font><br><br>


      <?php }	
	?>
      <?php 
	
	
	if($signUpFailed==1)
			{
	?>
      <font color="#FFA29F" size="+1"><b>Sign Up failed!!Contact Kundan!</b></font><br><br>


      <?php }	
	?>
          <?php 
	
	
	if($alreadyExists==1)
			{
	?>
      <font color="#FFA29F" size="+1"><b>Already registered with this roll and registration!!If you haven't did this Contact Kundan!</b></font><br><br>


      <?php }	
	?>
    </b>
    </td>
    </tr>
    <tr>
    <td align="left"><b> Full Name : </b></td>
    <td align="left"><input type="text" name="name" placeholder="Enter full name here" required></td>
  </tr>  
  <tr>
    <td align="left"><b>Registration No. : </b></td>
    <td align="left"><input type="text" name="regNo" placeholder="Enter Registration no. here" required></td>
  </tr>  
  <tr>
    <td align="left"><b>Roll No. : </b></td>
    <td align="left"><input type="text" name="rollNo" placeholder="Enter Roll no. here" required></td>
  </tr>  
  <tr>
    <td align="left"><b>Username : </b></td>
    <td align="left"><input type="text" name="username" placeholder="Enter username here" required></td>
  </tr>
  <tr>
    <td align="left"><b>Password : </b></td>
    <td align="left"><input type="password" name="password" placeholder="Enter password here" required></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="save" value="Sign up for voting" style="width:200px;height:30px;"></td>
    </tr>  

</table>

    </form>
    
    </td>

  </tr>
</table>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here////////////////////////////////////////--><br/>

<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! add footer here !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->


   
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! add footer here !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
   

</body>
</html>

<?php 

	
}
 ?>