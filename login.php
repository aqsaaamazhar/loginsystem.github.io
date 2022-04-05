<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="mystylesheet.css"  rel="stylesheet">
</head>
<body>

    <div class="main">
        <?php
    include("header.php");
    include("menubar.php");
    ?>
    <div class="mainarea">
    
    <h1 style="font-size:50px; text-align:center;color:white;font-family:cursive;"> Please Login Carefully! </h1>
    <div class="frm">
        <form action="login.php" method="POST" >

        
       
        <label>Email</label>     <input type="email"  name="email" id="in" required><br><br>
        <label>Password</label>      <input type="password"  name="password1" id="in"><br><br>
        <input type="submit" name="submit" vale="login">
        </form>
    </div>

    <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $pass1=md5($_POST['password1']);
        $email=$_POST['email'];
        include('connect.php');
        if(isset($_POST['email'] )){
            $sql1="SELECT * FROM user where password='$pass1' AND email='$email' limit 1";
            $result=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result)==1)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $_SESSION['id']=$row['id'];
                    $_SESSION['name']=$row['name'];
                    $_SESSION['password']=$row['password'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['carcompany']=$row['carcompany'];
                    $_SESSION['carmodel']=$row['carmodel'];
                    $_SESSION['carcolor']=$row['carcolor'];
                    $_SESSION['profile_img']=$row['profile_img'];
                    header('Location:admin.php');
                }
            }
            else{
                echo "<span style='color:red;'>Invalid Login</span>";
            }
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