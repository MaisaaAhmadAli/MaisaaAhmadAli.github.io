<?php
//,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic`
session_start();
include('connection.php'); 
$conn=OpenCon();
 $sqlforview = "SELECT `Title` FROM `event` WHERE `EventID`=  (SELECT `EventID` FROM `add_delete` WHERE `MangerID`='" .$_SESSION['MangerID'] ."');";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
 while($rowforview =mysqli_fetch_array($result)) 
   { 
    $summary = $rowforview['Title']; 
    echo $summary; 
   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>