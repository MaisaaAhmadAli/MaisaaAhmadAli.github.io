
<?php
 
 // servername => localhost
 // username => root
 // password => empty
 // database name => event
 $conn = mysqli_connect("localhost", "root", "", "event");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
//Get number of actors  //DELETE THIS LATER
$query = "SELECT * FROM actor";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);

 // take the data from the form 
 $name =  $_REQUEST['actor_name'];
 $gender =  $_REQUEST['actor_gender'];
 $email = $_REQUEST['actor_email'];
 $id = $n+17; //CHANGE THIS

 //TO GET THE ADMIN ID
 $query = "SELECT * FROM `admin`";
 $result=mysqli_query($conn, $query);
 $row=mysqli_fetch_row($result);
 
 $admin_id = $row[2];


  
 // insert query
 $sql = "INSERT INTO actor  VALUES ('$name',
     '$email','$gender', '$id' ,'$admin_id')";
  
 if(mysqli_query($conn, $sql)){
   header('location: AdminNewActor.php?problem=ADD'); //go back to the add page

 }
 
 else
    header('location: AdminNewActor.php?problem=ADDERROR')
 

 ?>