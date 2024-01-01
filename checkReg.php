<?php  
	include_once 'connection.php';
	echo "<pre>";
	print_r($GLOBALS);
	echo "</pre>";
	if(isset($_POST['signin']))
	{
		session_start();
		echo "Button Pressed";
		$email = $_POST['your_email'];
		$pass = $_POST['your_pass'];
		$sql = "SELECT `mu_id` FROM `main_user` WHERE `email` = '$email' AND `passw` = '$pass'";
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)>0)
		{
			echo "<pre>";
			while($i=mysqli_fetch_assoc($res))
			{
				$id = $i['mu_id'];
			}
			echo "</pre>";
			echo "<br><br>ID :$id";
			$_SESSION['id']=$id;
			session_commit();
			header("Location: details.php");
		}
		else
		{
			header("Location: regQR.php?err=1");
		}
	}

?>