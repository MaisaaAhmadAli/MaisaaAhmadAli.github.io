<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css">
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

</style>
</head>
<body class="homePage admin">

<div class="sidenav">
    <a href="AdminHome.php"><i class="fa-solid fa-house"></i> Home</a>
    <a href="AdminNewActor.php"><i class="fa-solid fa-circle-plus"></i> Add Actor</a>
  <a href="AdminNewManager.php"><i class="fa-solid fa-circle-plus"></i> Add Manager</a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main" style="margin-top: 10%">
<h2>Edit Actor</h2>
<h4>Enter the actor new information:</h4>

<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
   echo '<script> window.onload=function(){alert("The actor is updated successfuly");}; </script>';}
   
   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
   echo '<script> window.onload=function(){alert("Failed to update the actor!");}; </script>         ';
   }



   else if (isset ($_GET['problem']) and ($_GET['problem']=='DELETEERROR')){
      echo '<script> window.onload=function(){alert("Failed to delete the actor!");}; </script>         ';
      }



//if (isset ($_GET['id']))
$actorID = $_GET['id']; 

echo '<form action="EditActor.php?id=' . $actorID . '" method="post">';

//Database connention
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM actor WHERE `ActorID` = '" . $actorID . "'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>        


<p>
   <label for="actorName">Actor Name:</label>
   <input type="text" name="actor_name" id="actorName"
   value = "<?php echo $row[0] ?>"
   >
</p>




<p>
   <label for="actorGender">Gender:</label>
   <input type="text" name="actor_gender" id="actorGender"
   value = "<?php echo $row[2] ?>"
   >
</p>




<p>
   <label for="actorEmail">Actor Email:</label>
   <input type="text" name="actor_email" id="actorEmail"
   value = "<?php echo $row[1] ?>"
   >
</p>

 
         <div class="center">
            <input type="submit" value="Save" name="update_button"> 
            <input type="submit" value="Cancel" name = "cancel_button">
            <br><br><br>
           <input type="submit" value="Delete this actor" name = "delete_button"style="background-color: #ea9087" onclick = "myFunction()">


         </div> 

           
         </form>

<p> 

</div>



<?php echo '
<script>
function myFunction() {
  if (confirm("Are you sure you want to delete?") == true) {
   window.location="EditActor.php?id='
   . $actorID .
   '";
   return true;
  } 

}
</script>
'
?>

</body>
</html>