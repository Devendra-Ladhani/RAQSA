<?php $id=2; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page-QR</title>
	<style type="text/css">

	</style>
</head>
<body class = "bg-primary">
	<div class = "header bg-secondary d-flex justify-content-between align-items-center ps-4 pe-2">
		<div class = "logo bg-success" style="width:10%; height: 5vh;">
			<img src="images/logo.png" style="width: 100%; height: 100%; object-fit: contain;">
		</div>
		<div>
			<i class="fa-solid fa-bars fs-1 btn"></i>
		</div>
	</div>
	<div class = "container bg-info pb-4" style="height: 83vh; margin-top: 1vh; margin-bottom: 1vh;">
		<div class = "bg-warning text-center fw-bolder fs-1 text-capitalize">
			Please help the vehicle owner
		</div>
		<div class="mt-4 mb-2 bg-info text-secondary fs-5 text-center fw-bolder">
			Please select the reason below for contacting the owner
		</div>
		<div class="bg-danger">
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4" style="height: 20px;">
					<img src="images/flat-tire.png" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Vehicle's tyres have gone flat
				</div>
			</div>
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4" style="height: 20px;">
					<img src="images/headlight.png" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Vehicle Lights are on
				</div>
			</div>
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4" style="height: 20px;">
					<img src="images/damagecar.png" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Some Damage has occured to the Vehicle
				</div>
			</div>
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4" style="height: 20px;">
					<img src="images/carkey.webp" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Forgot Keys in a Vehicle
				</div>
			</div>
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4" style="height: 20px;">
					<img src="images/parking.png" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Vehicle is in a No Parking Zone
				</div>
			</div>
			<div class = "my-2 d-flex align-items-center rounded-pill btn btn-warning text-white">
				<!-- <div class="ms-2 me-4 "  style="height: 20px;">
					<img src="images/towecar.png" style="width: 100%; height: 100%; object-fit: contain;">
				</div> -->
				<div class = "fs-4" style="font-family: Poppins;">
					Vehicle is being Towed
				</div>
			</div>
		</div>
	</div>
	<div class = "container fixed-bottom d-flex justify-content-between bg-warning" style="height: 10vh;">
		<div class = "bg-success d-flex align-items-center justify-content-center h-100" id = "call_phone">
			<img src="images/call.png" class="w-100 h-100" style="mix-blend-mode: multiply;">
			<!-- <i class="fa-solid fa-phone bg-info fs-1"></i> -->
		</div>
		<div class = "bg-secondary d-flex align-items-center justify-content-center h-100">
			<img src="images/bqr.png" class="w-100 h-100" style="mix-blend-mode: multiply;">
		</div>
		<div class = "bg-white d-flex align-items-center justify-content-center h-100">
			<img src="images/ecall.jpg" class = "w-100 h-100" style="mix-blend-mode: multiply;">
			<!-- <i class="fa-solid fa-hospital fs-1"></i> -->
		</div>
	</div>
</body>
</html>