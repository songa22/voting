<?php
	require_once('auth.php');
?>
<?php
include('connect.php');
$dsdsss='Senator';
$sadsdsd = $db->prepare("SELECT count(*) FROM candidates WHERE position= :a");
	$sadsdsd->bindParam(':a', $dsdsss);
	$sadsdsd->execute();
	$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
	$wapakpak=$rowaas[0];
?>
<html>
<head>
<title>WELCOME <?php echo $_SESSION['NAME']; ?></title>
<link rel="icon" type="image/png" href="favicon.png" />
<style class="csscreations">

/*basic reset*/
* {margin: 0; padding: 0;}

html {
	height: 100%;
	background: #ffffff;
}

body {
	font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
	width: 600px;
	margin: 50px auto;
	text-align: center;
	position: relative;
	margin-top: 25px;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	text-align: left;
	
	-moz-box-sizing: border-box;
	width: 100%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea, #msform select {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	-moz-box-sizing: border-box;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
#msform #submit {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform #submit:hover, #msform #submit:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
	width: 100%;
	text-align: center;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: 9.1%;
	float: left;
	position: relative;
	text-align: center;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
#logo {
	margin: 25px auto;
	width: 500px;
}
#logo img {
	float: left;
}
.clearfix {
	clear: both;
}
#logo span {
	display: inline-block;
    font-size: 17px;
    vertical-align: middle;
	margin-top: 34px;
	color: #000000;
}



</style>
<script type="text/javascript">
function UpdateCost() {
  var sum = 0;
  var gn, elem;
  for (i=0; i<<?php echo $wapakpak ?>; i++) {
    gn = 'sum_m_'+i;
    elem = document.getElementById(gn);
    if (elem.checked == true) { sum += 1; }
	//if (elem.checked == true) { sum += Number(elem.value); }
  }
  document.getElementById('totalcost' ).value = sum.toFixed(0);
}
window.onload=UpdateCost
</script>
<script type="text/javascript">
function sapatka() {
var y=document.forms["joe"]["sen"].value;
if ((y > 12))
  {
  alert("you must select Only 12 senators");
  return false;
  }
}
</script>
</head>
<body>
	<!-- multistep form -->
