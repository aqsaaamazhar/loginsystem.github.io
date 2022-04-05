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
    <img src="<?php echo $_SESSION['profile_img'];?>" style= "width:100px;height:100px;margin:auto;align:center;border-radius:50px;margin-left:45%;border:2px solid black;">
    <br><br>
    <div style="margin:auto;text-align:center;font-size:20px;">
    
    
    <?php
    include("connect.php");

    echo "NAME: ".$_SESSION['name']."<br><br>";
    echo "Carcompany: ".$_SESSION['carcompany']."<br><br>";
    echo  "Carmodel: ".$_SESSION['carmodel']."<br><br>";
    echo "Carcolor: ".$_SESSION['carcolor']."<br><br>";

    ?>


</button> <button id="b"><a href="profile_img.php">Update Your  PROFILE Pic </a></button><br>
</button> <button id="b"><a href="Update.php">Update Your  Info </a></button><br>
<button id="b"><a href="delete.php">Delete  Your Profile</a></button><br>
<button id="b"><a href="logout.php">LOGOUT</a>


    </div>
    </div>


    <?php
    include("footer.php");
    ?>

    </div>
    
</body>
</html>
<?php
}
else {
header('Location:login.php');
}
?>