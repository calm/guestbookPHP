<?php
/**
 * this class is the main class for models,
 * in this class we can declare variables needed for all models
 * like database conection or type of response.
 */
class Model
{
  private $conn = "";

  function dbconnect() {
  $servername = "localhost";
  $username = "guestbook_user";
  $password = "123";
  $dbname   = "guestbook_db";
  // Create connection
  $this->conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($this->conn->connect_error) {
      die("<div class='alert alert-danger'>Connection failed: " . $this->conn->connect_error ."</div>");
  }
  //echo "<div class='alert alert-success'>Connected successfully</div>";

    return $this->conn;
  }
}
 ?>
