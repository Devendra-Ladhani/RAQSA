<?php
    session_start();
    include_once 'header.php';
    include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Switch Users</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .skeleton-loader {
            width: 100%;
            height: 10vh; /* Adjust the height as needed */
            background: linear-gradient(90deg, #ddd 25%, #eee 50%, #ddd 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            margin-bottom: 10px; /* Add margin to separate skeleton items */
        }
        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
    </style>
</head>
<body class = "bg-light">
	<?php
		$muid = $_SESSION['muid'];
		session_commit();
		if (isset($_GET['del_id'])) {
		    $did = $_GET['del_id'];
		    $sql = "DELETE FROM `sec_mob` WHERE `sc_id`=$did;DELETE FROM `sec_name` WHERE `sc_id`=$did";
		    
		    if (mysqli_multi_query($conn, $sql)) {
		    	unset($_GET['del_id']); 
		        // header('Location: http://localhost:8080/Devendra/QR/delete_user.php');
		        echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "User Deleted Successfully",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="delete_user.php"
		            })
		        </script>';
		        exit();
		    } else {
		        echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "Error Occurred",
		                showConfirmButton: true
		            })
		        </script>';
		    }
		}


	?>
	<div id = "skeleton_delete_user" class = "mt-5 py-5 mx-auto" style="width: 90vw;">
        <div class = "skeleton-loader bg-primary mb-3 py-4 fw-bolder fs-1 text-center">
<!--            Select Users to Delete-->
        </div>
        <div class = "skeleton-loader bg-warning" style="height: 50vh;">

        </div>
    </div>

    <div id = "actual_delete_user" style="display: none;" class = "container bg-light">
		<div class = "mt-3 py-2 fw-bolder fs-1 text-center">
			Select User to Delete
		</div>
		<?php 
			// echo "From PHP<br>";
			$sql = "SELECT `sc_id` FROM `sec_user` WHERE `mu_id`='$muid'";
			$res = mysqli_query($conn,$sql);
			// echo "<pre>";
			// print_r($res);
			// echo "</pre>";
			if(mysqli_num_rows($res)>0)
			{
				while($i=mysqli_fetch_assoc($res))
				{
					$sc_id=$i['sc_id'];
					$sql2 = "SELECT `sc_name` FROM `sec_name` WHERE `sc_id`='$sc_id'";
					$res2 = mysqli_query($conn,$sql2);
					$name = '';
					if(mysqli_num_rows($res2)>0)
					{
						// echo "<br>Hello from 2nd IF<br>";
						while($j=mysqli_fetch_assoc($res2))
						{
							$name = $j['sc_name'];
						}
					}
					// echo "<br>Hello from outside of 2nd IF<br>";
					$sql2 = "SELECT `sc_mob` FROM `sec_mob` WHERE `sc_id`='$sc_id'";
					$res2 = mysqli_query($conn,$sql2);
					$mob = '';
					if(mysqli_num_rows($res2)>0)
					{
						// echo "Hello From 3rd IF";
						while($j=mysqli_fetch_assoc($res2))
						{
							$mob = $j['sc_mob'];
						}
					}
					if(!empty($name) and !empty($mob))
					{
						// echo "Name : ".$name."Mob: ".$mob."<br>";
						echo '<div class = "bg-white shadow rounded-4 d-flex mb-2" class = "w-100" style="height: 10vh;">
							<div class = "d-flex align-items-center">
								<img src="images/avatar.jpg" class = "h-100" style="mix-blend-mode: multiply;">
							</div>
							<div class = "ms-2 me-2 d-flex flex-column justify-content-center h-100 fs-4">
								<div class = "fw-bolder">'.$name.'</div>
								<div class = "fs-6">'.$mob.'</div>
							</div>
							<a class = "ms-auto me-2 d-flex align-items-center" href = "delete_user.php?del_id='.$sc_id.'"/>
								<img src="images\delete.png" class="h-50">
							</a>
						</div>';
					}
				}
			}
			else
			{
				echo "Madarchod hain Saala bhen ka lauda";
			}
		 ?>
	</div>
	<?php  
		include_once 'footer.php';
	?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_delete_user').style.display = 'block';
                document.getElementById('skeleton_delete_user').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
</body>
</html>