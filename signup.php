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
    </style>
</head>
<body class = "bg-light d-flex justify-content-center align-items-center">
    <?php  
        include_once 'connection.php';
    ?>
    <div class = "bg-white shadow container mx-3 mt-4 rounded-4">
        <div class = "header text-center my-2 fs-1 fw-bolder">
            Sign Up Form
        </div>
        <div class = "">
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control py-2" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control py-2" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                <input type="text" class="form-control py-2" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-day"></i></span>
                <input onblur="(this.type='text')" onfocus="(this.type='date')" type="text" class="form-control py-2" placeholder="Enter Date of Birth" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                <input type="number" class="form-control py-2" placeholder="Mobile Number" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                <input type="number" class="form-control py-2" placeholder="Emergency Mobile Number" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                <input type="number" class="form-control py-2" placeholder="Address Line 1" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                <input type="number" class="form-control py-2" placeholder="Address Line 2" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
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
            <div class = "padding input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                <select class="form-select" aria-label="Default select example" id="city" name="city">
                    <option selected disabled>Choose City</option>
                </select>
            </div>
            <div class = "input-group my-3 w-75 mx-auto">
                <input type="submit" name="submit" value="Register" class = "btn btn-success fs-4 rounded-3 w-100">
            </div>
        </div>
    </div>
</body>
</html>