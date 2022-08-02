
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>carrer</title>
   <link rel="stylesheet" href="../style.css">
</head>

<body>

   <header>

      <h2>techno!</h2>


      <nav>

         <a href="http://103.255.102.47/test/admin.php">Admin</a>
         <a href="http://103.255.102.47/test/register.php">REGISTER</a>
         <a href="http://103.255.102.47/test/login.php">LOGIN</a>


      </nav>



      <div class="sign-in-up">







      </div>

   </header>

   <div class="popup-container" id="register-popup">

      <div class=" register popup">

         <form method="POST" enctype="multipart/form-data">

            <h2>
               <span>Get Hired!</span>
               <button type="reset">X</button>
            </h2>

            <input type="text" name="newname" placeholder="Enter Your  Name">
            <input type="email" name="newemail" placeholder="Enter Your  Email">
            <input type="text" name="newcountry" placeholder="Enter Your Country Name ">
            <input type="number" name="newmobile" placeholder="Enter Your Valid Mobile Number">
  



 <select name="newdesigination">
 <option value="" disabled selected>Choose desigination</option>   
  <option value="Software Engineer">Software Engineer</option>
  <option value="Hardware Engineer">Hardware Engineer</option>
  <option value="Digital Marketer">Digital Marketer</option>
  <option value="SalesForce Developer">Salesforce Developer</option>
  <option value="Network Engineer">Network Engineer</option>
  <option value="Data Analyst">Data Analyst</option>
  <option value="Backend Engineer">Backend Engineer</option>
  <option value="Quality A Engineer">Quality A Engineer</option>
  <option value="Designer">Designer</option>
  <option value="Frontend Engineer">Frontend Engineer</option>
</select>


<input type="file" name="newfile" >

<input type = "text" placeholder = <?php echo $result;    ?>>

<button type="submit" name="bregister" class="register-btn">Submit Details</button>
</form>
</div>
</div>

<?php





 $m = new MongoClient("mongodb://localhost:38015");
$gridfs = $m->selectDB('employee')->getGridFS();



$gridfs->storeUpload('newfile', array('name' => $_POST['newname'],'email' => $_POST['newemail'], 'country' => $_POST['newcountry'], 'mobile' => $_POST['newmobile'], 'desigination' => $_POST['newdesigination']));


echo "Data Inserted SuccessFully!";



?>




</body>

</html>