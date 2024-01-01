<?php
    session_start();
    include_once 'header.php';
    include_once 'connection.php';
    $mu_id = $_SESSION['muid'];
    session_commit();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
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
<body class = "bg-light">
    <div id = "skeleton_orders" class = "mx-auto mt-5 py-5" style="width: 90vw;">
        <div class = "skeleton-loader" style="height: 70vh;">
        </div>
    </div>

    <div id = "actual_orders" class = "my-2 container" style="display: none;">
		<!-- TEMPLATE START -->
		<?php  
			$sql = "select order_id from order_master where mu_id=$mu_id";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
			{
				while($i=mysqli_fetch_assoc($res))
				{
					$order_id = $i['order_id'];
					$sql2 = "select product_id from order_product where order_id=$order_id";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							$product_id=$j['product_id'];
							// $img_src=$j['product_img'];
						}
					}
					$sql2 = "select product_img from product where product_id=$product_id";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while($j=mysqli_fetch_assoc($res2))
						{
							// $product_id=$j['product_id'];
							$img_src=$j['product_img'];
						}
					}
					$sql2 = "select name from product_name where product_id=$product_id";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while ($j=mysqli_fetch_assoc($res2))
						{
							$name = $j['name'];
						}
					}
					$sql2 = "select status from order_status where order_id=$order_id";
					$res2 = mysqli_query($conn,$sql2);
					if(mysqli_num_rows($res2)>0)
					{
						while ($j=mysqli_fetch_assoc($res2))
						{
							$status = $j['status'];
						}
						if($status==1)
						{
							$status='Arrived';
							$color = "#198754";
							$img2_src = "images/green.png";
						}
						else if($status==2)
						{
							$status = "Arriving";
							$color = "#FFC107";
							$img2_src = "images/yellow.png";
						}
						else
						{
							$status = "Canceled";
							$color = "#DC3545";
							$img2_src = "images/red.png";
						}
					}
					echo '<a href = "order_details.php?oid='.$order_id.'" class = "bg-white border shadow d-flex rounded-4 px-2 py-2 my-2" style = "height:12vh; text-decoration:none; color:black">
						<div class = "w-25">
							<img src="'.$img_src.'" class = "w-100 h-100" style="mix-blend-mode: multiply;">
						</div>
						<div class = "d-flex flex-column justify-content-center fw-bolder ms-2">
							<div class="fs-4">'.$name.'</div>
							<div class="fw-normal" style = "color: '.$color.'">'.$status.'</div>
						</div>
						<div class = "ms-auto w-25 d-flex justify-content-end align-items-center">
							<img src="'.$img2_src.'" class = "w-25">
						</div>
					</a>';
				}
			}

		?>
		<!-- <div class = "bg-white border shadow d-flex rounded-4 px-2 py-2">
			<div class = "w-25">
				<img src="images/product.webp" class = "w-100" style="mix-blend-mode: multiply;">
			</div>
			<div class = "d-flex flex-column justify-content-center fw-bolder ms-2">
				<div class="fs-4">Subscription</div>
				<div class="fw-normal">Arriving Today</div>
			</div>
			<div class = "ms-auto w-25 d-flex justify-content-end align-items-center">
				<img src="images/arrow.png" class = "w-50">
			</div>
		</div> -->
		<!-- TEMPLATE END -->
	</div>
	<?php  
		include_once 'footer.php';
	?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_orders').style.display = 'block';
                document.getElementById('skeleton_orders').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
</body>
</html>