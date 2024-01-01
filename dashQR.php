<?php
session_start();
include_once 'connection.php';
include_once 'header.php';
//echo "<pre>";
//print_r($GLOBALS);
//echo "</pre>";
$qid=$_SESSION['qid'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page-QR</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        #select{
            /* width: auto; */
            /* height: auto; */
            /* -webkit-text-stroke: 1px black; */
            text-shadow:
                    3px 3px 0 #000,
                    -1px -1px 0 #000,
                    1px -1px 0 #000,
                    -1px 1px 0 #000,
                    1px 1px 0 #000;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;


        }
        #skeletonHeaderContainer {
            width: 100%;
            height: 100px; /* Adjust height as needed */
            background-color: #ddd; /* Placeholder color */
            margin-bottom: 10px; /* Adjust margin as needed */
        }
        .skeleton-bg {
            position: relative;
            overflow: hidden;
        }

        .skeleton-bg::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #ddd 25%, #eee 50%, #ddd 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
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
$sql = "SELECT `qr_reg_id`, `reg_date`, `mu_id` FROM `qr_register` WHERE `qr_id` = '".$qid."'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    while ($i=mysqli_fetch_assoc($res))
    {
        $qr_reg_id = $i['qr_reg_id'];
    }
}

$sql = "SELECT `pause`, `play` FROM `pause_play_qr` WHERE `qr_reg_id`='".$qr_reg_id."'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    while($i=mysqli_fetch_assoc($res))
    {
        $pause = $i['pause'];
        $play = $i['play'];
    }
}
if($pause==1){
    die("<div class = 'w-100 d-flex flex-column align-items-center justify-content-center mx-auto my-5'>
        <img src='images/pause_qr.png' class = 'w-50'>
        <div class = 'text-center my-3 fw-bolder' style='font-size: 5vh;'>QR IS PAUSED</div>
    </div>");
}

$sql = "SELECT `vehicle_master_id` FROM `vehicle_master` WHERE `qr_reg_id` = '".$qr_reg_id."'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
    while($i=mysqli_fetch_assoc($res))
    {
        $vm_id = $i['vehicle_master_id'];
    }
}
$sql = "SELECT `mu_id`, `sc_id` FROM `vehicle_user` WHERE `vehicle_master_id` = '".$vm_id."'";
$res = mysqli_query($conn,$sql);
echo "hello";
if(mysqli_num_rows($res)>0)
{
//    echo "hello";
    while($i=mysqli_fetch_assoc($res))
    {
        $mu_id = $i['mu_id'];
        $sc_id = $i['sc_id'];
    }
}
if($sc_id==25)
{
    $sql = "SELECT `mob`, `emob` FROM `main_user_mob` WHERE `mu_id`='".$mu_id."'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($i=mysqli_fetch_assoc($res))
        {
            $mob = $i['mob'];
            $emob = $i['emob'];
        }
    }
}
else{
    $sql = "SELECT `sc_mob` FROM `sec_mob` WHERE `sc_id` = '".$sc_id."'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($i=mysqli_fetch_assoc($res))
        {
            $mob = $i['sc_mob'];
        }
    }
    $sql = "SELECT `mu_id` FROM `sec_user` WHERE `sc_id`='".$sc_id."'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($i=mysqli_fetch_assoc($res))
        {
            $mu_id = $i['mu_id'];
        }
    }
    $sql = "SELECT `emob` FROM `main_user_mob` WHERE `mu_id`='".$mu_id."'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($i=mysqli_fetch_assoc($res))
        {
            $emob = $i['emob'];
        }
    }
}
?>
<body class = "bg-light">
<div class = "container" id = "skeleton_main">
    <div id = "skeletonHeaderContainer" class = "skeleton-bg text-white text-center fw-bolder fs-1 text-capitalize my-2" style = "width: 100%;">
        <!--        Please help the vehicle owner-->
    </div>
    <div class="text-warning h1 text-center fw-bolder skeleton-bg" id="select" style="height: 75px; background-color: #ddd">
        <!--        Select The Option To-->
        <!--        Help Owner-->
    </div>
    <div class="pb-4">
        <div class = "skeleton-bg my-2 d-flex align-items-center rounded-4 text-black text-decoration-none lh-sm" style="height: 60px; background-color: #ddd">
            <!--            <div class="ms-2 me-4" style="width: 7vh; ">-->
            <!--                <img src="images/flat-tire.png" style="width: 100%; height: 8vh;">-->
            <!--            </div>-->
            <!--            <div class = "fs-5" style="font-family: Poppins; margin-left:1px;" >-->
            <!--                Vehicle's tyres have gone flat-->
            <!--            </div>-->
        </div>
        <!--        <div href = "sms:9904167671?body=Vehicle Lights are on" class="text-decoration-none">-->
        <div class = "skeleton-bg my-2 d-flex align-items-center rounded-4 text-black lh-sm" style="height: 60px; background-color: #ddd">
            <!--                <div class="ms-2 me-4" style="width: 14%;">-->
            <!--                    <img src="images/headlight.png" class = "w-100">-->
            <!--                </div>-->
            <!--                <div class = "fs-5 ms-2" style="font-family: Poppins;">-->
            <!--                    Vehicle Lights are on-->
            <!--                </div>-->
        </div>
        <!--        </div>-->
        <!--        <a href = "sms:9904167671?body=Some Damage has occured to the Vehicle" class="text-decoration-none">-->
        <div class = "skeleton-bg my-2 px-2 d-flex align-items-center rounded-4 text-black lh-sm" style="height: 60px; background-color: #ddd">
            <!--                <div class="ms-2 me-4" style="width: 20%;">-->
            <!--                    <img src="images/damagecar.png" style="width: 100%;">-->
            <!--                </div>-->
            <!--                <div class = "fs-5" style="font-family: Poppins;">-->
            <!--                    Some Damage has occured to the Vehicle-->
            <!--                </div>-->
        </div>
        <!--        </a>-->
        <!--        <a href = "sms:9904167671?body=Forgot Keys in a Vehicle" class="text-decoration-none">-->
        <div class = "skeleton-bg my-2 d-flex align-items-center rounded-4 text-black lh-sm" style="height: 60px; background-color: #ddd">
            <!--                <div class="ms-4 me-4" style="width: 12%;">-->
            <!--                    <img src="images/carkey.webp" style="width: 100%;">-->
            <!--                </div>-->
            <!--                <div class = "fs-5 " style="font-family: Poppins;">-->
            <!--                    Forgot Keys in a Vehicle-->
            <!--                </div>-->
        </div>
        <!--        </a>-->
        <!--        <a href = "sms:9904167671?body=Vehicle is in a No Parking Zone" class="text-decoration-none">-->
        <div class = "skeleton-bg my-2 d-flex align-items-center rounded-4 text-black lh-sm" style="height: 60px; background-color: #ddd">
            <!--                <div class="ms-2 me-4" style="width: 14%;">-->
            <!--                    <img src="images/parking.png" style="width: 100%;">-->
            <!--                </div>-->
            <!--                <div class = "fs-5 ms-2" style="font-family: Poppins;">-->
            <!--                    Vehicle is in a No Parking Zone-->
            <!--                </div>-->
        </div>
        <!--        </a>-->
        <!--        <a href = "sms:9904167671?body=Vehicle is being Towed" class="text-decoration-none">-->
        <div class = "skeleton-bg my-2 d-flex align-items-center rounded-4 text-black lh-sm" style="height: 60px; background-color: #ddd">
            <!--                <div class="ms-2 me-4 "  style="width: 7vh;">-->
            <!--                    <img src="images/towecar.png" style="width: 100%; height: 8vh;">-->
            <!--                </div>-->
            <!--                <div class = "fs-5 ms-1" style="font-family: Poppins;">-->
            <!--                    Vehicle is being Towed-->
            <!--                </div>-->
        </div>
        <!--        </a>-->
    </div>
