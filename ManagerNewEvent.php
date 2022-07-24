<?php
session_start();
if (!isset($_SESSION['MangerID']))
header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Add Event</title>
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


.right{
  text-align: right;
}


</style>
</head>
<body class="admin">


<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerAccount.php"><i class="fa-solid fa-user"></i> My account </a>
  <a href="viewManger.php"><i class="fa-solid fa-calendar-check"></i> My events </a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="Logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main">
<h2>Add New Event</h2>
<h4>Enter the event information:</h4>

<div class="container">

<form action="InsertEvent.php" method="post" name ="newEventForm" onsubmit = "return(validate());">
<?php
if (isset ($_GET['problem']) and ($_GET['problem']=='ADD')) {
echo '<script> window.onload=function(){alert("The event is added successfuly");}; </script>';}

else if (isset ($_GET['problem']) and ($_GET['problem']=='ADDERROR')){
echo '<script> window.onload=function(){alert("Failed: Something went wrong!");}; </script>         ';
}
else if (isset ($_GET['problem']) and ($_GET['problem']=='ADDERROR1')){
  echo '<script> window.onload=function(){alert("Failed: There is an event with the same date and time!");}; </script>         ';
  }
?>       
<p>

    <label for="uploadImg"> <span>Event Picture:</span>
    <span class ="right">  <img src="upload.png" height="140px" width="140px" id="img" style="cursor: pointer">       </span>         
</label>

    <input type="file" accept="image/*" name="event_img" id="uploadImg" style="display: none;" onChange="change()" />
</p>

<p>
    <label for="eventTitle"><span>Event Title:</span></label>
   <input type="text" name="event_title" id="eventTitle" required> 
</p>

<p>
    <label for="eventDescription"><span> Event Description:</span></label>
    <textarea class="border" name="event_description" id="eventDescription" cols="60" rows="10" " required ></textarea><br>
</p>

<p>
    <label for="eventTime"><span>Event Time:</span></label>
    <select name="event_time" id="eventTime" required>
        <option value="12 PM - 2 PM">12 PM - 2 PM</option>
        <option value="2 PM - 4 PM">2 PM - 4 PM</option>
        <option value="4 PM - 6 PM">4 PM - 6 PM</option>
        <option value="6 PM - 8 PM">6 PM - 8 PM</option>
        <option value="8 PM - 10 PM">8 PM - 10 PM</option>
        <option value="10 PM - 12 AM">10 PM - 12 AM</option>   
    </select>
</p>


<p>
    <label for="eventDate"><span>Event Date:</span></label>
    <input type="Date" name="event_date" id="eventDate" required>
</p>

<p>
    <label for="eventTickets"><span>Number of Tickets:</span></label>
    <input type="number" id="eventTickets" name="event_tickets" min="1" max="100" required> 
</p>



<p>
<label for="eventActor"><span>Actor:</span> </label>
 <select id="eventActor" name="event_actor" required>
  <?php
  //Database connection
  $conn = mysqli_connect("localhost:3306", "root", "", "event");
  if (!$conn)
  die ("Could not connect to the database");
  
  $query="SELECT * FROM actor";
  $result=mysqli_query($conn, $query);

  //Show available actors
  while ($row=mysqli_fetch_row($result)){

        echo '<option value="' 
    . $row[0] .
    '">'
    . $row[0] .
    '</option>';
  }


    ?>
</select>
<br> 

</p>



  

  


 
           <div class="center"><input type="submit" value="Create Event" style="background-color: #8497b5; border:none; " onclick="sendEmail()"> </div>
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

      function validate() {
//1- Check if all information filled
  if (document.forms["newEventForm"]["event_img"].value == "") {
    alert("Please upload an image. ");
    return false;
  }
}
      
      
      
      </script>
</body>
</html>