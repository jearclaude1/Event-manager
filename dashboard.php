<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}
include "db.php";
    if(isset($_POST['yes'])){
        $name=$_POST['name'];
        $date=$_POST['date'];
        $location=$_POST['location'];
        $insert="INSERT INTO `events`(`EventID`, `Name`, `Date`, `Location`)VALUES ('','$name','$date','$location')";
        $qry=mysqli_query($claude,$insert);
        $_SESSION['username'] = $name;
        header('location:dashboard.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
  <div class="containter">  
  <div class="top">
            <div class="welcome_page">
                <h1>Welcome, Back !</h1>
                <p>This is your dashboard. You can add more content here.</p>
                <div class="link">
                    <a href="logout.php">Logout</a>  
                </div> 
            </div>
  <div class="menu">
    <nav>
        <ul>
            <li> <a href="./attendence.php">Attendees</a></li>
            <li> <a href="./dashboard.php">Event</a></li>
            <li> <a href="./report.php">Home</a></li>
        </ul>
    </nav>
  </div>
  </div>  
  </div>
   <div class="body_content">
   <form action="" method="post">
        <h1>Event</h1>
        <input type="text" name="name" id="" placeholder="name">
        <input type="date" name="date" id="" placeholder="date">
        <input type="text" name="location" id="" placeholder="location">
        <input type="submit" value="enter" name="yes">
    </form>
   </div>
 <div class="fetch">
 <table border="2px" cellspace="0px" cellpadding="10px">
        <tr>
            <th>Event name</th>
            <th>Name</th>
            <th>Location</th>
            <th colspan="3px">action</th>
        </tr>
        <?php
        $select="SELECT * FROM events";
        $rs=mysqli_query($claude,$select);
        while ($row=mysqli_fetch_array($rs)){?>
        <tr>
            <td><?=$row['Name']?></td>
            <td><?=$row['Date']?></td>
            <td><?=$row['Location']?></td>
            <td><a href="delete.php?id=<?php echo $row['EventID'];?>">delete</a></td>
            <td><a href="update.php?edit=<?php echo $row['EventID'];?>">update</a></td>
        </tr>


        <?php
        
        }
        ?>
    </table>
 </div>

</body>
</html>