</div>
<div id = "skeleton_container2" class = "skeleton-bg container fixed-bottom d-flex align-items-center justify-content-between border-top-8" style="height: 8.5vh;">
    <!--    <div class = "d-flex align-items-center justify-content-center h-75" id = "call_phone">-->
    <!--        <img src="images/call.png" class="w-100 h-100" style="mix-blend-mode: multiply;">-->
    <!--         <i class="fa-solid fa-phone bg-info fs-1"></i>-->
    <!--    </div>-->
    <!--    <div class = "d-flex align-items-center justify-content-center h-100">-->
    <!--        <img src="images/bqr.png" class="w-100 h-100" style="mix-blend-mode: multiply;">-->
    <!--    </div>-->
    <!--    <div class = " d-flex align-items-center justify-content-center h-75">-->
    <!--        <img src="images/ecall.jpg" class = "w-100 h-100" style="mix-blend-mode: multiply;">-->
    <!--         <i class="fa-solid fa-hospital fs-1"></i>-->
    <!--    </div>-->
</div>

<div class = "container mb-4 pb-4" id = "actual_container" style="display: none;">
    <div class = "bg-danger text-white text-center fw-bolder fs-1 text-capitalize my-2" style = "width: 100%;">
        Please help the vehicle owner
    </div>
    <div class="text-warning h1 text-center fw-bolder" id="select">
        Select The Option To
        Help Owner
    </div>
    <div class="pb-4">
        <a href = "sms:<?php echo $mob; ?>?body=Vehicle's tyres have gone flat" class = "my-2 d-flex align-items-center rounded-4 shadow text-black text-decoration-none lh-sm" style="height: 60px;">
            <div class="ms-2 me-4" style="width: 7vh; ">
                <img src="images/flat-tire.png" style="width: 100%; height: 8vh;">
            </div>
            <div class = "fs-5" style="font-family: Poppins; margin-left:1px;" >
                Vehicle's tyres have gone flat
            </div>
        </a>
        <a href = "sms:<?php echo $mob; ?>?body=Vehicle Lights are on" class="text-decoration-none">
            <div class = "my-2 d-flex align-items-center shadow rounded-4 bg-white text-black lh-sm"style="height: 60px; padding: auto;">
                <div class="ms-2 me-4" style="width: 14%;">
                    <img src="images/headlight.png" class = "w-100">
                </div>
                <div class = "fs-5 ms-2" style="font-family: Poppins;">
                    Vehicle Lights are on
                </div>
            </div>
        </a>
        <a href = "sms:<?php echo $mob; ?>?body=Some Damage has occured to the Vehicle" class="text-decoration-none">
            <div class = "my-2 px-2 d-flex align-items-center rounded-4 shadow bg-white text-black lh-sm" style="height: 60px; padding: auto;">
                <div class="ms-2 me-4" style="width: 20%;">
                    <img src="images/damagecar.png" style="width: 100%;">
                </div>
                <div class = "fs-5" style="font-family: Poppins;">
                    Some Damage has occured to the Vehicle
                </div>
            </div>
        </a>
        <a href = "sms:<?php echo $mob; ?>?body=Forgot Keys in a Vehicle" class="text-decoration-none">
            <div class = "my-2 d-flex align-items-center rounded-4 shadow bg-white text-black lh-sm" style="height: 60px; padding: auto;">
                <div class="ms-4 me-4" style="width: 12%;">
                    <img src="images/carkey.webp" style="width: 100%;">
                </div>
                <div class = "fs-5 " style="font-family: Poppins;">
                    Forgot Keys in a Vehicle
                </div>
            </div>
        </a>
        <a href = "sms:<?php echo $mob; ?>?body=Vehicle is in a No Parking Zone" class="text-decoration-none">
            <div class = "my-2 d-flex align-items-center rounded-4 shadow bg-white text-black lh-sm" style="height: 60px; padding: auto;">
                <div class="ms-2 me-4" style="width: 14%;">
                    <img src="images/parking.png" style="width: 100%;">
                </div>
                <div class = "fs-5 ms-2" style="font-family: Poppins;">
                    Vehicle is in a No Parking Zone
                </div>
            </div>
        </a>
        <a href = "sms:<?php echo $mob; ?>?body=Vehicle is being Towed" class="text-decoration-none">
            <div class = "my-2 d-flex align-items-center rounded-4 shadow bg-white text-black lh-sm" style="height: 60px; padding: auto;">
                <div class="ms-2 me-4 "  style="width: 7vh;">
                    <img src="images/towecar.png" style="width: 100%; height: 8vh;">
                </div>
                <div class = "fs-5 ms-1" style="font-family: Poppins;">
                    Vehicle is being Towed
                </div>
            </div>
        </a>
    </div>
