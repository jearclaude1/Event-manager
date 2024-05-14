<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <form action="" method="post">
    <h1>Attendees</h1>
    <?php
  include 'db.php';
  $id=$_GET['edit'];
    
  $sel="SELECT * FROM `attendees` WHERE AttendeeID='$id'";
    $rs=mysqli_query($claude,$sel);
    while ($row = mysqli_fetch_assoc($rs)) {
?>     
    <input type="text" name="name" value="<?=$row['UseraName']?>" placeholder="name">
    <input type="email" name="date" value="<?=$row['Email']?>" placeholder="date">
    <input type="submit" value="enter" name="yes">
    </form>
<?php
}
?>


<?php
if (isset($_POST['yes'])) {
    $name= $_POST['name'];
    $email = $_POST['date'];
    $insert=" UPDATE `attendees` SET `UseraName`='$name',`Email`='$email' WHERE  AttendeeID='$id'";
    $qry=mysqli_query($claude,$insert);
    header('location:attendence.php');
}
?>
<!-- end of update for attendence -->














<!-- event -->

<form action="" method="post">
    <h1>Event</h1>
    <?php
  include 'db.php';
  $id=$_GET['edit'];
    
  $sel="SELECT * FROM `events` WHERE EventID='$id'";
    $rs=mysqli_query($claude,$sel);
    while ($row = mysqli_fetch_assoc($rs)) {
?>     
    <input type="text" name="name" value="<?=$row['Name']?>" placeholder="name">
    <input type="date" name="date" value="<?=$row['Date']?>" placeholder="date">
    <input type="Location" name="Location" value="<?=$row['Location']?>" placeholder="date">
    <input type="submit" value="enter" name="yes">
    </form>
<?php
}
?>


<?php
if (isset($_POST['yes'])) {
    $name= $_POST['name'];
    $email = $_POST['date'];
    $Location = $_POST['Location'];
    $insert=" UPDATE `events` SET `Name`='$name',`Date`='$email',`Location`='$Location' WHERE  EventID='$id'";
    $qry=mysqli_query($claude,$insert);
    header('location:dashboard.php');
}
?>
<!-- end for event -->
</body>
</html>

