<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_COURSE']);
	unset($_SESSION['NAME']);
?>
<html>
<head>
<title>
PSU Automated Voting
</title>
<link rel="icon" type="image/png" href="favicon.png" />
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link href="admin/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="admin/lib/jquery.js" type="text/javascript"></script>
<script src="admin/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'admin/src/loading.gif',
      closeImage   : 'admin/src/closelabel.png'
    })
  })
</script>
</head>
<body>

<div id="loginform">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: #FFFFFF; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<form action="login.php" method="post">
<span>Reg Number :</span><input type="text" name="username" /><br><br>
<span>Password :</span><input type="password" name="password" /><br><br>
<span style="display: none;">Type :</span>
<select name="asas" style="display: none;">
<option>Admin</option>
</select>
<span>&nbsp;</span><span style="font-size: 11px; font-weight: normal; width: 170px; text-align: left;">Forgot Password? click <a rel="facebox" href="pwordrecoveradmin.php">Here</a></span><br><br>
<span>&nbsp;</span><input id="btn" type="submit" value="Login" />
</form>
</div>
</body>
</html>