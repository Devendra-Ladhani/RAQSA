<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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
.sign-in{
    width: 400px;


}
    </style>
</head>
<body id='contain'>
    <?php
        include_once 'connection.php';
    ?>
    <!-- Sing in  Form -->
<section class="sign-in" >
            <div class="container" id="sign-in">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">QR Sign Up</h2>
                        <form method="POST" action="checkReg.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="fname" id="your_email" placeholder="First Name" required/>
                                <!-- <input type="email" name="your_email" id="your_email" placeholder="Last Name"/> -->
                            </div>
                            <div class="form-group">
                                <!-- <label for="your_email"><i class="fa-solid fa-envelope"></i></label> -->
                                <input type="text" name="lname" id="your_email" placeholder="Last Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_email"><i class="fa-solid fa-envelope"></i></label>
                                <input type="email" name="email" id="your_email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa-solid fa-key"></i></label>
                                <input type="password" name="passw" id="your_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_email"><i class="fa-solid fa-calendar-day"></i></label>
                                <input type="date" name="dob" id="your_email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_email"><i class="fa-solid fa-phone"></i></label>
                                <input type="number" name="main_mob" id="your_email" placeholder="Your Number" required/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="your_email"><i class="fa-solid fa-user"></i></label> -->
                                <textarea name="your_email" id="address" placeholder="Your Address 1.." required></textarea>
                            </div>
                            <div class="w-100">
                                <!-- <label for="your_email"><i class="fa-solid fa-phone"></i></label> -->
                                <div class = "bg-primary">
                                    <?php  
                                        $sql = "select state, state_id from state_master";
                                        $res = mysqli_query($conn, $sql);
                                        echo '<select id="states" class="form-select" aria-label="Default select example" name = "state"><option selected disabled>Choose State</option>';
                                        if(mysqli_num_rows($res) > 0)
                                        {
                                            while ($i = mysqli_fetch_assoc($res))
                                            {
                                                $state_id = $i['state_id'];
                                                $state = $i['state'];
                                                echo '<option value="'.$state_id.'">'.$state.'</option>';
                                            }
                                        }
                                        echo '</select>';
                                    ?>
                                </div>
                                <div class = "bg-secondary">
                                    <select class="form-select" aria-label="Default select example" id="city" name="city">
                                        <option selected disabled>Choose City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="your_email"><i class="fa-solid fa-phone"></i></label>
                                <input type="number" name="emob" id="your_email" placeholder="Emergency Number" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signin" class="form-submit" value="Sign Up" required/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script type="text/javascript">
        $(document).ready(function () {
            $('#states').change(function () {
                var stateId = $(this).val();

                // Make an Ajax request to fetch cities for the selected state
                $.ajax({
                    type: 'POST',
                    url: 'cities.php', // Replace with the actual URL that will handle the request
                    data: {stateId: stateId},
                    success: function (data) {
                        $('#city').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>