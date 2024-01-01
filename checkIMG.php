<?php
  // require "vendor/autoload.php";
  // use Zxing\QrReader;
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["my_file"]["name"]);
  $uploadOk = 1;  
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["my_file"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      if(file_exists($target_file))
      {
        header("Location: set_up.php?err=1");
      }
      else
      {
        move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_file);
        // $qrdata = QRcode::decode($_FILES["my_file"]["tmp_name"]);
        // echo "<br>QR Code Data : $qrdata";
        // header("Location: check_upload_QR.php?file=$target_file");
        echo "QRCODE Uploaded";
      }
      $uploadOk = 1;

    } else {
      header("Location: set_up.php?err=2");
      $uploadOk = 0;
    }
  }
?>