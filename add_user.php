<?php
    session_start();
    include_once "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Users</title>
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
<body>
<?php
//        session_start();
//		include_once 'header.php';
//		session_commit();
		if(isset($_GET['res']))
		{
			if($_GET['res']==1)
			{
				$_GET['res']=0;
				echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "User Added Succesfully",
                        showConfirmButton: true
                    })
                </script>';
			}
		}
	?>
    <div id = "skeleton_add_user" class = "skeleton-loader bg-primary mt-5 py-3 rounded-4 mx-auto" style="height: 60vh; width: 90vw; position: relative; top: 10vh;">
    </div>

	<div id = "actual_add_user" style="display: none!important;" class = "mt-5 bg-light d-flex align-items-center justify-content-center px-4">
		<div class = "container bg-white text-center text-white border rounded-4 shadow py-5 px-4">
			<div class = "text-dark fw-bolder mb-4" style="font-size: 40px;">
				Add User
			</div>
			<form action = "add_user_db.php" method="POST"> 
				<div class="input-group">
					<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>           
					<input name = "name" type="text" class="form-control  fs-5" placeholder="Name">
				</div>
				<div class="mt-3 input-group">
					<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>  
					<input name = "mob" type="number" class="form-control fs-5" placeholder="Contact Number">
				</div>
				<div class = " mt-5 text-center w-100 d-grid">
					<input class = "btn btn-success fs-5 fw-bolder rounded-2" name = "submit" type="submit">
				</div>
			</form>
		</div>
	</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_add_user').style.display = 'block';
                document.getElementById('skeleton_add_user').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
	<?php  
		include_once 'footer.php';
	?>
</body>
</html>