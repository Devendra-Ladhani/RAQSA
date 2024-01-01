<?php
    include_once "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .flex_users{
            width: 32%;
            border: 2px solid black;
            border-radius: 15px;
        }
        .flex_users_text{
            font-size: 15px;
        }
        .flex_orders_text{
            font-size: 15px;
        }

        /* Skeleton Loader Styles */
        #skeleton_content {
            overflow: hidden;
        }

        .skeleton-banner {
            position: relative;
            overflow: hidden;
        }

        .skeleton-banner::before {
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

        .skeleton-item {
            flex: 1;
            margin-right: 10px;
            position: relative;
            overflow: hidden;
        }

        .skeleton-item::before {
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

        .skeleton-image {
            height: 50px; /* Adjust height as needed */
        }

        .skeleton-text {
            height: 20px; /* Adjust height as needed */
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
<body class ="bg-light">
<div id="skeleton_content" class="bg-light">
    <!-- Skeleton Banner Image -->
    <div class="bg-success skeleton-banner border border-dark" style="height: 200px;">
        <!-- Placeholder for the banner image -->
    </div>

    <!-- Skeleton Flex Container -->
    <div class="bg-light mt-2">
        <div class="d-flex justify-content-between px-2 py-3">
            <!-- Skeleton Switch Users -->
            <div class="flex_users bg-warning py-2 skeleton-item">
                <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                <div class="flex_users_text fw-bolder text-center skeleton-text"></div>
            </div>

            <!-- Skeleton Add User -->
            <div class="flex_users bg-white py-2 skeleton-item">
                <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                <div class="flex_users_text fw-bolder text-center skeleton-text"></div>
            </div>

            <!-- Skeleton Delete Users -->
            <div class="flex_users bg-danger py-2 skeleton-item">
                <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                <div class="flex_users_text fw-bolder text-center skeleton-text"></div>
            </div>
        </div>

        <!-- Skeleton Orders, Pause QR, Settings -->
        <div class="bg-white my-3 mx-3 rounded-4 border shadow py-4">
            <div class="d-flex mb-2">
                <!-- Skeleton My Orders -->
                <div class="py-2 skeleton-item">
                    <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                    <div class="flex_orders_text fw-bolder text-center skeleton-text"></div>
                </div>

                <!-- Skeleton Pause QR -->
                <div class="py-2 skeleton-item">
                    <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                    <div class="flex_orders_text fw-bolder text-center skeleton-text"></div>
                </div>

                <!-- Skeleton Settings -->
                <div class="py-2 skeleton-item">
                    <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                    <div class="flex_orders_text fw-bolder text-center skeleton-text"></div>
                </div>
            </div>

            <!-- Skeleton Videos, Contact Us -->
            <div class="d-flex bg-white mb-2">
                <!-- Skeleton Videos -->
                <div class="py-2 skeleton-item">
                    <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                    <div class="flex_orders_text fw-bolder text-center skeleton-text"></div>
                </div>

                <!-- Skeleton Contact Us -->
                <div class="py-2 skeleton-item">
                    <div class="w-100 d-flex justify-content-center align-items-center skeleton-image"></div>
                    <div class="flex_orders_text fw-bolder text-center skeleton-text"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id = "actual_content" style="display: none">
    <div class = "bg-success">
        <img src="images/banner.jpg" class = "w-100">
    </div>
    <div class = "bg-light">
        <div class = "bg-light mt-2">
            <div class = "d-flex justify-content-between px-2 py-3">
                <a href="switch_users.php" class = "flex_users bg-warning py-2" style="text-decoration:none; color:black;">
                    <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/switch1.png" class = "w-50" style="mix-blend-mode: multiply;"></div>
                    <div class = "flex_users_text fw-bolder text-center">Switch Users</div>
                </a>
                <a href="add_user.php" class = "flex_users bg-white py-2" style="text-decoration:none; color:black;">
                    <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/user.png" class = "w-50" style="mix-blend-mode: multiply;"></div>
                    <div class = "flex_users_text fw-bolder text-center">Add User</div>
                </a>
                <a href = "delete_user.php" class = "flex_users bg-danger py-2" style="text-decoration:none; color:black;">
                    <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/deleteuser.png" class = "w-50" style="mix-blend-mode: multiply;"></div>
                    <div class = "flex_users_text fw-bolder text-center">Delete Users</div>
                </a>
            </div>
            <div class= "bg-white my-3 mx-3 rounded-4 border shadow py-4">
                <div class = "d-flex mb-2">
                    <a href = "orders.php" class = "py-2" style="text-decoration:none; color:black;">
                        <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/orders.png" class = "w-25 pb-1" style="mix-blend-mode:multiply;"></div>
                        <div class = "flex_orders_text fw-bolder text-center">My Orders</div>
                    </a>
                    <a href = "pause_qr.php" class ="py-2" style="text-decoration:none; color:black;">
                        <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/pause1.png" class = "w-25 pb-1" style="mix-blend-mode:multiply;"></div>
                        <div class = "flex_orders_text fw-bolder text-center">Pause QR</div>
                    </a>
                    <a href="settings.php" class="py-2" style="text-decoration:none; color:black;">
                        <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/settings.png" class = "w-25 pb-1" style="mix-blend-mode:multiply;"></div>
                        <div class = "flex_orders_text fw-bolder text-center">Settings</div>
                    </a>
                </div>
                <div class = "d-flex bg-white mb-2">
                    <div class ="py-2">
                        <a href="https://youtu.be/hhBGXuDsprM?si=e4_Dc4eHp8lKtfZh" style="text-decoration:none; color:black;">
                            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/videos.png" class = " pb-1" style="width:20%; mix-blend-mode:multiply;"></div>
                            <div class = "flex_orders_text fw-bolder text-center">Videos</div>
                        </a>
                    </div>
                    <div class="py-2">
                        <a href="contactus.php" style="text-decoration:none; color:black;">
                            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/contact-us.png" class = "pb-1" style=" width: 20%;mix-blend-mode:multiply;"></div>
                            <div class = "flex_orders_text fw-bolder text-center">Contact Us</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Simulate API/data fetching delay
        setTimeout(function () {
            // Hide the skeleton content
            document.getElementById('skeleton_content').style.display = 'none';

            // Display the actual content
            document.getElementById('actual_content').style.display = 'block';
        }, 2000); // Adjust the timeout duration as needed
    });
</script>
<?php
include_once 'footer.php';
?>
</body>
</html>