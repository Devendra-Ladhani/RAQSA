<?php
session_start();
//        echo "<pre>";
//        print_r($GLOBALS);
//        echo "</pre>";
session_commit();
include_once 'connection.php';
include_once 'header2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .padding{
            margin-top: 5px;
/*            margin-bottom: 2px;*/
        }
        .form-control,.form-select{
            border:none;
            border-bottom: 1px solid lightgrey;
/*            border-radius: 0px;*/
        }
        .form-control:focus{
/*            box-shadow: none;*/
/*            outline: none;*/
        }
        .form-control:change
    </style>
</head>
<body class = "bg-light d-flex justify-content-center align-items-center">
    <script type="text/javascript">
        function changeStyle(n)
        {
            var x = document.getElementById(n);
            // console.log(x.value);
            if(x.value!="")
            {
                x.style.borderBottom="1px solid green";
                console.log("Yes");
            }
            else
            {
                x.style.borderBottom="1px solid lightgrey";
                console.log("No");   
            }
        }
    </script>
    <div class = "bg-white shadow container mx-3 my-4 rounded-4">
    <form action = "checkSignUp.php" method = "POST">
        <div class = "header text-center my-2 fs-1 fw-bolder">
            Sign Up Form
        </div>
        <div class = "">
            <div class = "padding form-floating me-1">
                <input id = "fname" type="text" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "fname">
                <label for = "fname">First Name</label>
            </div>
            <div class = "padding form-floating">
                <input type="text" class="form-control" id = "lname" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "lname">
                <label  for = "lname">Last Name</label>
            </div><!-- 
            <div class = "padding form-floating">
                <input type="text" class="form-control" id = "email" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "email">
                <label  for = "email">Email Address</label>
            </div> -->
            <div class = "padding form-floating">
                <input id = "dob" onblur="(this.type='text')" onfocus="(this.type='date')" type="text" class="form-control" placeholder="Date of Birth" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "dob">
                <label for = "dob">Date of Birth</label>
            </div>
            <div class = "mt-2 px-2 py-3 d-flex justify-content-between align-items-center rounded-2 border-bottom">
            <div>
                Gender
            </div>
            <div class = "padding form-check">
                <input id = "male" type="radio" class="form-check-input" placeholder="Date of Birth" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "gender" value="m" checked>
                <label for = "male">Male</label>
            </div>
            <div class = "padding form-check">
                <input id = "female" type="radio" class="form-check-input" placeholder="Date of Birth" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "gender" value = "f">
                <label for = "female">Female</label>
            </div>
            </div>
            <div class = "padding form-floating">
                <input id = "mob" type="number" class="form-control" placeholder="Mobile Number" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "mob">
                <label for = "mob">Mobile Number</label>
            </div>
            <div class = "padding form-floating">
                <input id = "emob" type="number" class="form-control" placeholder="Emergency Mobile Number" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "emob">
                <label for = "emob">Emergency Mobile Number</label>
            </div>
            <div class = "padding form-floating">
                <input id = "add1" type="text" class="form-control" placeholder="Address Line 1" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "add1">
                <label for = "add1">Address Line 1</label>
            </div>
            <div class = "padding form-floating">
                <input id = "add1" type="text" class="form-control" placeholder="Address Line 2" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "add2">
                <label for = "add1">Address Line 2</label>
            </div>
            <div class = "padding form-floating">
                <?php  
                    $sql = "select state, state_id from state_master";
                    $res = mysqli_query($conn, $sql);
                    echo '<select id="states" class="form-select" aria-label="Default select example" name = "state" onchange="changeStyle(this.id)"><option selected disabled>Choose State</option>';
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
                <label for = "states">State</label>
            </div>
            <div class = "padding form-floating">
                <select class="form-select" aria-label="Default select example" id="city" name="city" onchange="changeStyle(this.id)">
                    <option selected disabled>Choose City</option>
                </select>
                <label for = "city">City</label>
            </div>
            <div class = "padding form-floating">
                <input id = "add1" type="text" class="form-control" placeholder="Pincode" aria-label="Username" aria-describedby="basic-addon1" onchange="changeStyle(this.id)" name = "pincode">
                <label for = "add1">Pincode</label>
            </div>
            <div class = "input-group my-3 w-75 mx-auto">
                <input type="submit" name="submit" value="Register" class = "btn btn-success fs-4 rounded-3 w-100">
            </div>
        </div>
    </form>
    </div>
</body>
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
</html>