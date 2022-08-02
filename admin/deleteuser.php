
<?php




if(!isset($_GET['ObjectId'])){
    echo "<h3>You are not authorized User!<h3>";
    header("Refresh:0.0; url=login.php");
}


if(isset($_GET['ObjectId'])){
    // $id = $_GET['ObjectId'];
    $prev_Id = $_GET['ObjectId'];

    $obj = new MongoId($prev_Id);

    if(isset($_POST['bregister'])){


        // $name = $_POST['iname'];


        // $email = $_POST['iemail'];
    
        // $username = $_POST['iusername'];
    
        // $password = $_POST['ipassword'];

        // echo $prev_name;





$m = new MongoClient("mongodb://localhost:38015");
//    echo "Connection to database successfully";
	
  
 // select a database
 $db = $m->mydb;
//  echo "Database mydb selected";
 $collection = $db->mycol;
//  echo "Collection selected succsessfully";
 
 // now remove the document
 $collection->remove(array("_id"=>$obj));
 
 $answer = "Deleted!";
 

    

}


   
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel = "stylesheet" href = "../style.css">
</head>
<body>



<header>

<h2>Justtalk </h2>


<nav>



<a href="/justtalk/admin/admin.php">Admin</a>



</nav>



<div class="sign-in-up">



    

</div>

</header>

<div class="popup-container" id = "register-popup">

<div class=" register popup">

<form  method = "POST" >

<h2>
    <span>Delete User</span>
    <button type="reset">X</button>
</h2>



<input type = "text" placeholder = <?php echo $prev_name;?>>
<input type = "text" placeholder = <?php echo  $answer; ?>>
<button type =  "submit" name = "bregister" class = "register-btn">Delete User</button>


</form>


</div>


</div>


</body>
</html>

