<?php
include 'db.php';

session_start();

if (isset($_SESSION['username'])) {
    header('location:dassoard.php');
}

if(isset($_POST['signup'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sel=" SELECT * FROM `user` WHERE `username`='$username'AND`password`='$password'";
    $res = $claude->query($sel);
    $row = mysqli_fetch_assoc($res);
    
    if ($row) {

        $_SESSION['username'] = $row['username'];
        header('location:report.php');
        exit;

    } 
    else {
        echo "Invalid username or password";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
</head>
<body>
<div class="header">
    <fieldset>
    <h3>LOGIN FORM</h3>
       <form action="" method="post">
        <label for="">username</label>
        <input type="text" name="username" required><br><br>
        <label for="">password</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="submit" name="signup">
        <input type="submit" value="cancel" name="cancel">
        <h5>create user account <a href="Signup.php">signup</a></h5>
    </form>
    </fieldset>
    </div>
</body>
</html>