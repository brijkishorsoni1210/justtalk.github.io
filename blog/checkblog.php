<?php


//Start the session and checking the authenticate user....
session_start();

if(!$_SESSION['active_user']){


  echo "<h3> OOPS! Please Login First <h3><br>Redirecting...";
  header("Refresh:0.0; url= userlogin.php"); 

 }else{

   if(isset($_POST['submit'])){


      $file = $_FILES['newfile'];

      // print_r($file);


      $file_name = $_FILES['newfile']['name'];

      $file_type = $_FILES['newfile']['type'];

      $file_size = $_FILES['newfile']['size'];

      $file_temp_loc = $_FILES['newfile']['tmp_name'];


      $title = $_POST['newtitle'];

      $category = $_POST['newcategory'];


      $description = $_POST['newdescription'];


      
     // For Making a folder and saving the selected Files
      $folder_name = "/var/www/html/rows/123/";
      $file_full_path = $folder_name.$file_name;

      if(!file_exists($folder_name)) {
         // echo "not exists ";
         $oldmask = umask(0);
         mkdir($folder_name, 0777);
         umask($oldmask); 
      } else {
         // echo " exists ";
      }

      
     move_uploaded_file($file_temp_loc, $file_full_path);

     echo json_encode("OK");

    

   }


 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkblog</title>
   <link rel="stylesheet" href="../style.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


   <header>

      <h2>JustTalk</h2>


      <nav>


      </nav>
   </header>

<?php


//Connecting to the Database


 $m = new MongoClient("mongodb://localhost:38015");

 $db = $m->mydb;

 $collection = $db->blogs;



 $date = date('d-m-y h:i:s');



 $document = array(

   'filename' => $file_name,
   'title' => $title,
   'category' => $category,
   'description' => $description,
   'createdAt' => $date,

 );

 $item=$collection->insert($document);

//  echo "Document Uploaded SuccessFully!";



?>

<div class="alert alert-success" role="alert">

<?php

if($item){

    echo "You Post is uploaded!";
}

 header("Refresh:1; url = ../user/home.php");


?>

</div>

</body>

</html>




