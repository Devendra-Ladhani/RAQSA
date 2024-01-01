<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php  
	include_once 'connection.php';
	if(isset($_POST['submit']))
	{
//		echo "<pre>";
		session_start();
//		print_r($GLOBALS);
		session_commit();
//		echo "</pre>";
//		$mu_id = $_SESSION['muid'];

		$sql = "INSERT INTO `main_user_address`(`mu_id`, `city_id`, `add_line1`, `add_line2`, `pincode`) VALUES ('".$_SESSION['muid']."','".$_POST['city']."','".$_POST['add1']."','".$_POST['add2']."','".$_POST['pincode']."')";
		if(mysqli_query($conn,$sql))
		{
            $sql = "INSERT INTO `main_user_dob`(`mu_id`, `dob`) VALUES ('".$_SESSION['muid']."','".$_POST['dob']."')";
            if(mysqli_query($conn,$sql))
            {
                $sql = "INSERT INTO `main_user_gender`(`mu_id`, `gender`) VALUES ('".$_SESSION['muid']."','".$_POST['gender']."')";
                if(mysqli_query($conn,$sql))
                {
                    $sql = "INSERT INTO `main_user_mob`(`mu_id`, `mob`, `emob`) VALUES ('".$_SESSION['muid']."','".$_POST['mob']."','".$_POST['emob']."')";
                    if(mysqli_query($conn,$sql))
                    {
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Sign Up Succesfull",
                                showConfirmButton: true
                            }).then(() => {
                                window.location.href="dashCust.php"
                            })
                            </script>';
                    }
                }
            }
		}
		else
		{
			echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "Invalid Details",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="signup2.php"
		            })
		        	</script>';
		}
	}
	
?>