<?php

class Handler{

  function getData(){
    include_once "../configs/config.php";
    $db = new Config();

    $mysqli = $db->connect();
    $result = [];

    $get = $mysqli->query("SELECT * FROM tbl_products");
    while ($data = $get->fetch_assoc()) {
      array_push($result, $data);
    }
    return $result;
  }

  function insertData(){
    include_once "../configs/config.php";
    $db = new Config();

    $conn = $db->connect();

    if (isset($_POST['submit_insert'])) {
      $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock']
      ];

      $name = $conn->real_escape_string($data['name']);
      $description = $conn->real_escape_string($data['description']);
      $price = $conn->real_escape_string($data['price']);
      $stock = $conn->real_escape_string($data['stock']);

      $insert = $conn->query("INSERT INTO tbl_products (name, description, price, stock) VALUE ('$name','$description','$price','$stock')");
      if(!$insert){
        echo "<script>alert('Insert failed');window.location='../views'</script>";
        die();
      }
      echo "<script>alert('Data added');window.location='../views'</script>";
    }
  }

  function deleteData(){
    include_once "../configs/config.php";
    $db = new Config();

    $conn = $db->connect();

    if(isset($_GET['id_delete'])){
      $id = $_GET['id_delete'];
      $delete = $conn->query("DELETE FROM tbl_products WHERE id='$id'");
      if(!$delete){
        echo "<script>alert('Delete failed');window.location='../views'</script>";
        die();
      }
      echo "<script>alert('Deleted');window.location='../views'</script>";
    }
  }

  function detail($id){
    include_once "../configs/config.php";
    $db = new Config();

    $conn = $db->connect();

    $detail = $conn->query("SELECT * FROM tbl_products WHERE id='$id'");
    return $detail->fetch_assoc();
  }

  function updateData($data, $id){
    include_once "../configs/config.php";
    $db = new Config();

    $conn = $db->connect();

    $name = $conn->real_escape_string($data['name']);
    $description = $conn->real_escape_string($data['description']);
    $price = $conn->real_escape_string($data['price']);
    $stock = $conn->real_escape_string($data['stock']);

    $update = $conn->query("UPDATE tbl_products SET name='$name', description='$description', price='$price', stock='$stock' WHERE id='$id'");

    if(!$update){
      echo "<script>alert('Update failed');window.location='../views'</script>";
      die();
    }
    echo '
        <div class="d-flex justify-content-center"><h3>Update Data Success</h3></div>
        <div class="d-flex justify-content-center"><a href="../views/index.php" class="btn btn-secondary">Back</a></div>
       ';
  }
}

?>