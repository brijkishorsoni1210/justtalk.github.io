
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserLogin</title>
    <link rel = "stylesheet" href = "../style.css">
</head>
<body>

<header>

<h2>User Login</h2>




<div class="sign-in-up">



</div>

</header>

<div class="popup-container" id = "login-popup">

<div class="popup">

<form method = "get" action = "/justtalk/user/checkuser.php">

<h2>
    <span>User Login</span>
    <button type="reset">X</button>
</h2>

<input type = "text" placeholder= "Enter Your Valid UserName" name = "username">
<input type = "password" placeholder = "Enter Your Valid PassWord" name = "password">

<button type =  "submit" class = "login-btn" name = "ilogin">Login</button>

</form>

</div>

</div>


</body>
</html>

