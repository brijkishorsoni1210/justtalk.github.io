<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>

   <header>

      <h2>User Registration</h2>


      


      <div class="sign-in-up">

      </div>

   </header>

   <div class="popup-container" id="register-popup">

      <div class=" register popup">

         <form method="POST">

            <h2>
               <span>User Register</span>
               <button type="reset">X</button>
            </h2>

            <input type="text" name="iname" placeholder="Enter Your Name">
            <input type="text" name="iemail" placeholder="Enter Your Email">
            <input type="text" name="iusername" placeholder="Enter Your UserName">
            <input type="password" name="ipassword" placeholder="Enter Strong PassWord">

            <button type="submit" name="bregister" class="register-btn">Register</button>

         </form>

      </div>

   </div>

   <?php

if(isset($_POST['bregister'])){


    $name = $_POST['iname'];


    $email = $_POST['iemail'];

    $username = $_POST['iusername'];

    $password = $_POST['ipassword'];

   $m = new MongoClient("mongodb://localhost:38015");

    

   $db = $m->mydb;

   $collection = $db->mycol;

   $document = array( 
      "newname" => $name, 
      "newemail" =>$email, 
      "newusername" =>$username,
      "newpassword" => $password,
      
   );
    
   $collection->insert($document);

   
   // echo " You are registered Successfully!  ";


   header("Refresh:0.0; url = userlogin.php ");



}



?>


</body>

</html>