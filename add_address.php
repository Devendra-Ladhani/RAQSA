<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Address</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="bg-primary">
	<div class="container bg-secondary">
		<form action="add_address.php" method = "POST">
		<div class="input-group mb-3">
  			<span class="input-group-text">Address Line 1</span>
  			<input type="text" class="form-control" placeholder="Enter Address Line 1 (Required)" aria-label="Username" name = "add_line1" required>
		</div>
		<div class="input-group mb-3">
  			<span class="input-group-text">Address Line 2</span>
  			<input type="text" class="form-control" placeholder="Enter Address Line 2" aria-label="Username" name = "add_line2">
		</div>

		<div>
			<?php
			include_once 'connection.php';
			session_start();
			echo "<pre>";
			print_r($GLOBALS);
			echo "</pre>";
			$mu_id = $_SESSION['muid'];
			session_commit();
			if(isset($_POST['submit']))
			{
				$add1 = $_POST['add_line1'];
				$add2 = $_POST['add_line2'];
				$city = $_POST['city'];
				$pincode = $_POST['pincode'];
				// echo "Address Line 1 : $add1"
				$sql = "SELECT `mu_id`, `city_id`, `add_line1`, `add_line2`, `pincode` FROM `main_user_address` WHERE `mu_id`='$mu_id' AND `city_id`='$city' AND `add_line1`='$add1' AND `add_line2`='$add2' AND `pincode`='$pincode'";
				$res = mysqli_query($conn,$sql);
				if(!empty($add2))
				{
					echo "Address Line 2";
				}
				if(mysqli_num_rows($res)>0)
				{
					echo '<script>
		            Swal.fire({
		                icon: "warning",
		                title: "Address Already Exists",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="dashCust.php"
		            })
		        	</script>';
				}
				else
				{
				$sql = "INSERT INTO `main_user_address`(`mu_id`, `city_id`, `add_line1`, `add_line2`, `pincode`) VALUES ('$mu_id','$city','$add1','$add2','$pincode')";
				if(mysqli_query($conn,$sql))
				{
					echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "Address Added Successfully",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="dashCust.php"
		            })
		        	</script>';
				}
				else
				{
					echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "Error Occurred",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="dashCust.php"
		            })
		        	</script>';
				}
				}
			}
			$sql = "select state, state_id from state_master";
			$res = mysqli_query($conn, $sql);
			echo '<select id="states" class="form-select" aria-label="Default select example" name = "state"><option selected disabled>Choose State</option>';
			if(mysqli_num_rows($res) > 0)
			{
				while ($i = mysqli_fetch_assoc($res))
				{
					$state_id = $i['state_id'];
					$state = $i['state'];
					echo '<option value="'.$state_id.'">'.$state.'</option>';
				}
			}
			echo '</select>';
			?>
		</div>

		<div>
			<select class="form-select" aria-label="Default select example" id="city" name="city">
			    <option selected disabled>Choose City</option>
			</select>
		</div>

		<div class="input-group mb-3">
  			<span class="input-group-text" id="basic-addon1">Pincode</span>
  			<input type="text" class="form-control" placeholder="Enter Pincode" aria-label="Username" aria-describedby="basic-addon1" name = "pincode" required>
		</div>

		<div>
			<input type="submit" name="submit" class = "btn btn-success text-white">
		</div>
		</form>
	</div>

	<script type="text/javascript">
	    $(document).ready(function () {
	        $('#states').change(function () {
	            var stateId = $(this).val();

	            // Make an Ajax request to fetch cities for the selected state
	            $.ajax({
	                type: 'POST',
	                url: 'cities.php', // Replace with the actual URL that will handle the request
	                data: {stateId: stateId},
	                success: function (data) {
	                    $('#city').html(data);
	                }
	            });
	        });
	    });
	</script>
</body>
</html>
