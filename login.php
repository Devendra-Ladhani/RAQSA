<?php
session_start();
include_once 'connection.php';
include_once 'header2.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Main</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class = "bg-light d-flex align-items-center justify-content-center">
<div class = "container bg-white mt-5 mx-3 rounded-3 py-5 shadow">
    <div class = "header text-danger fs-1 fw-bolder text-center my-3">
        Log In
    </div>
    <div class = "">
        <form action = "login.php" method="POST" class = "my-4">
            <div class = "padding form-floating mx-auto my-4">
                <input id = "email" type="text" class="form-control" placeholder="Enter Email Address" aria-label="Username" aria-describedby="basic-addon1" name = "email" required>
                <label for = "email">Email Id</label>
            </div>
            <div class = "padding form-floating mx-auto my-4">
                <input id = "passw" type="password" class="form-control" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" name = "passw" required>
                <label for = "passw">Enter Password</label>
            </div>
            <div class = "mt-5">
                <input id = "verifyBtn" type = "submit" name = "submit" value = "Submit" class = "btn btn-danger w-100 fs-5">
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $sql = "SELECT `mu_id` from `main_user` WHERE `email` = '".$email."' AND `passw` = '".$passw."'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($i=mysqli_fetch_assoc($res))
        {
            $mu_id = $i['mu_id'];
        }
        $_SESSION['muid'] = $mu_id;
        echo '<script>
		            Swal.fire({
		                icon: "success",
		                title: "Log In Successfull",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="dashCust.php"
		            })
		        </script>';
    }
    else
    {
        session_commit();
        echo '<script>
		            Swal.fire({
		                icon: "error",
		                title: "Email Id or Password is wrong",
		                showConfirmButton: true
		            }).then(() => {
		                window.location.href="login.php"
		            })
		        	</script>';
    }
}
?>
</body>
</html>