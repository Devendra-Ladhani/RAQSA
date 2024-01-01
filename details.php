<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .skeleton-bg {
            background-color: #ddd;
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
        #contain{
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-image: url(back1.png); */
            background-color: rgb(248,249,250);
            /* background-repeat:no-repeat; */
            /* background-size: cover; */
        }
        #sign-in{
            background-color: rgb(255, 255, 255);
        }
        #your_name,#your_pass
        {
            background-color: rgba(255, 255, 255, 0);
            /* color: red; */
            border-bottom-color: black;
        }
        input[type=checkbox]:not(old):checked + label > span:before {
            content: '\f26b';
            display: block;
            color: #222;
            font-size: 11px;
            line-height: 1.2;
            text-align: center;
            font-family: 'Material-Design-Iconic-Font';
            font-weight: bold;
        }
        .image{
            mix-blend-mode: multiply;
            width: 15px;
            height: 15px;
            margin: 0px;
        }
    </style>
</head>
<body style="background: #f8f8f8;" class=" d-flex align-items-center justify-content-center">
<!-- Sing in  Form -->
<?php
// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";
// echo isset($_GET['res']);
// console.log()
if(isset($_GET['res']))
{
    if($_GET['res']==1)
    {
        $_GET['res']=0;
        echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Vehicle Added Succesfully",
                        showConfirmButton: true
                    }).then(()=>{
                        window.location.href="dashCust.php";
                        });
                </script>';
    }
    elseif ($_GET['res']==2)
    {
        echo '<script>
                    Swal.fire({
                        icon: "info",
                        title: "Unable to Add Vehicle",
                        showConfirmButton: true
                    });
                </script>';
        $_GET['res']=0;
    }
    elseif ($_GET['res']==3)
    {
        echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Details",
                        showConfirmButton: true
                    });
                </script>';
        $_GET['res']=0;
    }
    $_GET['res']=0;
}
?>
<section class="mx-4 sign-in shadow bg-body rounded-4" id="actual-form" style="display: none;">
    <!-- Your actual form content goes here -->
    <div class="rounded-4" id="sign-in">
        <div class="signin-content">
            <div class="signin-form">
                <form action="check_details.php" method="POST" class="register-form" id="login-form">
                    <h2 class="form-title h1 fw-bolder pb-4">Vehcile Details</h2>
                    <div class="form-group">
                        <label for="your_numb"><img src="images/number_plate.png" class="image"></label>
                        <input value="GJ01VU8452" type="text" name="your_numb" id="your_numb"
                               placeholder="Your Vehcile Number" required />
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="type" id="type" required>
                            <option value="0" selected disabled>Choose a Vehcile Type</option>
                            <option value="2">2 Wheeler</option>
                            <option value="3">3 Wheeler</option>
                            <option value="4">4 Wheeler</option>
                            <option value="5">Heavy Vehicles</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="your_name"><i class="fas fa-car"></i></label>
                        <input value="TVS IQube Electric" type="text" name="your_name" id="your_name"
                               placeholder="Your Vehcile Name" required />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="bg-danger w-50 mx-auto fw-bolder rounded-3 text-white fs-4" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="mx-4 sign-in shadow bg-body rounded-4 w-100 skeleton-bg" id="skeleton-form">
    <!-- Skeleton loader for the form -->
    <div class="rounded-4" id="sign-in">
        <div class="signin-content">
            <div class="signin-form skeleton-bg w-100 h-100">
                <h2 class="form-title h1 fw-bolder pb-4">&nbsp;</h2>
                <div class="form-group">&nbsp;</div>
                <div class="form-group">&nbsp;</div>
                <div class="form-group">&nbsp;</div>
                <div class="form-group form-button">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Simulate API/data fetching delay (you can remove this in a real scenario)
        setTimeout(function () {
            // Remove skeleton form and show actual form
            document.getElementById('skeleton-form').style.display = 'none';
            document.getElementById('actual-form').style.display = 'block';
        }, 2000); // Adjust the timeout duration as needed
    });
</script>
</body>
</html>