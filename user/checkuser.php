<?php


if(isset($_GET['username'])|| isset($_GET['password'])){

    $username = $_GET['username'];

    $password = $_GET['password'];


    // echo "<h1>Good Afternoon! ".$username;



    $db_name = "mydb";



    $m = new  MongoClient("mongodb://localhost:38015");


    $collection = $m->$db_name->mycol;

 
    $item = $collection->findOne(array("newusername" => $username, "newpassword" => $password));

    // echo "You are login successfully!";


    session_start();

    $_SESSION['active_user'] = $username;
    $_SESSION['id']  =   $item['_id'];

    // echo $_SESSION['active_user'];


    header("Refresh:0.5; url = home.php");



    
    

}



?>



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>checkuser</title>
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <div class="container">




  <div class="badge bg-primary text-wrap" style="width: 20rem;">

  <?php


if(!$item){



    $NotReg = $_GET['username'];
 
         echo "<h3>".$NotReg. " OOPS! You are not Registered, Please Registered Yourself First <h3><br>Redirecting...";
         header("Refresh:2; url= register.php");
       
       
       
     }  
 



?>

</div>



  </div>

   
  </body>
</html>
