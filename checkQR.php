<?php
	include 'connection.php';
	// echo "<pre>";
	// print_r($GLOBALS);
	// echo "</pre>";
	$qid = $_GET['id'];
	session_start();
	$_SESSION['qid']=$qid;
	session_commit();
	$sql = "SELECT `qr_id` FROM `qr_register` WHERE `qr_id`= $qid";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==0)
	{
		header("Location:regQR.php?id=$qid");
	}
	else
	{
		header("Location:dashQR.php?id=$qid");
	}
?>