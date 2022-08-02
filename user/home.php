<?php

session_start();

// echo $_SESSION['active_user']; 

// $username = $_GET['newusername'];





if(!$_SESSION['active_user']){


  echo "<h3> OOPS! Please Login First <h3><br>Redirecting...";
  header("Refresh:0.0; url= userlogin.php");
        
 }  
  



?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../style.css">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  

<header>

<h2>JustTalk!</h2>





<nav>


<a href = "/justtalk/user/home.php">Home</a>
<a href="/justtalk/user/profile.php"><?php  echo $_SESSION['active_user']; ?></a>
<a href = "/justtalk/blog/blogpost.php">Blog</a>
<a href="/justtalk/user/userlogout.php">Logout</a>

</nav>


</header>



<div class="container">

<div class="card" style="width: 18rem;">
  <img src="https://images.pexels.com/photos/11035390/pexels-photo-11035390.jpeg?cs=srgb&dl=pexels-realtoughcandycom-%28rtc%29-11035390.jpg&fm=jpg" class="card-img-top" alt="...">


  <div class="card-body">

<h5 class="card-title">Something About Php</h5>
<p class="card-text">Php is an server side scripting Language, and loosely type Language</p>


</div>



<div class="card-footer">
  

<p class="card-text d-inline"><?php  echo date('d F, Y (l)');  ?><small></small><span class="font-weight-bolder"><span></p>
<a class = "btn btn-primary btn-sm btn-block" href="#">Readmore</a>




</div>

   
  </div>
</div>




</body>
</html>




