<?php

// import data from csv to array

if(isset($_POST['import_csv'])){

    $file_name = $_FILES['upload_csv']['name'];
    $file_temp = $_FILES['upload_csv']['tmp_name'];
  // print_r($_FILES['upload_csv']);
  // echo $file_name;
    // $file_location = $file_temp."/".$file_name;
    // echo $file_location;

    // echo $file_name;
    

    $m = new mongoClient("mongodb://localhost:38015");

    $collection = $m->csv->details;

    // $collection = $db->details;
    

    $open = fopen($file_temp, "r");
  

    if($open){
      while (($data = fgetcsv($open, 1000, ",")) !== false) {        

          //  print_r($data);
          $filesarray[]= $data;
          $collection->insert(array('name' => $data[0], 'email' => $data[1], 'class' => $data[2], 'dob' => $data[3]));

          
      }
    }else{
      echo "not open";
    }
    fclose($open);
    echo "<pre>";
    // var_dump($filesarray);
    echo "</pre>";

   

}




?>








<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  </head>
  <body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php

if($open){

  echo '<div class="alert alert-primary" role="alert">
Data Imported SuccessFully!
</div>';

header("Refresh:0.5; url = admin.php");


}

?>



    

  </body>
</html>