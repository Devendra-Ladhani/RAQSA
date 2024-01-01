<?php
    session_start();
    include_once 'header.php';
    include_once 'connection.php';
    include_once 'footer.php';
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
</head>
<style type="text/css">
	#one{
		background-color:;
	}
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
<script type="text/javascript">
	function vehicle_change(n)
	{
		var x = document.getElementById(n);
		console.log(n);
		console.log(x);
		window.location.href = "switch_users.php?vid="+x.value;
	}
</script>
<body class = "d-flex justify-content-center align-items-center flex-column">
	<?php
		$mu_id = $_SESSION['muid'];
		session_commit();
		if(isset($_GET['sw_id']))
		{
			if($_GET['user']=='sc')
			{
				// echo "SC";
				$sc_id = $_GET['sw_id'];
				$mu_id = 0;
			}
			else
			{
				$mu_id = $_GET['sw_id'];
				$sc_id = 25;	
			}
			$vehicle = $_GET['vehicle'];
			$sql = "INSERT INTO `vehicle_user`(`vehicle_master_id`, `mu_id`, `sc_id`) VALUES ('$vehicle','$mu_id','$sc_id')";
			session_start();
			$_SESSION['prev']='switch';
			session_commit();
			if(mysqli_query($conn,$sql))
			{
				echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "User Switched Successfully",
		                showConfirmButton: true
		            }).then(() => {
		            	window.history.go(-3)
		            })
		        </script>';
			}
			else
			{
				echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "Error Occured",
		                showConfirmButton: true
		            }).then(() => {
		                window.history.go(-3)
		            })
		        </script>';	
			}
		}
	?>
    <div style="display: block" id = "skeleton_loader_switch_users" class = "mt-5 text-center container mb-5 pb-2">
        <div class = "skeleton-loader mt-5 mb-3 h1 fw-bolder bg-warning py-4">
<!--            Select Registered Veihcle-->
        </div>

        <div class = "skeleton-loader h1 fw-bolder bg-primary py-3">
<!--            Select Registered Vehicles-->
        </div>

        <div class = "skeleton-loader h1 fw-bolder bg-dark py-4">
