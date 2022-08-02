<?php

session_start();



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
    <title>blogspot</title>
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
<a href="/justtalk/user/profile.php"><?php session_start();  echo $_SESSION['active_user']; ?></a>
<a href = "/justtalk/blog/blogpost.php">Blog</a>
<a href="/justtalk/user/userlogout.php">Logout</a>

</nav>
</header>

<div class="container">

<form method = "post" action = "/justtalk/blog/checkblog.php" enctype = "multipart/form-data">
  <div class="form-row">

  <div class="form-group col-md-12">
      <label for="file">Attach a photo</label>
      <input type="file"  name = "newfile" class="form-control" id="inputEmail4">
    </div>

    <div class="form-group col-md-12">
      <label for="blogtitle">Title</label>
      <input type="newtext" class="form-control"  name = "newtitle" id="inputEmail4" placeholder="Blog Title">
    </div>


    <div class="form-group col-md-12">
      <label for="blogtitle">Category</label>
      <input type="text" name = "newcategory"  class="form-control" id="inputEmail4" placeholder="Category">
    </div>

    <div class="form-group col-md-12">
      <label for="blogtitle">Desecription</label>

      <textarea name = "newdescription" class="form-control" style=" min-width:500px; max-width:100%;min-height:50px;height:100%;width:100%;" placeholder = "write Your Story...." ></textarea>


    </div>
  <div class="form-group col-md-12 mt-5"> 
  <button type="submit"  name = "submit" class="btn btn-secondary btn-lg btn-block">Post</button>
</form>
</div>
</div>
</body>
</html>




