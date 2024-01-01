<?php  
	include_once 'connection.php';
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$mob = $_POST['mob'];
		session_start();
		$muid = $_SESSION['muid'];
		session_commit();
		$sql = "INSERT INTO `sec_user`(`mu_id`) VALUES ('$muid')";
		if(mysqli_query($conn,$sql))
		{
			$scid = mysqli_insert_id($conn);
			echo "$scid";
			$sql = "INSERT INTO `sec_name`(`sc_id`, `sc_name`) VALUES ('$scid','$name')";
			if(mysqli_query($conn,$sql))
			{
				$sql = "INSERT INTO `sec_mob`(`sc_id`, `sc_mob`) VALUES ('$scid','$mob')";
				if(mysqli_query($conn,$sql))
				{
					header("Location: add_user.php?res=1");
				}
				else
				{
					header("Location: add_user.php?res=2");
				}
			}
			else
			{
				header("Location: add_user.php?res=2");
			}
		}
		else
		{
			header("Location: add_user.php?res=2");
		}
	}
	else
	{
		header("Location: add_user.php?res=2");
	}
?>