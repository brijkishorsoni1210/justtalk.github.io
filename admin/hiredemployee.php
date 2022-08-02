

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiredemployee</title>
    <link rel = "stylesheet" href = "../style.css">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<header>

<h2>Justtalk</h2>


<nav>

<a href="http://103.255.102.47/justtalk/admin/admin.php">Admin</a>

</nav>



<div class="sign-in-up">


    

</div>


</header>


<div class="container">

<?php













$db_name = "employee";
try {
   
    $client = new MongoClient("mongodb://localhost:38015");
 



    $collection = $client->$db_name->getGridFS();


  


    $result = $collection->find();

    $text = array();
    $i = 0;
    foreach($result as $item){
      $text[$i] = (array) $item;
      $i++;
      // print_r($text);
    }

   


    ?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">UserID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Country</th>
      <th scope="col">Mobile</th>
      <th scope = "col">Desigination</th>
      <th scope = "col">Resume</th>
    </tr>
  </thead>
 


<?php

    foreach ($text as $entry) {

   
     


        ?>


<tbody>
<tr>
<td><?php echo $entry['file']['_id'];  $id =  $entry['file']['_id']; ?></td>
<td><?php echo $entry['file']['name'] ?></td>
<td><?php echo $entry['file']['email'];  $name = $entry['file']['newname'] ;?></td>
<td><?php echo $entry['file']['country']; ?></td>
<td><?php echo $entry['file']['mobile']; ?></td>
<td><?php echo $entry['file']['desigination']; ?></td>
<td><button class = "btn btn-primary" ><a href = "/justtalk/admin/viewCV.php?ObjectId=<?php echo $id;?>"class = "text-light">ViewCV</a></button>


</tr>
  </tbody>
<?php

        
    }
    ?>

    </table>

   


<?php    
}
catch (Throwable $e) {
    // catch throwables when the connection is not a success
    echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
}


?> 
</div>
</body>
</html>



