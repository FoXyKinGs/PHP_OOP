<?php

class Config{
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $db_name = 'db_toko';

  public function connect(){
    $mysqli = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    if($mysqli->connect_error){
      echo "Connection Failed : (".$mysqli->connect_error.")";
    }

    return $mysqli;
  }
}

?>