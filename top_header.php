

<link rel="stylesheet" href="styles/navi.css" type="text/css" />
<style type="text/css">
.style6 {color: #000000; font-weight: bold; }
</style>
<link rel="stylesheet" href="css/style.css" type="text/css" />
	<!-- Mootools CORE -->
	<script type="text/javascript" src="js/mootools-release-1.11.js"></script>
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#BBBBBB" align="left">
<tr bgcolor="#000000">
<td bgcolor="black" align="left" width="100%" ><font color="#FFFFFF">
<h2><?php echo "&nbsp;&nbsp;&nbsp;CR ELECTIONS 2016" ;?></h2>
</font>
</td>
<td>
<form name="login" method="post" action="admaction.php" onsubmit="return(validate());">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
        <tr bgcolor="">
          <td colspan="5" align="center"><?php
		error_reporting(0);

	$response=0;
	$response = $_GET['response'];	
	if($_GET['response']==1)
	{
	?>
            <label for="User"><font color="#FF3333"><b>User Id or Password is not Valid</b></font></label>
            <?php }?>
            &nbsp;</td>
        </tr>
        <tr bgcolor="">
          <td align="left"><font color="#FFFFFF">Username </font></td>
          <td><input type="text" name="user_id" placeholder="Username"/></td>        
          <td align="left"><font color="#FFFFFF">Password</font></td>
          <td align="left"><input type="password" onKeyUp="alphanumeric(login.Password.value)" name="Password" placeholder="Password"/></td>
          <td align="center"><input type="Submit" name="adm_login" value="Log In"/></td>
        </tr>
      </table>
    </form>
</td>
</tr>
</table>
