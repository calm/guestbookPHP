<?php
require_once ("lib/_core/Model.php");
class GuestbookModel extends Model{
    private $conn;
    function __construct () {
      $this->conn = $this->dbconnect();
      //echo "model loaded";
    }

    function insert ($data) {
      //$this->conn

      $sql = "INSERT INTO entries_tbl (name, email, comments)
       VALUES ('".$data["name"]."', '".$data["email"]."', '".$data["comments"]."')";

      if ($this->conn->query($sql) === TRUE) {
          header("location: http://". $_SERVER['HTTP_HOST'] ."/guestbookPHP/");
      } else {
          echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $this->conn->error. "</div>";
      }

    //  $this->conn->close();
    }

        function delete ($id) {
          //$this->conn

          $sql = "DELETE FROM entries_tbl WHERE id = $id";
          if ($this->conn->query($sql) === TRUE) {
              header("location: http://". $_SERVER['HTTP_HOST'] ."/guestbookPHP/");
              //echo "<div class='alert alert-success'>Record deleted successfully<div/>";
          } else {
              echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $this->conn->error . "</div>";
          }

        //  $this->conn->close();
        }
    function getEntries () {
      $sql = "SELECT id, name, email, comments FROM entries_tbl";

      $rs = $this->conn->query($sql);

      return $rs;
    }


}
?>
