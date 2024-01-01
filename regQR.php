<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Include SweetAlert CSS and JS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
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
    </style>
</head>
<body id='contain'>
    <?php
        if (isset($_GET['err'])) {
           if ($_GET['err'] == 1) {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Invalid email id or password",
                        showConfirmButton: true
                    });
                </script>';
                $_GET['err']=0;
            }
        }
        // $loc = geoloc();
    ?>
    <!-- Sing in  Form -->
    <section class="sign-in w-100">
        <div class="container w-100" id="sign-in">
            <div class="signin-content">
                <div class="signin-form skeleton-bg h-100" id="skeleton-form">
                    <h1 class="form-title">
                        <div style="background-color: #ddd; width: 100%; margin-bottom: 20px;"></div>
                        <div class="skeleton-bg" style="width: 100%; height: 50px;"></div>
                    </h1>
                    <form method="POST" action="checkReg.php" class="register-form" id="login-form">
                        <div class="form-group skeleton-bg" style="height: 40px; margin-bottom: 20px;"></div>
                        <div class="form-group skeleton-bg" style="height: 40px; margin-bottom: 20px;"></div>
                        <div class="form-group">
<!--                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"-->
<!--                                   onclick="show_passw()" />-->
<!--                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Show-->
<!--                                password</label>-->
                        </div>
                        <div class="form-group form-button">
                            <div class="skeleton-bg" style="width: 50%; height: 50px;"></div>
                        </div>
                    </form>
                </div>

                <div class="signin-form" id="actual-form" style="display: none;">
                    <!-- Your actual content goes here -->
                    <h1 class="form-title">
                        <div style="background-color: red; width: 100%; margin-bottom: 20px;">
                            <img src="images/logo1.png">
                        </div>
                        QR Registration
                    </h1>
                    <form method="POST" action="checkReg.php" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_email"><i class="fa-solid fa-user"></i></label>
                            <input value="devladhani28@gmail.com" type="email" name="your_email" id="your_email" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="fa-solid fa-key"></i></label>
                            <input value = "990941dev" type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" onclick="show_passw()"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Show password</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" style="border-radius: 10px; font-size: 20px; margin: auto; background-color: #dc3545; color: white; width: 50%; padding: 10px;" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
    </section>
    </div>
    <script type="text/javascript">
        let count=0;
        function show_passw()
        {
            var x = document.getElementById('your_pass');
            if(count%2==0)
            {
                x.type="text";
            }
            else
            {
                x.type="password";
            }
            count++;
            console.log(count);
        }
    </script>
</body>
</html>