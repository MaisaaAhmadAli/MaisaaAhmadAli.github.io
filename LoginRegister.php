<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css">
    <title>Login</title>
    <?php
     include('connection.php');
     $conn=OpenCon();
    //  function  checkinfo()
    //  {

    //  $Id=$_POST['Email'];
    //  $pass=$_POST['password'];
    //  $sql ="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$Id."' AND `Password`=".$pass."";
    //  $conn=OpenCon();
    //  $result=mysqli_query($conn,$sql);
    //  if (mysqli_num_rows($result) == 1)
    //   {
    //      $row = mysqli_fetch_assoc($result);
    //       echo "Logged in!";
    //   }
    // }
     closeconn($conn);
    ?>
</head>
<body class="LoginRegisterPage">
    <div class="loginContainer">
        <h2> Consorts  </h2>
        <div class="loginBox">
            <form action = "authentication.php" method="POST">
            <br>
            <input  class="loginInputs" type="text" id="Email" name="Email" placeholder="ُE-maill address"><br><br>
            <input class="loginInputs" type="password" id="password" name="password" placeholder="Password"><br>

            <button  style="width:230px ;height: 39px;" >Log In</button>
            </form>

        </div>

    </div>
    
</body>
</html>