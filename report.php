<?php
  include 'db.php';
  session_start();
  if(!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="containter">  
  <div class="top">
  <div class="welcome_page">
                <h1>Welcome,<?=$_SESSION['username'];?>!</h1>
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
        </ul>
    </nav>
  </div>
  </div>  
  </div>
<div class="main">
    <h1></h1>

    <div class="sub-div">
        <p style="color:white;">Event</p>
        <?php
        $sel="select * from events";
            $rs=mysqli_query($claude,$sel);
        ?>   
        <label for="" style="color:white;"><?=mysqli_num_rows($rs).'%'?></label>
    </div>
    <div class="sub-div">
    <p style="color:white;">Attendees</p>
    <?php
        $sel="select * from attendees";
            $rs=mysqli_query($claude,$sel);
        ?>   
        <label for="" style="color:white;"><?=mysqli_num_rows($rs).'%'?></label>
    </div> 
    <div class="sub-div">
    <p style="color:white;">About</p>
    </div> 
</div>
<div class="big">
    <h1 style="color:white; margin-left:30px; font-family:'Times New Roman', Times, serif;">Over View</h1>
<table border="1px" cellspace="0px" cellpadding="5px">
        <tr>

            <th>Event name</th>
            <th>Location</th>
            <th>Name</th>
            <th>email</th>
            
        </tr>
        <?php
        $select="SELECT attendees.*,events.* FROM attendees NATURAL JOIN events;";
        $rs=mysqli_query($claude,$select);
        while ($row=mysqli_fetch_array($rs)){?>
        <tr>
            <td><?=$row['Name']?></td>
            <td><?=$row['Location']?></td>
            <td><?=$row['UseraName']?></td>
            <td><?=$row['Email']?></td>
            
        </tr>


        <?php
        
        }
        ?>
    </table>
    </div>
</body>
</html>