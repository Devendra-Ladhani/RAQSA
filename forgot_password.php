<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up Main</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class = "bg-light d-flex pt-5 align-items-center">
	<?php  
		include_once 'connection.php';
	?>
	<div class = "container bg-white mt-5 mx-3 rounded-3 py-4 shadow">
		<div class = "header fs-1 fw-bolder text-center">
			Sign Up
		</div>
		<div class = "">
			<form action = "forgot_password.php" method="POST" class = "my-4">
				<div class = "padding form-floating mx-auto my-2">
                	<input id = "email" type="text" class="form-control" placeholder="Enter Email Address" aria-label="Username" aria-describedby="basic-addon1" name = "email" value = "<?php  $value;?>" required>
                	<label for = "email">Email Id</label>
            	</div>
            	<div>
            		<input class = "btn btn-info rounded-3 w-100 fs-5" type="submit" name="submit" value = "Send OTP">
            	</div>
			</form>
			<form action = "forgot_password.php" method="POST" class = "my-4">
				<div class = "padding form-floating mx-auto my-2">
                	<input id = "otp" type="number" class="form-control" placeholder="Enter OTP" aria-label="Username" aria-describedby="basic-addon1" name = "otpInput" disabled>
                	<label for = "otp">Enter OTP</label>
            	</div>
            	<div class = "">
            		<input id = "verifyBtn" type = "submit" name = "verifyOTP" value = "Verify" class = "btn btn-success w-100 fs-5" disabled>
            	</div>
			</form>
		</div>
	</div>
	<?php  
		if (isset($_POST['submit']))
		{
			// echo "<pre>";
			// print_r($GLOBALS);
			// echo "</pre>";
			$email = $_POST['email'];
			$_GET['email']=$email;
			// echo "<pre>";
			// print_r($GLOBALS);
			// echo "</pre>";
			$sql = "SELECT `email` FROM `main_user` WHERE `email`='".$email."'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)==0)
			{
				echo '<script>
		            Swal.fire({
		                icon: "warning",
		                title: "Email Id not exist",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="forgot_password.php"
		            })
		        	</script>';
			}
			session_start();
			$_SESSION['email']=$email;
			// session_commit();
			$otp = rand(100000,999999);
			$to = $email;
			$subject = 'Hello from RAQSA';
			$message = 'OTP : '.$otp;
			$headers = "From: fakedevendra28@gmail.com\r\n";
			if (mail($to, $subject, $message, $headers)) {
	   			echo '<script>
	   				document.getElementById("otp").disabled=false;
	   				document.getElementById("verifyBtn").disabled=false;
	   				document.getElementById("email").value="'.$email.'";
	   			</script>';
	   			// session_start();
	   			$_SESSION['otp']=$otp;
	   			// echo "<pre>";
	   			// print_r($GLOBALS);
	   			// echo "</pre>";
	   			session_commit();
			}
		}
		if (isset($_POST['verifyOTP']))
		{
			session_start();
			$otp = $_SESSION['otp'];
			$otpInput = $_POST['otpInput'];
			if($otp==$otpInput)
			{
				$sql = "SELECT `passw` FROM `main_user` WHERE `email`='".$_SESSION['email']."'";
				$res = mysqli_query($conn,$sql);
				echo $sql;
				while($i=mysqli_fetch_assoc($res))
				{
					$passw=$i['passw'];
				}
				$to = $_SESSION['email'];
				$subject = 'Hello from RAQSA';
				$message = 'Password : '.$passw;
				$headers = "From: fakedevendra28@gmail.com\r\n";
				if (mail($to, $subject, $message, $headers))
				{	
				echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "Password to your email is sent",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="login.php"
		            })
		        	</script>';
				}
			}
			else
			{
				session_commit();
				// echo "OTP Not verified";
				echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "OTP Not Verified",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="forgot_password.php"
		            })
		        	</script>';
			}
		}
	?>
</body>
</html>