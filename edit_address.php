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
	<?php

			include_once 'connection.php';
			session_start();
			$mu_id = $_SESSION['muid'];
			//echo "<pre>";
			//print_r($GLOBALS);
			//echo "</pre>";
			session_commit();
			$mua_id = $_GET['id'];
			if(isset($_POST['submit']))
			{
				$city_id = $_POST['city'];
				$add1 = $_POST['add_line1'];
				$add2 = $_POST['add_line2'];
				$pincode = $_POST['pincode'];
				$sql = "UPDATE `main_user_address` SET `city_id`='$city_id',`add_line1`='$add1',`add_line2`='$add2',`pincode`='$pincode' WHERE `main_user_address_id`='$mua_id'";
				//echo $sql;
				if(mysqli_query($conn,$sql))
				{
					echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "Address Edited Successfully",
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
			$sql = "SELECT `city_id`,`add_line1`,`add_line2`,`pincode` FROM `main_user_address` WHERE `main_user_address_id`=$mua_id";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
			{
				while($i=mysqli_fetch_assoc($res))
				{
					$add_line1 = $i['add_line1'];
					$add_line2 = $i['add_line2'];
					$city = $i['city_id'];
					$pincode = $i['pincode'];
					$sql2 = "SELECT `city`,`state_id` FROM `city_master` WHERE `city_id`=$city";
					$res2 = mysqli_query($conn,$sql2);
					while($j=mysqli_fetch_assoc($res2))
					{
						$city = $j['city'];
						$state = $j['state_id'];
					}
				}
			}
	?>
	<div class="container bg-secondary">
		<form action="edit_address.php?id=<?php echo$mua_id; ?>" method = "POST">
		<div class="input-group mb-3">
  			<span class="input-group-text">Address Line 1</span>
  			<input type="text" class="form-control" placeholder="Enter Address Line 1 (Required)" aria-label="Username" name = "add_line1" value="<?php echo $add_line1; ?>" required>
		</div>
		<div class="input-group mb-3">
  			<span class="input-group-text">Address Line 2</span>
  			<input type="text" class="form-control" placeholder="Enter Address Line 2" aria-label="Username" name = "add_line2" value="<?php echo $add_line2; ?>">
		</div>

		<div>
			<?php
			$sql = "select state, state_id from state_master";
			$res = mysqli_query($conn, $sql);
			echo '<select id="states" class="form-select" aria-label="Default select example" name = "state"><option>Choose State</option>';
			if(mysqli_num_rows($res) > 0)
			{
				while ($i = mysqli_fetch_assoc($res))
				{
					$state_id = $i['state_id'];
					$state_name = $i['state'];
					if($state==$state_id)
						echo '<option value="'.$state_id.'" selected>'.$state_name.'</option>';
					else
						echo '<option value="'.$state_id.'">'.$state_name.'</option>';
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
  			<input type="text" class="form-control" placeholder="Enter Pincode" aria-label="Username" aria-describedby="basic-addon1" name = "pincode" required value="<?php echo $pincode; ?>">
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