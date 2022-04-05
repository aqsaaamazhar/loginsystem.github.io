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
    <div class="mainarea">

    <div class="frm">
        <form action="pic_submit.php" method="POST" enctype="multipart/form-data"><br> 
        <label for="profile_img">UPLOAD IMAGE: </label><input type="file" name="ufile" id="profile_img" required><br><br>
        <br> 
            <input type="submit" value="upload">
            </form>
            </div>
    </div>



    <?php
    include("footer.php");
    ?>

    </div>
    
</body>
</html>