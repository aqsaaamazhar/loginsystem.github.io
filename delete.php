<?php
session_start();
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mystylesheet.css"  rel="stylesheet">
    <title>Delete</title>
</head>
<body>

<div class="main">
        <?php
    include("header.php");
    include("menubar.php");
    ?>
    <div class="mainarea">
    <div class="aa">
    <form action="delete.php" method="POST" enctype='multipart/form-data' style="width:30%; margin:auto;"><br>
    <label for="ab">Do you want to delete account?</label>
    <br><br><br>
    <input type="submit" value="Yes" id="b"></br>
    </form>
    </div>
    </div>
    <?php
    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $sql="DELETE FROM user WHERE email='$email'";
        if (mysqli_query($conn,$sql))
        {
            header('Location:login.php');
        }
    }
    ?>
    
    <?php
    include("footer.php");
    ?>

    </div>
    
    
</body>
</html>