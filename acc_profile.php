<?php
    session_start();
    include_once 'footer.php';
    include_once 'connection.php';
    $mu_id = $_SESSION['muid'];
    session_commit();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Page</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class = "bg-light py-4 mb-4">
	<div class = "container">
		<div class = "w-50 mx-auto">
			<img src="images/avatar.jpg" style="mix-blend-mode: multiply;" class = "w-100">
		</div>
		<div class = "">
			<div class = "bg-white shadow rounded-4 px-2 py-1 mb-4">
				<div class = "h1">Personal Details</div>
				<div>
					<table class ="table align-middle ">
						<colgroup>
							<col class = "bg-light">
							<col class = "bg-white">
						</colgroup>
						<tr>
							<th class = "w-25">Name</th>
							<td class = "text-uppercase">Devendra Ladhani</td>
						</tr>
						<tr>
							<th>Gender</th>
							<td class = "text-uppercase">Male</td>
						</tr>
						<tr>
							<th>Mobile No</th>
							<td class = "text-uppercase">9909410498</td>
						</tr>
						<tr>
							<th>Date of Birth</th>
							<td class = "text-uppercase">2003-04-28</td>
						</tr>
					</table>
				</div>
			</div>
			<div class = "my-2 bg-white shadow rounded-4 px-2 py-1">
				<div class = "h1">Address</div>
				<div>
					<table class = "table align-middle">
					<?php 
					$sql = "SELECT `main_user_address_id`,`city_id`,`add_line1`,`add_line2`,`pincode` FROM `main_user_address` WHERE `mu_id`=$mu_id";
					$res = mysqli_query($conn,$sql);
					if(mysqli_num_rows($res)>0)
					{
						while($i=mysqli_fetch_assoc($res))
						{
							$mua_id = $i['main_user_address_id'];
							$add_line1 = $i['add_line1'];
							$add_line2 = $i['add_line2'];
							$city = $i['city_id'];
							$pincode = $i['pincode'];
							$sql2 = "SELECT `city`,`state_id` FROM `city_master` WHERE `city_id`=$city";
							$res2 = mysqli_query($conn,$sql2);
							while($j=mysqli_fetch_assoc($res2))
							{
								$city = $j['city'];
								$state_id = $j['state_id'];
							}
							$sql2 = "SELECT `state` FROM `state_master` WHERE `state_id`=$state_id";
							$res2 = mysqli_query($conn,$sql2);
							while($j=mysqli_fetch_assoc($res2))
							{
								$state = $j['state'];
							}
							echo '<tr class="form-check">
									<td>
  										<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  									</td>
  									<td>
    									'.$add_line1.''.$add_line2.', '.$city.', '.$state.' - '.$pincode.'
  									</td>
  									<td>
  										<a class = "btn btn-warning text-white" href = "edit_address.php?id='.$mua_id.'">Edit</a>
  									</td>
								</tr>';
						}
					} 
					?>
					</table>
				</div>
				<div class = "d-flex justify-content-between my-2">
					<a href="add_address.php" class = "btn btn-success">Add Address</a>
					<a href="delete_address.php" class = "btn btn-danger">Delete Address</a>
					<!-- <input type="button" name="add_address" value = "Add Address"> -->
				</div>
			</div>
			<div class = "text-center my-3">
				<input type="submit" name="save" value = "Save Details" class = "btn btn-success fs-5 fw-bolder">
			</div>
		</div>
	</div>
</body>
</html>