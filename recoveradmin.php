<div style="text-align:center; margin-top: 50px;">
<?php
include('connect.php');
$dsdas=$_POST['username'];
$resultas = $db->prepare("SELECT * FROM admin WHERE username= :a");
	$resultas->bindParam(':a', $dsdas);
	$resultas->execute();
	for($i=0; $rowas = $resultas->fetch(); $i++){
	?>
Your Password : <?php echo $rowas['password']; ?>
<?php
}
?><br>
<a href="adminlogin.php">Back</a>
</div>
