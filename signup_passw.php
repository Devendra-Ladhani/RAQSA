<?php
session_start();
include_once 'connection.php';
include_once 'header2.php';
?>
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
<body class = "bg-light d-flex align-items-center">
	<div class = "container bg-white mt-5 mx-3 rounded-3 py-4 shadow">
		<div class = "header fs-1 fw-bolder text-center">
			Sign Up
		</div>
		<div class = "">
			<form action = "signup_passw.php" method="POST" class = "my-4">
				<div class = "padding form-floating mx-auto my-2">
                	<input id = "email" type="password" class="form-control" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" name = "passw" required>
                	<label for = "email">Password</label>
            	</div>
				<div class = "padding form-floating mx-auto my-2">
                	<input id = "otp" type="password" class="form-control" placeholder="Enter Password Again" aria-label="Username" aria-describedby="basic-addon1" name = "cpassw" required>
                	<label for = "otp">Confirm Password</label>
            	</div>
            	<div class = "">
            		<input id = "verifyBtn" type = "submit" name = "verifyPassw" value = "Continue" class = "btn btn-success w-100 fs-5">
            	</div>
			</form>
		</div>
	</div>
	<?php  
		if (isset($_POST['verifyPassw']))
		{
			$passw = $_POST['passw'];
			$cpassw = $_POST['cpassw'];
			if($passw==$cpassw)
			{
                $email = $_SESSION['email'];
				//$passw = md5($passw);
                $sql = "SELECT `mu_id` from `main_user` ORDER BY `mu_id` asc";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($i=mysqli_fetch_assoc($res))
                    {
                        $mu_id = $i['mu_id'];
                    }
                }
                $mu_id+=1;
				$sql = "INSERT INTO `main_user`(`mu_id`,`email`, `passw`) VALUES ('$mu_id','".$email."','".$passw."')";
				if(mysqli_query($conn,$sql))
				{
//					$_SESSION['muid']=4;
                    $_SESSION['muid']=$mu_id;
                    unset($_SESSION['email']);
					session_commit();
					echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "Passowrd Verified",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="signup2.php"
		            })
		        	</script>';
				}
				else
				{
					echo '<script>
		            Swal.fire({
		                icon: "warning",
		                title: "Error Occured",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="signup_passw.php"
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
		                title: "Invalid Password",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="signup_passw.php"
		            })
		        	</script>';
			}
		}
	?>
</body>
</html>