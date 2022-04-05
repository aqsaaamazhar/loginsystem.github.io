<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="mystylesheet.css"  rel="stylesheet">
</head>
<body>

    <div class="main">
        <?php
    include("header.php");
    include("menubar.php");
    ?>
    <div class="mainarea">

        <h1 style="font-size:50px; text-align:center;color:white;font-family:cursive;"> Please Signup Your Account </h1>
        <div class="frm">
        <form action="signup.php" method="POST" >
        <label>First Name</label>  <input type="text"  name="name"   id="in"><br><br>
        <!-- <label>Last Name</label>   <input type="text"  name="lastname" id="in"><br><br> -->
        <label>Password</label>      <input type="password"  name="password1" id="in"><br><br>
        <label>Email</label>     <input type="email"  name="email" id="in"><br><br>
        <label>Car company</label>  <input type="text"  name="carcompany" id="in"><br><br>
        <label>Car model</label>    <input type="text"  name="carmodel" id="in"><br><br>
        <label>Car colour</label>    <input type="text"  name="carcolor" id="in"><br><br>
        <input type="checkbox" name="checkbox" id="checkbox"required><label for="checkbox" >I agree to terms and condition </label><br>

        <input id="button" type="submit" name="submit"  value="submit" >


    </form>

    </div>
    </div>


    

    </div>

    <?php

    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $name=$_POST['name'];
        $pass1=md5($_POST['password1']);
       
        $email=$_POST['email'];
        $carcompany=$_POST['carcompany'];
        $carmodel=$_POST['carmodel'];
        $carcolor=$_POST['carcolor'];
        $sql="INSERT INTO user (name,password,email,carcompany,carmodel,carcolor)
        VALUES ('$name','$pass1','$email','$carcompany','$carmodel','$carcolor')";
        if(mysqli_query($conn,$sql))
        {
            echo "<span style='color:green; margin-left:45%;text-align:center;'> You have successfully registered </span>";
        }
        else
        {
            echo "<span style='color:red; margin-left:45%;text-align:center;'> error</span><br><br>";

        }
    }
    ?>
    <?php
    
    include("footer.php");

    ?>

    
</body>
</html>