<form id="msform" name="joe" action="preview.php" method="POST" onsubmit="return sapatka()">
	<!-- progressbar -->
	
	<!-- fieldsets -->
	<?php
	$resultasa = $db->prepare("SELECT * FROM position");
		$resultasa->execute();
		for($i=0; $rowasa = $resultasa->fetch(); $i++){
		$exrxrxrx=$rowasa['name'];
		if($exrxrxrx=='President'){
		?>
		
	<fieldset>
		<h2 class="fs-title"><?php echo $rowasa['name'] ?></h2>
		<h3 class="fs-subtitle">Pls. Select Only One</h3> 
		<select name="<?php echo $rowasa['name'] ?>" style="height: 51px;">
		<option value="0">Pls. Select <?php echo $rowasa['name'] ?></option>
		<?php
		$dsds=$rowasa['name'];
		$results = $db->prepare("SELECT * FROM candidates WHERE position= :a");
			$results->bindParam(':a', $dsds);
			$results->execute();
			for($i=0; $rows = $results->fetch(); $i++){
				?>
				<option style="padding: 35px 50px 35px 80px; background:url('admin/candidates/<?php echo $rows['image']; ?>')  no-repeat scroll 5px 7px / 70px auto rgba(0, 0, 0, 0);" value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?> - <?php echo $rows['party'] ?></option>
				<?php
			}
		?>
		</select>
		<input type="button" value="Next" class="next action-button" name="next">
	</fieldset>
	<?php
	}
	if(($exrxrxrx!='President') AND ($exrxrxrx!='Senator') AND ($exrxrxrx!='Representative')){
	?>
	<fieldset>
		<h2 class="fs-title"><?php echo $rowasa['name'] ?></h2>
		<h3 class="fs-subtitle">Pls. Select Only One</h3>
		<select name="<?php echo $rowasa['name'] ?>" style="height: 51px;">
		<option value="0">Pls. Select <?php echo $rowasa['name'] ?></option>
		<?php
		include('connect.php');
		$dsds=$rowasa['name'];
		$results = $db->prepare("SELECT * FROM candidates WHERE position= :a");
			$results->bindParam(':a', $dsds);
			$results->execute();
			for($i=0; $rows = $results->fetch(); $i++){
				?>
				
				<option style="padding: 35px 50px 35px 80px; background:url('admin/candidates/<?php echo $rows['image']; ?>')  no-repeat scroll 5px 7px / 70px auto rgba(0, 0, 0, 0);" value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?> - <?php echo $rows['party'] ?></option>
				
				<?php
			}
		?>
		</select>
		<input type="button" value="Previous" class="previous action-button" name="previous">
		<input type="button" value="Next" class="next action-button" name="next">
	</fieldset>
	<?php
	}
	if($exrxrxrx=='Senator'){
	?>
	<fieldset>
		<h2 class="fs-title">Senator</h2>
		<h3 class="fs-subtitle">Pls. Select Only 12 <span id="payment-total"></span></span>
		</h3>
		<?php
		$dsds=$rowasa['name'];
		$results = $db->prepare("SELECT * FROM candidates WHERE position= :a");
			$results->bindParam(':a', $dsds);
			$results->execute();
			for($i=0; $rows = $results->fetch(); $i++){
		?>
		<div style="height: 64px; padding-top: 10px; padding-bottom: 10px;"><INPUT TYPE="checkbox" NAME="votes[]" value="<?php echo $rows['name'] ?>" id="sum_m_<?php echo $i ?>" onclick="UpdateCost()" style="width: 21px;">
		<img src="admin/candidates/<?php echo $rows['image']; ?>" width="70" height="70" style="margin-bottom: -26px;" /><?php echo $rows['name']; ?> - <?php echo $rows['party']; ?></div>
		<?php
		}
		?>
		<input type="button" value="Previous" class="previous action-button" name="previous">
		<input type="button" value="Next" class="next action-button" name="next" onclick="sapatka()">
		<input type="hidden" name="sen" id="totalcost" value="">
	</fieldset>
	<?php
	}
	if($exrxrxrx=='Representative'){
	?>
	<fieldset>
		<h2 class="fs-title"><?php echo $rowasa['name'] ?></h2>
		<h3 class="fs-subtitle">Pls. Select Only One</h3>
		<select name="<?php echo $rowasa['name'] ?>" style="height: 51px;">
		<option value="0">Pls. Select <?php echo $rowasa['name'] ?></option>
		<?php
		include('connect.php');
		$dsds=$rowasa['name'];
		$faunc=$_SESSION['SESS_COURSE'];
		$results = $db->prepare("SELECT * FROM candidates WHERE position= :a AND course= :b");
			$results->bindParam(':a', $dsds);
			$results->bindParam(':b', $faunc);
			$results->execute();
			for($i=0; $rows = $results->fetch(); $i++){
				?>
				
				<option style="padding: 35px 50px 35px 80px; background:url('admin/candidates/<?php echo $rows['image']; ?>')  no-repeat scroll 5px 7px / 70px auto rgba(0, 0, 0, 0);" value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?> - <?php echo $rows['party'] ?></option>
				
				<?php
			}
		?>
		</select>
		<input type="button" value="Previous" class="previous action-button" name="previous">
		<input type="button" value="Next" class="next action-button" name="next">
	</fieldset>
	<?php
	}
	}
	?>
	<fieldset>
		<h2 class="fs-title">You Are now About to Submit you votes</h2>
		<input type="button" value="Previous" class="previous action-button" name="previous">
		<input type="submit" value="Submit" name="submit" id="submit">
	</fieldset>
</form>
<!-- jQuery -->
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<!-- jQuery easing plugin -->
<script type="text/javascript" src="jquery.easing.min.js"></script><script>//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
</script>
</body>
</html>