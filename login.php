<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect('localhost','root',"");
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link,'onlinevoting');
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		global $link;
		$str = @trim($str);
		$str = stripslashes($str);
		return mysqli_real_escape_string($link,$str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
	$position = clean($_POST['asas']);
	$stat='notvoted';
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
	if($position=='Admin') {
	$qry="SELECT * FROM admin WHERE username='$login' AND password='$password'";
	}
	if($position=='Student') {
	$qry="SELECT * FROM students WHERE username='$login' AND password='$password' AND status='$stat'";
	}
	$result=mysqli_query($link,$qry);
	// echo $qry;
	// exit;
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			
			if($position=='Student') {
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['username'];
			$_SESSION['SESS_COURSE'] = $member['course'];
			$_SESSION['NAME'] = $member['name'];
			session_write_close();
			header("location: candidates_list.php");
			exit();
			}
			if($position=='Admin') {
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			session_write_close();
			header("location: admin/index.php");
			exit();
			}
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>