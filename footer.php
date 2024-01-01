<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .skeleton-bg-footer {
            position: fixed;
            bottom: 0;
            overflow: hidden;
        }

        .skeleton-bg-footer::before {
            content: "";
            position: absolute;
            /*border: 2px solid red;*/
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
<body>
<div id = "skeleton_footer" style="height: 60px; display: block!important;" class="skeleton-bg-footer fixed-bottom border border-dark rounded-top pt-1">
</div>

<div id = "actual_footer" style="height: 60px; display: none!important;" class = "fixed-bottom bg-white d-flex border border-dark rounded-top pt-1">
    <div class = "">
        <a href="dashCust.php" style="text-decoration:none; color:black;">
            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/home.png"  style="width: 28%;"></div>
            <div class = "text-center fw-bolder">Home</div>
        </a>
    </div>
    <div class = "">
        <a href="pause_qr.php" style="text-decoration:none; color:black;">
            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/pause1.png" style="width: 28%;"></div>
            <div class = "text-center fw-bolder">Pause QR</div>
        </a>
    </div>
    <div class = "">
        <a href="settings.php" style="text-decoration:none; color:black;">
            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/settings.png" style="width: 28%;"></div>
            <div class = "text-center fw-bolder">Settings</div>
        </a>
    </div>
    <div class = "">
        <a href="add_user.php" style="text-decoration:none; color:black;">
            <div class = "w-100 d-flex justify-content-center align-items-center"><img src="images/user.png" class="w-25"></div>
            <div class = "text-center fw-bolder">Add User</div>
        </a>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            document.getElementById('skeleton_footer').setAttribute('style','display: none !important');
            var actualFooter = document.getElementById('actual_footer');
            // Set styles for the actual footer
            actualFooter.style.height = '60px';
            actualFooter.style.display = 'flex';
            actualFooter.className = 'fixed-bottom bg-white d-flex border border-dark rounded-top pt-1';
        }, 2000);
    });
</script>
</body>
</html>