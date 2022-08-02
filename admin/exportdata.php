
<?php


$db_name = "mydb";

$client = new MongoClient("mongodb://localhost:38015");
  
$collection = $client->csv->details;

 $result = $collection->find();

//  echo "<pre>";

 $arr = iterator_to_array($result);

//  print_r($arr);die;




$keys = array_keys($arr);



$current_time = date("d-M-Y h:i:s a");
$file_name = "datauser_".$current_time.".csv";

$output = fopen("/var/www/html/justtalk/".$file_name, "w");


$header = array_keys($arr[$keys[0]]);




fputcsv($output,$header);

 foreach($arr as $item){

 $suc= fputcsv($output, $item);



 }

 fclose($output);

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

<a href="http://103.255.102.47/justtalk/admin/admin.php">Admin</a>
<a href="http://103.255.102.47/justtalk/user/register.php">REGISTER</a>
<a href="http://103.255.102.47/justtalk/admin/login.php">LOGIN</a>

</nav>
</header>

<?php

if($suc){

    echo '<div class="alert alert-success" role="alert">
    Successfully exported to csv!
  </div>';

//   header("Refresh:0.5;url = admin.php");


}else{

    echo '<div class="alert alert-danger" role="alert">
    something went wrong!
  </div>';




}

?>


</body>
</html>










