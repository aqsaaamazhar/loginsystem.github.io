<?php
session_start();
if(isset($_SESSION['email'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link href="mystylesheet.css"  rel="stylesheet">
</head>
<body>

    <div class="main">
        <?php
    include("header.php");
    include("menubar.php");
    ?>
    <div class="mainarea"><br><br>
    <?php
    $target_dir = "user_files/";
    $target_file = $target_dir.basename($_FILES["ufile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $email=$_SESSION['email'];
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ufile"]["tmp_name"]);
    if($check !== false) {
      echo "<b style='color:green;'>File is an image - " . $check["mime"] . ".</b><br>";
      $uploadOk = 1;
    } else {
      echo "<b style='color:red;'>File is not an image.</b><br>";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    $target_file=$target_file.time().".".$imageFileType;
    $uploadOk = 1;
  }
  if ($_FILES["ufile"]["size"] > 2000000) {
    echo "<b style='color:red;'> Your file is too large.</b><br>";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<b style='color:red;'> Only JPG, JPEG, PNG & GIF files are allowed.</b><br>";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<b style='color:red;'>Your file was not uploaded.</b><br>";
  // if everything is ok, try to upload file
  } else {
    // unlink($_SESSION['profile_img']);
    if (move_uploaded_file($_FILES["ufile"]["tmp_name"], $target_file)) {
  
      include('connect.php');
      $sql="UPDATE user Set profile_img='$target_file' Where email='$email'";
      if(mysqli_query($conn,$sql))
      {
      echo "<b style='color:green;'>The file ". htmlspecialchars( basename( $_FILES["ufile"]["name"])). " has been uploaded as you new DP.</b><br>";
      $_SESSION['profile_img']=$target_file;
      header('Location:admin.php');
    }
    } else {
      echo "<b style='color:red;'> Sorry, there was an error uploading your file.</b>";
    }
  }

  }
    ?>
    </div>
    <?php 
include('footer.php');

?> 
</div>

</body>
</html>  