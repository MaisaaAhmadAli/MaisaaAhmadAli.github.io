<?php

if (isset($_POST['Tickets'])&&isset($_POST['Payment'])) 
{
session_start();
include('connection.php'); 
$conn=OpenCon();
$newTicketsNumber=($_POST['Tickets'])-($_SESSION['AvailableTickets__']);
$sqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`)
VALUES ('".$_POST['Payment']."','".$_POST['Tickets']."','".$_SESSION["userID"]."','".$_SESSION['EventID']."');";

$sqlUpdateEvent="UPDATE `events` SET `AvailableTickets__`='".$newTicketsNumbe."' WHERE `EventID`='".$_SESSION['EventID']."';";
if ($ResultSqlInsertToBook= mysqli_query($conn, $SqlInsertToBook)&&$ResultSqlUpdateEvent= mysqli_query($conn, $SqlUpdateEvent))  
{
  echo "Booked sucssfly ";
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}


?>
<!-- <html>
<script>

var NumberOfTickets = document.getElementById("Tickets").value;
document.write("NumberOfTickets");
</script></html> -->