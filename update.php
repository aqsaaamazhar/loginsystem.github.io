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
    <title>Update</title>
</head>
<body>
<div class="main">
        <?php
    include("header.php");
    include("menubar.php");
    ?>
    <div class="mainarea">
        <div style="margin:auto; width:40%; ">
            <form action="update.php" method="POST" enctype="multipart/form-data" ><br>
            <label for="ab">Select the section which you want to update:</label>
            <select name="ab" id="ab" required>
                <option>Select a value</option>
                <option value="name">Name</option>
                <option value="carcompany">Car Company</option>
                <!-- <option value="carmodel">Car Model</option> -->
                <option value="carcolor">Car color</option>
        </select><br><br>
        <label for="abc">Insert your new data:</label>
        <input type="text" name="new" required><br><br>
        <input type="submit" name="submit" value="update" id=a>
    </form>
    </div>
    </div>
    <?php
    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {

        $value=$_POST['ab'];
        $new=$_POST['new'];
        if($value=="name")
        {
            $sql="UPDATE user SET name='$new' Where email='$email'";
        }
        else if($value=='carcompany')
        {
            $sql="UPDATE user SET carcompany='$new' Where email='$email'";
        }
        elseif($value=='carcolor')
        {
            $sql="UPDATE user SET carcolor='$new' Where email='$email'";
        }
        else
        {
            echo "select valid data";
        }
        if(mysqli_query($conn,$sql))
        {
            echo"<span style='color:greeen;margin-left:40%;text-align:center;'>".$value."Sucessfully updated<br><br>";
            header('Location:admin.php');
        }
        else{
            echo mysqli_error($conn);
        }
    }


    ?>

    </div>



    <?php
    include("footer.php");
    ?>

    </div>
    
</body>
</html>