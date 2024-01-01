<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class = "pb-5 pt-3">
<section class = "">
<h2 class="h1 fw-bolder text-center my-4">Contact us</h2>
<p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
    a matter of hours to help you.</p>

<div class="">
    <div class="border rounded-4 shadow fs-5 mx-2">
    <form class="m-3" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label">Message</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message"></textarea>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-12 form-group ml-5">
                  <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4 w-100">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>
    </div>
    <div class="d-flex justify-content-between align-items-center text-center rounded-2 mx-4 mt-4">
            <a href="mailto:scanme@gmail.com" class = "h-100 w-50" style="text-decoration:none; color:black;"><i class="fas fa-envelope fa-2x"></i>
                <p class = "fw-light">scanme@gmail.com</p>
            </a>

            <a href = "tel:9510743136?" class = "h-100 w-50" style="text-decoration:none; color:black;"><i class="fas fa-phone fa-2x"></i>
                <p class = "fw-light">9510743136</p>
            </a>
        </div>

</div>

</section>
<?php
include_once 'footer.php'
?>
    
</body>
</html>
