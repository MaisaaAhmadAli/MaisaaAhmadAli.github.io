<?php


//,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic`
$SqlForEvents="SELECT `Title`,`Time`,`Date`,`AvailableTickets__`,`Pic`,`ActorID` FROM `events` WHERE `EventID`='".$_SESSION['EventID']."';";
if ($ResultSqlForEvents = mysqli_query($conn, $SqlForEvents))  
 {
  while($RowForEvents =mysqli_fetch_array($ResultSqlForEvents))
  {
    $_SESSION['ActorID']=$RowForEvents['ActorID'];
    $_SESSION['Title']=$RowForEvents['Title'];
    $_SESSION['Time']=$RowForEvents['Time'];
    $_SESSION['Date']=$RowForEvents['Date'];
    $_SESSION['AvailableTickets__']=$RowForEvents['AvailableTickets__'];
    $_SESSION['Pic']=$RowForEvents['Pic'];
    //  $_SESSION['Description']=$RowForEvents['Description']; 

    $SqlForActor="SELECT `Name` FROM `actor` WHERE `ActorID`='".$_SESSION['ActorID']."';";
    if ($ResultSqlForActor = mysqli_query($conn, $SqlForActor))  
    {
       while($RowForActor =mysqli_fetch_array($ResultSqlForActor))
     {
      $_SESSION['Name']=$RowForActor['Name'];
    echo"
    <form action='#' method='post' name ='' >
<p>
<span class='lab ' style='margin-left: 24%; font-size:25px;width: 90%; text-transform: Uppercase;' >".$_SESSION['Title']."</span>
</p>
<p>

    <span class ='pic'>  <img src='".$_SESSION['Pic']."' height='140px' width='140px' id='img'></span>         
</label>
</p>
<p>
<span class='lab ' style='margin-left: 19%; width: 90%;' >
<i class='far fa-clock'>&nbsp; &nbsp;&nbsp; &nbsp;</i>".$_SESSION['Time']." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<i class='far fa-calendar-alt'>&nbsp; &nbsp;&nbsp; &nbsp;</i> ".$_SESSION['Date']."
</span>
</p>

<p>
<span class='lab ' style='margin-left: 32%;' >".$_SESSION['Name']."</span>
</p>

<p>
<label for='Tickets'><span class='lab'>Number Of Tickets : </span></label>
<input type='number' id='Tickets' name='Tickets'min='1' max='".$_SESSION['AvailableTickets__']."'>
</p>

<p>
<label for='Tickets'><span class='lab'>Payment Method :</span></label>

<span style='display: inline-block;' class='paymentRadio'>
<input type='radio' id='cash' name='Payment' value='cash' >Cash
<input type='radio' id='card' name='Payment' value='card' >Card


</span>
</p>


</form>";
     }

  }
  else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
 
}
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
// <div class="Select-container">
//       <label> Select a Consort:</label>
//       <select id="Consort">

?>