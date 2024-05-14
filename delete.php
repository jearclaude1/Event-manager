<?php
include 'db.php';
$id=$_GET['id'];
$del="DELETE FROM attendees WHERE AttendeeID='$id'";
$rs=mysqli_query($claude,$del);
header('location:attendence.php');
?>

<!-- event  -->
<?php
$id=$_GET['id'];
$del="DELETE FROM events WHERE EventID='$id'";
$rs=mysqli_query($claude,$del);
header('location:dashboard.php');
?>
