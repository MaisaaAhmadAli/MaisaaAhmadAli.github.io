<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css" media="all" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View conserts</title>
    <script>
      // function Logout()
      // {
      //    <?php
      //    include_once("Logout.php");
      //    ?>
      // }
      </script>
      <style>

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
  margin-left: 33%;
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
.container select,.container input[type=number] {
	min-height: 25px;
	display: inline-block;
	width: 51%;
   font-size: 15px;
}
/* 
 {
  max-height: 22px;
	display: inline-block;
width: 51%;
   font-size: 15px;
} */

.right{
  text-align: right;
}

body{
  background: linear-gradient(#e66465, #9198e5);
    background-attachment: fixed;
    color: white;
    font-size:2em;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}
span.lab
{

	display: inline-block;
  /* min-height: 25px; */
	/* width: 30%; */
  font-size: 15px;
  margin-top: 5px;
}
.pic 
{
  margin-left: 26%;

}

        </style>
</head>
<body class="LoginRegisterPage">
   
<div class="sidenav">
  <a href="homepage.php" class="focused"><i class="fa-solid fa-house"></i> Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card"></i> My profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user"></i> My account </a>

  <a href="Mytickets.php"><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


</body>
</html>