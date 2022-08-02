<?php



if(isset($_GET['iusername'])|| isset($_GET['ipassword'])){

  $username = $_GET['iusername'];
  $password = $_GET['ipassword'];

  // echo $username;

  // echo "<br>";


  // echo $password;

  $m = new MongoClient("mongodb://localhost:38015");

  $db = $m->admin;

  $collection = $db->admincol;

  $item = $collection->findOne(array('username' => $username, 'password' => $password, 'isAdmin' => true));

  


}

else{


  echo "<h3>You are not an Admin!<h3><br>Redirecting...";
  header("Refresh:0.0; url=login.php");
 
  

}



?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel = "stylesheet" href = "../style.css">

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<header>

<h2>justtalk</h2>


<nav>

<a href="http://103.255.102.47/test/admin.php">Admin</a>
<a href="http://103.255.102.47/justtalk/user/register.php">REGISTER</a>
<a href="http://103.255.102.47/justtalk/admin/login.php">LOGIN</a>

</nav>



<div class="sign-in-up">



</div>


</header>

<div class="d-grid gap-2 col-6 mx-auto" >


<button class = "btn btn-secondary" ><a href ="/justtalk/admin/hiredemployee.php"class = "text-light">Hire New Employees</a></button>


<form action = "exportdata.php" method ="post">
<button type ="submit" name ="export_csv" class = "btn btn-success" >Export User Data to CSV</button>
</form>


<form enctype="multipart/form-data" action = "uploadCSV.php" method ="post">
<div class="form-group">
<label for="product_name">Upload CSV File</label>
<input type="file" class="form-control" id="upload_csv" name ="upload_csv">
<button type ="submit" name ="import_csv" class = "btn btn-primary mt-2 mb-2" >Import CSV Data</button>
</div>
</form>
</div>

<div class="container">

<?php


if(empty($item)){


  echo "<h3>You are not authorized User!<h3><br>Redirecting...";
  header("Refresh:0.0; url=login.php");


}else {


session_start();

$_SESSION['admin_username'] = $_GET['username'];

echo $_SESSION['admin_username'];



$db_name = "mydb";
try {
 
    $client = new MongoClient("mongodb://localhost:38015");
  

    $collection = $client->$db_name->mycol;

    $result = $collection->find();



    ?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">UserID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">UserName</th>
      <th scope="col">Password</th>
      <th scope = "col">Operations</th>
    </tr>
  </thead>
 


<?php

    foreach ($result as $entry) {


        ?>


<tbody>
<tr>
<td><?php echo $entry['_id'];   $id =  $entry['_id']; ?> </td>
<td><?php echo $entry['newname']; ?> </td>
<td><?php echo $entry['newemail'];  $name = $entry['newname']  ;?></td>
<td><?php echo $entry['newusername']; ?> </td>
<td><?php echo $entry['newpassword']; ?> </td>
<td> <button class = "btn btn-primary" ><a href = "/justtalk/admin/updateuser.php?ObjectId=<?php echo $id;?>"class = "text-light">Update</a></button>
<button class = "btn btn-danger"><a href = "/justtalk/admin/deleteuser.php?ObjectId=<?php echo $id;?>" class = "text-light">Delete</a></button></td>

</tr>
  </tbody>
<?php

        
    }
    ?>

    </table>

   

    


<?php    
}
catch (Throwable $e) {
   
    echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
}

}


?> 



</div>
</body>
</html>



