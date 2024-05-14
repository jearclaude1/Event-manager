<?php
  include 'db.php';
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
                <p>This is your dashboard. You can add more content here.</p>
                <div class="link">
                    <a href="logout.php">Logout</a>  
                </div> 
            </div>
  <div class="menu">
    <nav>
        <ul>
            <li> <a href="./attendece.php">Attendees</a></li>
            <li> <a href="./dashboard.php">Event</a></li>
            <li> <a href="./repport.php">Home</a></li>
        </ul>
    </nav>
  </div>
  </div>  
  </div>
<div class="body_content">
    <form action="" method="post">
        <h1>ATTENDENCE</h1>
     <select name="event" id="" class="box">
      <option value="name">Select Event</option>    
           <?php 
            $sel="select * from events";
            $rs=mysqli_query($claude,$sel);
            while ($row = mysqli_fetch_assoc($rs)) {
                ?>
            <option value="<?=$row['EventID']?>"><?php echo $row['Name']?>         
     <?php            }
            ?>
        </option>
        </select>
       <input type="text" name="name" placeholder="username">
        <input type="email" value="" name="email" id="" placeholder="email">
        <input type="submit" value="okay" name="yes">
    </form>
    <?php

    if(isset($_POST['yes'])){
        $event_id=$_POST['event'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $insert="INSERT INTO `attendees`(`AttendeeID`, `EventID`, `UseraName`, `Email`)
         VALUES ('','$event_id','$name','$email')";
         $qry=mysqli_query($claude,$insert);
    }
    ?>
    <table border="2px" cellspace="0px" cellpadding="10px">
        <tr>
            <th>ID</th>
            <th>Event name</th>
            <th>Name</th>
            <th>email</th>
            <th colspan="3px">action</th>
        </tr>
        <?php
        $select="SELECT * FROM attendees";
        $rs=mysqli_query($claude,$select);
        while ($row=mysqli_fetch_array($rs)){?>
        <tr>
            <td><?=$row['AttendeeID']?></td>
            <td><?=$row['EventID']?></td>
            <td><?=$row['UseraName']?></td>
            <td><?=$row['Email']?></td>
            <td><a href="delete.php?id=<?php echo $row['AttendeeID'];?>">delete</a></td>
            <td><a href="update.php?edit=<?php echo $row['AttendeeID'];?>">update</a></td>
        </tr>
        <?php
        
        }
        ?>
    </table>
</div>
</body>
</html>