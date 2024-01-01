<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css" integrity="sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .skeleton-bg-header {
        position: fixed;
        top: 0;
        overflow: hidden;
    }

    .skeleton-bg-header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /*border: 2px solid blue;*/
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
<div id = "skeleton_header" class = "skeleton-bg-header d-flex justify-content-between align-items-center ps-3 mb-5" style="height:80px; width: 100%; display: block!important;">
</div>

<div id = "actual_header" class = "header bg-danger shadow " style="height:75px; display: none!important;">
	<div class = "p-2 justify-content-between w-100 h-100 d-flex align-items-center">
        <div class = "w-50 h-100 d-flex align-items-center">
            <img src="images/logo1.png" class = "w-100">
        </div>
        <div>
            <a href="acc_profile.php"><img src="images/profile.png" class="h-100 w-100"/></a>
        </div>
	</div>
<!--	<div class="w-25">-->
<!--		<a href="acc_profile.php"><img src="images/profile.png" class="h-100" style="width:70%; " /></a>-->
<!--	</div>-->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Simulate API/data fetching delay (you can remove this in a real scenario)
        // console.log("header function is working");
        setTimeout(function () {
            document.getElementById('skeleton_header').setAttribute('style', 'display: none !important');
            document.getElementById('actual_header').setAttribute('style', 'height:75px; display: block !important;');
            // document.getElementById('actual_header').setAttribute('class', 'header bg-danger d-flex');
            // document.getElementById('skeleton_header').classList.remove('skeleton-bg');
        }, 2000);

        // Simulate the skeleton loading effect for the header
        // const headerContainer = document.getElementById('skeletonHeaderContainer');
        // headerContainer.classList.add('skeleton-loading');
    });
</script>