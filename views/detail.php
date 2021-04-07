<?php

include_once('../handlers/handler.php');
$data = new Handler();

$id;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$detailData = $data->detail($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center align-items-center mt-5">
      <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
    <div class="d-flex justify-content-center align-items-center">
      <div class="card mt-5">
        <div class="card-body">
          <p>Name : <?= $detailData['name']?></p>
          <p>Description : <?= $detailData['description']?></p>
          <p>Price : <?= $detailData['price']?></p>
          <p>Stock : <?= $detailData['stock']?></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>