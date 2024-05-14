<?php
include 'db.php';

if(isset($_POST['signup'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $insert="INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')";
    $res=$claude->query($insert);
    
    header('location:dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
</head>
<body>
    <fieldset>
    <h3>SIGN UP</h3>
    <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username" required><br><br>
        <label for="">password</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="signup" name="signup">
        <input type="submit" value="cancel" name="cancel">
        <h5>log in your account <a href="index.php">login</a></h5>
    </form>
    </fieldset>
</body>
</html>