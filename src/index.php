<?php
ob_start();
session_start();
error_reporting(0);
if(isset($_SESSION['user']))
  {
	  require_once("../../nitwMca2015/dbcon/dbcon.php");
	  $sql1="select * from admin where username='".$_SESSION['user']."'";
	  $query1=mysqli_query($dbhandle,$sql1);
	  $num1=mysqli_num_rows($query1);
	  while($fetch=mysqli_fetch_array($query1))
	  {
		  $pic=$fetch['pic'];
		  $name=$fetch['Name'];
	  }
	  if($pic=="")
	  {
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Photo Verification</title>
<!-- Copy Right (C)ADHIR Ch Mondal -->
<link rel="stylesheet" type="text/css" href="css/font.css" />
<link rel="stylesheet" type="text/css" href="css/picedit.css" />

</head>
<body style="margin:0px;" >

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here/////////////////////////////////////////-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td width="100%">
<?php include('../../nitwMca2015/header.php');?>
</td></tr>
</table>
<br/>

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\add header here/////////////////////////////////////////-->
<center><br>
<h3>Welcome  <b><font color="#FF0000"><?php echo strtoupper($name); ?></font></b>&nbsp;</h3><br>
</center>
<center><h2>-- | CLICK YOUR PICTURE FOR VERIFICATIONS | --</h2></center><br>
<center>-- || Profile with wrong and unclear picture will be cancelled || --</center>

<form name="testform" action="out.php" method="post" enctype="multipart/form-data">

<div style="margin:10% auto 0 auto; display: table;">

<!-- begin_picedit_box -->
<div class="picedit_box">
    <!-- Placeholder for messaging -->
    <div class="picedit_message">
    	 <span class="picedit_control ico-picedit-close" data-action="hide_messagebox"></span>
        <div></div>
    </div>
    <!-- Picedit navigation -->
    <div class="picedit_nav_box picedit_gray_gradient">
    	<div class="picedit_pos_elements"></div>
       <div class="picedit_nav_elements">
			<!-- Picedit button element begin -->
			<div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-pencil" title="Pen Tool"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_3">
                    <label class="picedit_colors">
                      <span title="Black" class="picedit_control picedit_action picedit_black active" data-action="toggle_button" data-variable="pen_color" data-value="black"></span>
                      <span title="Red" class="picedit_control picedit_action picedit_red" data-action="toggle_button" data-variable="pen_color" data-value="red"></span>
                      <span title="Green" class="picedit_control picedit_action picedit_green" data-action="toggle_button" data-variable="pen_color" data-value="green"></span>
                    </label>
                    <label>
                    	<span class="picedit_separator"></span>
                    </label>
                    <label class="picedit_sizes">
                      <span title="Large" class="picedit_control picedit_action picedit_large" data-action="toggle_button" data-variable="pen_size" data-value="16"></span>
                      <span title="Medium" class="picedit_control picedit_action picedit_medium" data-action="toggle_button" data-variable="pen_size" data-value="8"></span>
                      <span title="Small" class="picedit_control picedit_action picedit_small" data-action="toggle_button" data-variable="pen_size" data-value="3"></span>
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
			<!-- Picedit button element begin -->
			<div class="picedit_element">
				<span class="picedit_control picedit_action ico-picedit-insertpicture" title="Crop" data-action="crop_open"></span>
           </div>
           <!-- Picedit button element end -->
			<!-- Picedit button element begin -->
			<div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-redo" title="Rotate"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_1">
                    <label>
                      <span>90° CW</span>
                      <span class="picedit_control picedit_action ico-picedit-redo" data-action="rotate_cw"></span>
                    </label>
                    <label>
                      <span>90° CCW</span>
                      <span class="picedit_control picedit_action ico-picedit-undo" data-action="rotate_ccw"></span>
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
           <!-- Picedit button element begin -->
            <div class="picedit_element">
           	 <span class="picedit_control picedit_action ico-picedit-arrow-maximise" title="Resize"></span>
             	 <div class="picedit_control_menu">
               	<div class="picedit_control_menu_container picedit_tooltip picedit_elm_2">
                    <label>
						<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="resize_image"></span>
						<span class="picedit_control picedit_action ico-picedit-close" data-action=""></span>
                    </label>
                    <label>
                      <span>Width (px)</span>
                      <input type="text" class="picedit_input" data-variable="resize_width" value="0">
                    </label>
                    <label class="picedit_nomargin">
                    	<span class="picedit_control ico-picedit-link" data-action="toggle_button" data-variable="resize_proportions"></span>
                    </label>
                    <label>
                      <span>Height (px)</span>
                      <input type="text" class="picedit_input" data-variable="resize_height" value="0">
                    </label>
                  </div>
               </div>
           </div>
           <!-- Picedit button element end -->
       </div>
	</div>
	<!-- Picedit canvas element -->
	<div class="picedit_canvas_box">
		<div class="picedit_painter">
			<canvas></canvas>
		</div>
		<div class="picedit_canvas">
			<canvas></canvas>
		</div>
		<div class="picedit_action_btns active">
          <div class="picedit_control ico-picedit-picture" data-action="load_image"></div>
          <div class="picedit_control ico-picedit-camera" data-action="camera_open"></div>
          <div class="center">or copy/paste image here</div>
		</div>
	</div>
	<!-- Picedit Video Box -->
	<div class="picedit_video">
    	<video autoplay></video>
		<div class="picedit_video_controls">
			<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="take_photo"></span>
			<span class="picedit_control picedit_action ico-picedit-close" data-action="camera_close"></span>
		</div>
    </div>
    <!-- Picedit draggable and resizeable div to outline cropping boundaries -->
    <div class="picedit_drag_resize">
    	<div class="picedit_drag_resize_canvas"></div>
		<div class="picedit_drag_resize_box">
			<div class="picedit_drag_resize_box_corner_wrap">
           	<div class="picedit_drag_resize_box_corner"></div>
			</div>
			<div class="picedit_drag_resize_box_elements">
				<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="crop_image"></span>
				<span class="picedit_control picedit_action ico-picedit-close" data-action="crop_close"></span>
			</div>
       </div>
    </div>
</div>
<!-- end_picedit_box -->


</div>

<div style="margin-top:30px; text-align: center;">
    <button type="submit">Submit</button>
</div>

</form>

<div style="margin-top:30px; text-align: center;">
   <form action="../vote.php"> <button type="submit">Click Here to Vote Now !</button></form>
</div>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="js/picedit.js"></script>
<script type="text/javascript">
	$(function() {
		$('.picedit_box').picEdit({
			imageUpdated: function(img){
			},
			formSubmitted: function(){
			},
			redirectUrl: false,
            defaultImage: false
		});
	});
</script>
<br><br>
<div class = "veri">
<marquee behavior="alternate" bgcolor="yellow" scrollamount="2">Hum Photo verification kar rahe hai taki Koi Double VOTING na kar Paye..     We gurantee that your Data Will be Erased After finishing the voting Process.</marquee>
</div>
</body>
</html>


<?php 
	  }
	  else
	  {
		  header('location:../../nitwMca2015/vote.php');
	  }
}
else
{
	header('location:/../nitwMca2015/index.php');
}
 ?>
 
 