
<?php






if(!isset($_GET['ObjectId'])){

    echo "You are not authorized user";
    
    header("Refresh:0.0; url= login.php");


}

if(isset($_GET['ObjectId'])){
    // $id = $_GET['ObjectId'];
    $prev_id = $_GET['ObjectId'];

    $obj = new MongoId($prev_id);

    if(isset($_POST['bregister'])){


        $name = $_POST['iname'];


        $email = $_POST['iemail'];
    
        $username = $_POST['iusername'];
    
        $password = $_POST['ipassword'];

        // echo $prev_name;





        $m = new MongoClient("mongodb://localhost:38015");
//    echo "Connection to database successfully";
	
   // select a database
   $db = $m->mydb;
//    echo "Database mydb selected";
   $collection = $db->mycol;
//    echo "Collection selected succsessfully";
//    now update the document
   $collection->update(["_id"=>$obj], ['$set'=> ["newname"=>$name, "newemail" => $email, "newusername" => $username, "newpassword" => $password]]);
   $answer = "Updated ";
//    echo $name;

    

}


   
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateUser</title>
    <link rel = "stylesheet" href = "../style.css">
</head>
<body>



<header>

<h2>Justtalk</h2>






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
    <span>Update User</span>
    <button type="reset">X</button>
</h2>


<input type = "text" placeholder = <?php echo $prev_name;?>>
<input type = "text"  name = "iname"placeholder= "Enter Your New Name" >
<input type = "text" name = "iemail" placeholder= "Enter Your New Email" >
<input type = "text" name = "iusername" placeholder= "Enter Your New UserName" >
<input type = "password" name = "ipassword" placeholder = "Enter Your  New Strong PassWord">
<input type = "text" placeholder = "<?php echo  $answer; ?>">
<button type =  "submit" name = "bregister" class = "register-btn">Update User</button>


</form>


</div>


</div>


</body>
</html>

