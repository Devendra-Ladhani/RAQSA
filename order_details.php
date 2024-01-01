<?php
    include_once 'header.php';
    include_once 'footer.php';
    include_once 'connection.php';
    // echo "<pre>";
    // print_r($GLOBALS);
    // echo "</pre>";
    $order_id = $_GET['oid'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Details</title>
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
    <div id = "skeleton_order_list" class = "mt-5 py-5 mx-auto" style="width: 95vw;">
        <div class = "skeleton-loader bg-primary rounded-4" style = "height: 70vh;">
        </div>
    </div>
	<div id = "actual_order_list" class = "d-flex align-items-center justify-content-center pt-2 pb-4">
	<div class = "container bg-white mt-2 mb-5 py-3 mx-2 rounded-4 shadow">
		<?php 
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
		$sql2 = "select quantity from order_quantity where order_id=$order_id";
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)>0)
		{
			while($j=mysqli_fetch_assoc($res2))
			{
				$quantity=$j['quantity'];
				// $img_src=$j['product_img'];
			}
		}
		$sql2 = "select rate from product_rate where product_id=$product_id";
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)>0)
		{
			while($j=mysqli_fetch_assoc($res2))
			{
				$rate=$j['rate'];
				$amount = $rate*$quantity;
				// $img_src=$j['product_img'];
			}
		}
		$sql2 = "select payment_type_id,amount,payment_date from order_payment where order_id=$order_id";
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)>0)
		{
			while($j=mysqli_fetch_assoc($res2))
			{
				$pay_type=$j['payment_type_id'];
				$pay_amt=$j['amount'];
				$pay_dt=$j['payment_date'];
				// $img_src=$j['product_img'];
			}
		}
		$sql2 = "select payment_type from payment_type where payment_type_id=$pay_type";
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)>0)
		{
			while($j=mysqli_fetch_assoc($res2))
			{
				$pay_type=$j['payment_type'];
				// $img_src=$j['product_img'];
			}
		}
		$sql2 = "select shipping_address_id,customer_address_id from order_address where order_id=$order_id";
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)>0)
		{
			while($j=mysqli_fetch_assoc($res2))
			{
				$ship_id=$j['shipping_address_id'];
				$cust_id=$j['customer_address_id'];
				// $img_src=$j['product_img'];
			}
			$sql2 = "select state_id,city_id,address from shipping_address where shipping_address_id=$ship_id";
			$res2 = mysqli_query($conn,$sql2);
			if(mysqli_num_rows($res2)>0)
			{
				while($j=mysqli_fetch_assoc($res2))
				{
					$s_state = $j['state_id'];
					$s_city = $j['city_id'];
					$s_address = $j['address'];
				}
				$sql2 = "select city from city_master where city_id=$s_city";
				$res2 = mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2))
				{
					while($j=mysqli_fetch_assoc($res2))
					{
						$s_city = $j['city'];
					}
				}
				$sql2 = "select state from state_master where state_id=$s_state";
				$res2 = mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2))
				{
					while($j=mysqli_fetch_assoc($res2))
					{
						$s_state = $j['state'];
					}
				}
			}
			$sql2 = "select state_id,city_id,address from customer_address where customer_address_id=$ship_id";
			$res2 = mysqli_query($conn,$sql2);
			if(mysqli_num_rows($res2)>0)
			{
				while($j=mysqli_fetch_assoc($res2))
				{
					$c_state = $j['state_id'];
					$c_city = $j['city_id'];
					$c_address = $j['address'];
				}
				$sql2 = "select city from city_master where city_id=$c_city";
				$res2 = mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2)>0)
				{
					while($j=mysqli_fetch_assoc($res2))
					{
						$c_city = $j['city'];
					}
				}
				$sql2 = "select state from state_master where state_id=$c_state";
				$res2 = mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2))
				{
					while($j=mysqli_fetch_assoc($res2))
					{
						$c_state = $j['state'];
					}
				}
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
		echo ' 
		<div class = "bg-info w-50 mx-auto">
			<img src="'.$img_src.'" class = "w-100">
		</div>
		<div class = "bg-white rounded-4">
			<table class = "table my-2 align-middle fs-5">
				<colgroup>
					<col class = "bg-light">
					<col>
				</colgroup>
				<tr>
					<th class = "w-25">Product Name</th>
					<td class = "text-uppercase">'.$name.'</td>
				</tr>
				<tr>
					<th>Status</th>
					<td class = "text-uppercase">'.$status.'</td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td class = "text-uppercase">'.$quantity.'</td>
				</tr>
				<tr>
					<th>Total Amount</th>
					<td class = "text-uppercase">'.$amount.'</td>
				</tr>
				<tr>
					<th>Payment Method</th>
					<td class = "text-uppercase">'.$pay_type.'</td>
				</tr>
				<tr>
					<th>Payment Date</th>
					<td>'.$pay_dt.'</td>
				</tr>
				<tr>
					<th>Amount Paid</th>
					<td>'.$pay_amt.'</td>
				</tr>
				<tr>
					<th>From</th>
					<td class = "text-uppercase">'.$s_address.', '.$s_city.', '.$s_state.'</td>
				</tr>
				<tr>
					<th>To</th>
					<td class = "text-uppercase">'.$c_address.', '.$c_city.', '.$c_state.'</td>
				</tr>
			</table>
		</div>';
		?>
	</div>
	</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('actual_order_list').style.display = 'block';
                document.getElementById('skeleton_order_list').style.display = 'none';
            }, 2000); // Adjust the delay (in milliseconds) as needed
        });
    </script>
</body>
</html>