<?php





if(!isset($_GET['ObjectId'])){
    echo "<h3>You are not authorized User!<h3><br>Redirecting...";
    header("Refresh:1; url=login.php");
}


if(isset($_GET['ObjectId'])){

    $prev_id = $_GET['ObjectId'];




     // for connection...
     $m = new MongoClient('mongodb://localhost:38015');
    
     // choose database
     $db = $m->employee;
 
     // choose gridfs collection, .e.g. - fs.files --->>> For choose the fs.files from employee Database!
     $gridfs = $db->getGridFS();



      // converting string  id into object Id... for searching the exact result!
    $obj = new MongoId($prev_id);



    $user = $gridfs->findOne(["_id" => $obj]);

    // 
    ob_end_clean();

    // set header as image type... 
    header('Content-Type: image/jpg');
    
    // display the image...
    $image = $user->getBytes();


    echo $image;





}






?>










<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>viewCv</title>
  </head>
  <body>
  <div class="container">

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<div class="text-center">
  <img src="" class="rounded">
</div>


</div>



  </body>
</html>