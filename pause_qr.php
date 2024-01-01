<?php
session_start();
include_once 'header.php';
include_once 'connection.php';
$mu_id=$_SESSION['muid'];
session_commit();
// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pause QR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
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
<?php
if(isset($_GET['qid_link']))
{
//    echo "YES";
    $qid = $_GET['qid_link'];
    $pause = $_GET['pause_link'];
    $play = $_GET['play_link'];
    $sql = "insert into pause_play_qr(qr_reg_id,pause,play) values ('$qid','$pause','$play')";
    if($pause==1)
    {
//        echo "hello";
        $msg="QR Paused Successfully";
    }
    if($pause==0)
    {
        $msg="QR Played Succesfully";
    }
    if(mysqli_query($conn,$sql))
    {
//        echo "hello";
        echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "'.$msg.'",
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
		                title: "Error Occured",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="dashCust.php"
		            })
		        </script>';
    }
}
?>
<body class = "bg-light">
    <div id = "skeleton_pause_qr" class = "py-5 mt-5 mx-auto" style="width: 95vw;">
        <div class = "skeleton-loader mb-2 py-4">
        </div>
        <div class = "skeleton-loader" style = "height: 55vh;">
        </div>
    </div>
	<div id = "actual_pause_qr" class = "container bg-light">
		<div class = "my-3 fw-bolder fs-1 text-center">
			Select QR to Pause/Play
		</div>
		<?php  
			$sql = "select qr_reg_id from qr_register where mu_id = '".$mu_id."'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
			{
				while($i=mysqli_fetch_assoc($res))
				{
					$qid = $i['qr_reg_id'];
					$sql2 = "select vehicle_master_id from vehicle_master where qr_reg_id=$qid";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							$vid = $j['vehicle_master_id'];
						}
					}
					$sql2 = "select vehicle_name from vehicle_name where vehicle_master_id = $vid";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							$vname = $j['vehicle_name'];
						}
					}
					$sql2 = "select vehicle_number from vehicle_number where vehicle_master_id = $vid";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							$vnum = $j['vehicle_number'];
						}
					}
                    $pause = 0;
                    $play = 1;
					$sql2 = "select pause,play from pause_play_qr where qr_reg_id = $qid";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							$pause = $j['pause'];
							$play = $j['play'];
						}
					}
                    if($pause==1)
                    {
                        $img_src = "images\play.png";
                        $pause=0;
                        $play=1;
                    }
                    else
                    {
                        $img_src = "images\pause.jpg";
                        $pause=1;
                        $play=0;
                    }
					echo '<div class = "bg-white rounded-4 shadow d-flex px-2 py-2 my-2" class = "w-100" style="height: 10vh;">
						<div class = "d-flex align-items-center">
							<img src="images/vqr.png" class = "h-100" style="mix-blend-mode: multiply;">
						</div>
						<div class = "ms-2 me-2 d-flex flex-column justify-content-center h-100 fs-3 fw-bolder">
							<div>'.$vnum.'</div>
							<div class = "fw-normal fs-6">'.$vname.'</div>
						</div>
						<a href = "pause_qr.php?pause_link='.$pause.'&play_link='.$play.'&qid_link='.$qid.'" class = "ms-auto me-2 d-flex align-items-center" class = "w-25">
							<img src="'.$img_src.'" class="h-75" style="mix-blend-mode:multiply;">
						</a>
					</div>';
				}
			}
		?>
	</div>
	<?php  
		include_once 'footer.php';
	?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_pause_qr').style.display = 'block';
                document.getElementById('skeleton_pause_qr').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
</body>
</html>