<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userlogout</title>
</head>
<body>

<?php


//Start the session 
session_start();
 

 
// Destroying session
session_destroy();
header("Refresh:0.5;url = userlogin.php");





?>
    
</body>
</html>