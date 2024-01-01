<?php  
	include_once 'connection.php';
	if(isset($_POST['signin']))
	{
		session_start();
		echo "<pre>";
		print_r($GLOBALS);
		echo "</pre>";
		$id = $_SESSION['id'];
		session_commit();
		$num = $_POST['your_numb'];
		$type = $_POST['type'];
		$name = $_POST['your_name'];
		$qid = $_SESSION['qid'];
		$sql = "SELECT `qr_id` FROM `qr_register` WHERE `qr_id`='$qid'";
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)==0)
		{
            echo "Query 1 performed succesfully<br>";
			$sql = "SELECT `vehicle_number` FROM `vehicle_number` WHERE `vehicle_number`='$num'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)==0)
			{
                echo "Query 2 performed succesfully<br>";
				$sql = "INSERT INTO `qr_register`(`qr_id`, `mu_id`) VALUES ('$qid','$id')";
				if(mysqli_query($conn,$sql))
				{
                    echo "Query 3 performed successfylly<br>";
				$lid = mysqli_insert_id($conn);
				$sql = "INSERT INTO `vehicle_master`(`qr_reg_id`) VALUES ('$lid')";
				if(mysqli_query($conn,$sql))
				{
					$mid = mysqli_insert_id($conn);
					$sql = "INSERT INTO `vehicle_number`(`vehicle_master_id`, `vehicle_number`) VALUES ('$mid','$num');INSERT INTO `vehicle_name`(`vehicle_master_id`, `vehicle_name`) VALUES ('$mid','$name');INSERT INTO `vehicle_type`(`vehicle_master_id`, `vehicle_type`) VALUES ('$mid','$type');";
					if(mysqli_multi_query($conn,$sql))
					{
						// echo "Inserted Succesfully";
                        echo "All Queries Performed";
						header("Location: details.php?res=1");
					}
				}
				}
			}
			else
			{
				header("Location: details.php?res=2");
			}
		}
		else
		{
			header("Location: details.php?res=3");
		}
	}
?>