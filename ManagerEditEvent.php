<?php
 session_start();
 //$eventID = $_SESSION['EventID'];
 $eventID = $_GET['id'];

 
//Database connention
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM `events` WHERE `EventID` = '" . $eventID . "'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>       

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <style type="text/css">



td {
  text-align: left;
}

button, .buttonstyle, input[type=submit]
{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 1px solid white;
    border-radius: 50px;
    padding: 10px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: medium;
    background: none;
    text-align: center;
    margin: 10px;
}

.container {
	padding: 20px;
	background-color: rgba(0, 0, 0, 0.5);
	margin: auto;
	margin-top: 20px;
	line-height: 30px;
	width: 500px;
  text-align: left;
  border-radius: 20px;
}

.container span {
	padding-left: 40px;
	display: inline-block;
  vertical-align: top;
	width: 30%;
}

.container input{
	min-height: 25px;
	display: inline-block;
	width: 50%;
}

.container textarea {
	display: inline-block;
	margin-top: 10px;
	width: 50%;
}
.container select {
	min-height: 25px;
	display: inline-block;
	width: 51%;
}

.container input[type=number] {
  min-height: 25px;
	display: inline-block;
	width: 49.4%;
}

.right{
  text-align: right;
}

body{
    color: white;
    font-size:2em;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

</style>
</head>
<body class="admin">

<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="viewManger.php"><i class="fa-solid fa-circle-plus"></i> My events </a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main">
<h2>Edit Event</h2>
<h4>Enter the event new information:</h4>

<div class="container">

<form action="EditEvent.php?id=<?php echo $eventID; ?>" method="post">
<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
  echo '<script> window.onload=function(){alert("The event is updated successfuly");}; </script>';}
  
  else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
  echo '<script> window.onload=function(){alert("Failed: Something went wrong!");}; </script>         ';
  }

  else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR1')){
    echo '<script> window.onload=function(){alert("Failed: There is an event with the same date and time!");}; </script>         ';
    }

  else if (isset ($_GET['problem']) and ($_GET['problem']=='DELETEERROR')){
     echo '<script> window.onload=function(){alert("Failed to delete the event!");}; </script>         ';
     }

?>       
<p>

    <label for="uploadImg"> <span>Event Picture:</span>
    <span class ="right">  <img src= "<?php echo $row[6] ?>" height="140px" width="140px" id="img" style="cursor: pointer">       </span>         
</label>

    <input type="file" accept="image/*" name="event_img" id="uploadImg" style="display: none; " onChange="change()" />
</p>

<p>
    <label for="eventTitle"><span>Event Title:</span></label>
   <input type="text" name="event_title" id="eventTitle" 
   value = "<?php echo $row[1] ?>"
   required> 
</p>

<p>
    <label for="eventDescription"><span> Event Description:</span></label>
    <textarea class="border" name="event_description" id="eventDescription" cols="60" rows="10" " required ><?php echo $row[4]; ?></textarea><br>
</p>

<p>
    <label for="eventTime"><span>Event Time:</span></label>
    <select name="event_time" id="eventTime" required>
        <option value="12 PM - 2 PM"  <?php if ($row[2] == '12 PM - 2 PM') echo 'selected'; ?>>12 PM - 2 PM</option>
        <option value="2 PM - 4 PM" <?php if ($row[2] == '2 PM - 4 PM') echo 'selected'; ?>>2 PM - 4 PM</option>
        <option value="4 PM - 6 PM" <?php if ($row[2] == '4 PM - 6 PM') echo 'selected'; ?>>4 PM - 6 PM</option>
        <option value="6 PM - 8 PM" <?php if ($row[2] == '6 PM - 8 PM') echo 'selected'; ?>>6 PM - 8 PM</option>
        <option value="8 PM - 10 PM" <?php if ($row[2] == '8 PM - 10 PM') echo 'selected'; ?>>8 PM - 10 PM</option>
        <option value="10 PM - 12 AM" <?php if ($row[2] == '10 PM - 12 AM') echo 'selected'; ?>>10 PM - 12 AM</option>   
    </select>
</p>


<p>
    <label for="eventDate"><span>Event Date:</span></label>
    <input type="Date" name="event_date" id="eventDate" 
    value = "<?php echo $row[3] ?>"
    required>
</p>

<p>
    <label for="eventTickets"><span>Number of Tickets:</span></label>
    <input type="number" id="eventTickets" name="event_tickets" min="1" max="100" 
    value = "<?php echo $row[5] ?>"
    required> 
</p>



<p>
<label for="eventActor"><span>Actor:</span> </label>
 <select id="eventActor" name="event_actor" required>
  <?php

  
  $query="SELECT * FROM actor";
  $result=mysqli_query($conn, $query);

  //Show available actors
  while ($actors=mysqli_fetch_row($result)){

        echo '<option value="' 
    . $actors[0] .
    '"';

     if ($actors[3] == $row[7]) 
     echo 'selected'; 

    echo '>'
    . $actors[0] .
    '</option>';
  }


    ?>
</select>
<br> 

</p>



  

  


 
           <div class="center"><input type="submit" name="update_button" value="Update Event" style="background-color: #8497b5; border:none;"> </div>
           <div class="center"><input type="submit" name = "delete_button" value="Delete Event" style="background-color: red; border:none;"> </div>

          </form>

</div>

</div>




<script type="text/javascript">
      
        
      function change(){
      
      var imgname=document.getElementById("uploadImg").files[0];    
      var imgplace=document.getElementById("img");
      var im=new FileReader();  
          im.onload=function(){
              imgplace.src=this.result 
          }
          
        im.readAsDataURL(imgname); 
      }


       //Form validation

  function validate() {
  }
      
      
      
      </script>
</body>
</html>