<?php
    session_start();
    include_once 'header.php';
    include_once 'connection.php';
    include_once 'footer.php';
    $muid = $_SESSION['muid'];
    session_commit();
    $vehicle_select_id=0;
    // echo "<pre>";
    // print_r($GLOBALS);
    // echo "</pre>";
    if(isset($_GET['vid']))
    {
        $vehicle_select_id = $_GET['vid'];
        // echo $vehicle_select_id;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<script type="text/javascript">
	function vehicle_change(n)
	{
		var x = document.getElementById(n);
		window.location.href="settings.php?vid="+x.value;
	}
</script>
<body class = "bg-light">
    <div id = "skeleton_settings" class = 'mt-5 py-5 mx-auto' style="width: 90vw;">
        <div class = "skeleton-loader py-5 rounded-4" style="height: 30vh;">

        </div>
    </div>

	<div style="display: none!important" id = "actual_settings" class = "d-flex justify-content-center">
	<div class = "container shadow bg-white my-3 mx-3 rounded-4">
		<div class = "py-2">
			<div class = "h1 text-center">
				<!-- Select Registered Vehicle -->
			</div>
			<select class = "form-select fw-bolder text-center fs-4" onchange="vehicle_change(this.id)" id = "vehicle_select" value = "<?php echo $vehicle_select_id; ?>">
				<?php  
					echo "<option value = '0' disabled selected>Select Registered Vehicle</option>";
					$sql = "SELECT `qr_reg_id` FROM `qr_register` WHERE `mu_id`=$muid";
					$res = mysqli_query($conn,$sql);
					if(mysqli_num_rows($res)>0)
					{
						while($i=mysqli_fetch_assoc($res))
						{
							$qid = $i['qr_reg_id'];
							$sql2 = "SELECT `vehicle_master_id` FROM `vehicle_master` WHERE `qr_reg_id`=$qid";
							$res2 = mysqli_query($conn,$sql2);
							if(mysqli_num_rows($res2)>0)
							{
								while($j=mysqli_fetch_assoc($res2))
								{
									$vid = $j['vehicle_master_id'];
								}
							}
							$sql2 = "SELECT `vehicle_number` FROM `vehicle_number` WHERE `vehicle_master_id`=$vid";
							$res2 = mysqli_query($conn,$sql2);
							if(mysqli_num_rows($res2)>0)
							{
								while($j=mysqli_fetch_assoc($res2))
								{
									$vnum = $j['vehicle_number'];
								}
							}
							if($vid == $vehicle_select_id)
								echo '<option value = "'.$vid.'" selected>'.$vnum.'</option>';
							else
								echo '<option value = "'.$vid.'">'.$vnum.'</option>';
						}
					}
				?>
			</select>
			<div>
				<?php  
					if (isset($_GET['vid']))
					{
						// echo $vid;
						$vid = $vehicle_select_id;
						// echo $vid;
						$sql2 = "SELECT `vehicle_number` FROM `vehicle_number` WHERE `vehicle_master_id`=$vid";
						$res2 = mysqli_query($conn,$sql2);
						if(mysqli_num_rows($res2)>0)
						{
							while($j=mysqli_fetch_assoc($res2))
							{
								$vnum = $j['vehicle_number'];
							}
						}
						$sql2 = "SELECT `vehicle_name` FROM `vehicle_name` WHERE `vehicle_master_id`=$vehicle_select_id";
						$res2 = mysqli_query($conn,$sql2);
						if(mysqli_num_rows($res2)>0)
						{
							while($j=mysqli_fetch_assoc($res2))
							{
								$vname = $j['vehicle_name'];
							}
						}
						$sql2 = "SELECT `vehicle_type` FROM `vehicle_type` WHERE `vehicle_master_id`=$vehicle_select_id";
						$res2 = mysqli_query($conn,$sql2);
						if(mysqli_num_rows($res2)>0)
						{
							while($j=mysqli_fetch_assoc($res2))
							{
								$vtype = $j['vehicle_type'];
							}
						}
						// echo $vtype;
						// echo $vnum;
					
						echo '
						<form action = "update_settings.php" method = "POST"> 
						<div class = "bg-white rounded-4">
							<table class = "table my-2 align-middle fs-5">
								<colgroup>
									<col class = "bg-light">
									<col>
								</colgroup>
								<tr>
									<th class = "w-25">Vehicle Number</th>
									<td class = "text-uppercase"><input class = "form-control" value = "'.$vnum.'" name = "vehicle_number"></td>
								</tr>
								<tr>
									<th>Vehicle Name</th>
									<td class = "text-uppercase"><input class = "form-control" value = "'.$vname.'" name = "vehicle_name"></td>
								</tr>
								<tr>
									<th>Type</th>
									<td class = "text-uppercase">
										<select class = "form-select" value = "'.$vtype.'">
											<option value = "2">2</option>
											<option value = "3">3</option>
											<option value = "4">4</option>
											<option value = "5">Others</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class = "text-center">
							<input type = "submit" name = "submit" class = "btn btn-success text-white rounded-3 fw-bolder fs-5 mb-2">
						</div>
						</form>';
						}
				?>
			</div>
		</div>
	</div>
	</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_settings').style.display = 'block';
                document.getElementById('skeleton_settings').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
</body>
</html>