<!--            Select Registered Vehicles-->
        </div>
    </div>


	<div style = "display: none;" id = "actual_loader_switch_users" class = "container bg-light mb-5 pb-2">
		<div class = "text-center">
			<div class = "mt-3 h1 fw-bolder">
				Select Registered Vehicle
			</div>
			<div class = "">
				<select class = "form-select fs-5 text-center bg-white border-0 border-bottom-4" onchange="vehicle_change(this.id)" id = "choose_vehicle">
					<option selected disabled>Choose Vehicles</option>
					<?php  
						$sql = "select b.vehicle_master_id from qr_register a inner join vehicle_master b on a.qr_reg_id=b.qr_reg_id where a.mu_id = $mu_id";
						$res = mysqli_query($conn,$sql);
						if(mysqli_num_rows($res)>0)
						{
							while ($i=mysqli_fetch_assoc($res))
							{
								$vehicle_id = $i['vehicle_master_id'];
								$sql2 = "select b.vehicle_number from vehicle_master d inner join vehicle_number b on b.vehicle_master_id=d.vehicle_master_id where d.vehicle_master_id=$vehicle_id";
								$res2 = mysqli_query($conn,$sql2);
								// $vname = '';
								$vnum = '';
								// $vtype = '';
								if(mysqli_num_rows($res2)>0)
								{
									while($j=mysqli_fetch_assoc($res2))
									{
										// $vname = $j['vehicle_name'];
										$vnum = $j['vehicle_number'];
										// $vtype = $j['vehicle_type'];
									}
								}
								if(!empty($vnum))
								{
									echo "<option value = '".$vehicle_id."'>".$vnum."</option>";
								}

							}
						}
					?>
				</select>
			</div>
		</div>
		<div>
		<div class = "mt-3 fw-bolder fs-1 text-center">
			Select User to Switch
		</div>
		<div>
			<?php
				if(isset($_GET['vid']))
				{
//                    echo "hello";
				$vid = $_GET['vid'];
				$sql = "select mu_id, sc_id from vehicle_user where vehicle_master_id=$vid";
				$res = mysqli_query($conn,$sql);
                $vmu_id = 0;
                $vsc_id = 0;
				if(mysqli_num_rows($res)>0)
				{
//                    echo "hello";
					while($i=mysqli_fetch_assoc($res))
					{
						$vmu_id = $i['mu_id'];
						$vsc_id = $i['sc_id'];
					}
				}
				$sql = "select `mob` from `main_user_mob` where `mu_id`=$mu_id";
				$res = mysqli_query($conn,$sql);
//                echo "hello";
                if(mysqli_num_rows($res)>0) {
//                    echo 'hello';
                    while ($i = mysqli_fetch_assoc($res)) {
//                    echo "hello from loop";
                        $mob = $i['mob'];
                        if ($vmu_id == $mu_id) {
                            $color = "#198754";
                            $img_sc = "images\gpower.png";
                        } else {
                            $color = "#DC3545";
                            $img_sc = "images\power.png";
                        }
                    }
                }
				echo '<div class = "shadow rounded-4 d-flex mb-2" class = "w-100" style="height:10vh; color: '.$color.';">
					<div class = "d-flex align-items-center">
						<img src="images/avatar.jpg" class = "h-100" style="mix-blend-mode: multiply;">
					</div>
					<div class = "ms-2 me-2 d-flex flex-column justify-content-center h-100 fs-4">
						<div class = "fw-bolder">You</div>
						<div class = "fs-6">'.$mob.'</div>
					</div>
					<a class = "ms-auto me-2 d-flex align-items-center" href = "switch_users.php?sw_id='.$mu_id.'&user=main&vehicle='.$vid.'"/>
						<img src="'.$img_sc.'" class="h-50">
					</a>
				</div>'; 
				$sql = "select a.sc_id, b.sc_name, c.sc_mob from sec_user a inner join sec_name b on a.sc_id=b.sc_id inner join sec_mob c on a.sc_id=c.sc_id where a.mu_id=$mu_id";
				$res = mysqli_query($conn,$sql);
				if(mysqli_num_rows($res)>0)
				{
					while($i=mysqli_fetch_assoc($res))
					{
						$name = $i['sc_name'];
						$mob = $i['sc_mob'];
						$sc_id=$i['sc_id'];
						if($vsc_id==$sc_id)
						{
							$color="#198754";
							$img_sc = "images\gpower.png";
						}
						else
						{
							$color="#DC3545";
							$img_sc = "images\power.png";
						}

						echo '<div class = "bg-white shadow rounded-4 d-flex mb-2" class = "w-100" style="height: 10vh; color: '.$color.'">
							<div class = "d-flex align-items-center">
								<img src="images/avatar.jpg" class = "h-100" style="mix-blend-mode: multiply;">
							</div>
							<div class = "ms-2 me-2 d-flex flex-column justify-content-center h-100 fs-4">
								<div class = "fw-bolder">'.$name.'</div>
								<div class = "fs-6">'.$mob.'</div>
							</div>
							<a class = "ms-auto me-2 d-flex align-items-center" href = "switch_users.php?sw_id='.$sc_id.'&user=sc&vehicle='.$vid.'"/>
								<img src="'.$img_sc.'" class="h-50">
							</a>
						</div>';
					}
				}
				}
			?>
	</div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    setTimeout(function () {
                        document.getElementById('actual_loader_switch_users').style.display = 'block';
                        document.getElementById('skeleton_loader_switch_users').style.display = 'none';
                    }, 2000); // Adjust the delay (in milliseconds) as needed
                });
            </script>
</body>
</html>