</div>
<div id = "actual_container2" class = "container fixed-bottom d-flex align-items-center justify-content-between bg-white
 border-top border-start border-end border-danger border-4 rounded-bottom rounded-4 " style="height: 8.5vh; display: none!important">
    <a href = "tel:<?php echo $mob; ?>" class = "d-flex align-items-center justify-content-center h-75" id = "call_phone">
        <img src="images/call.png" class="w-100 h-100" style="mix-blend-mode: multiply;">
        <!-- <i class="fa-solid fa-phone bg-info fs-1"></i> -->
    </a>
    <div class = "d-flex align-items-center justify-content-center h-100">
        <img src="images/bqr.png" class="w-100 h-100" style="mix-blend-mode: multiply;">
    </div>
    <a href="tel:<?php echo $emob; ?>" class = " d-flex align-items-center justify-content-center h-75">
        <img src="images/ecall.jpg" class = "w-100 h-100" style="mix-blend-mode: multiply;">
        <!-- <i class="fa-solid fa-hospital fs-1"></i> -->
    </a>
</div>
</body>
<!-- ... Your HTML and CSS code ... -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Simulate API/data fetching delay (you can remove this in a real scenario)
        setTimeout(function () {
            // Remove skeleton main container and show actual content
            document.getElementById('skeleton_main').style.display = 'none';
            // document.getElementById('skeleton_container2').style.display = 'none !important';
            document.getElementById('skeleton_container2').setAttribute('style','display: none!important');
            // Show actual container content

            document.getElementById('actual_container').style.display = 'block';
            document.getElementById('actual_container2').style.display = 'block';
        }, 2000); // Adjust the timeout duration as needed

        // Simulate the skeleton loading effect for the header
        const headerContainer = document.getElementById('skeletonHeaderContainer');
        headerContainer.classList.add('skeleton-loading');
    });
</script>

<!-- ... Rest of your HTML ... -->

</html>