<?php
require_once ("lib/_core/View.php");
class GuestbookView extends View{
    protected $content;
    protected $header;
    protected $footer;
    protected $entries;
    function __construct () {
      $csssandjs = "<link rel='stylesheet' href='/guestbookPHP/bootstrap-3.3.6-dist/css/bootstrap.min.css'>
                    <link rel='stylesheet' href='/guestbookPHP/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css'>
                    <script src='/guestbookPHP/bootstrap-3.3.6-dist/js/bootstrap.min.js'></script>";

      $this->header = "<html><head>$csssandjs<title>Guestbook Assignment</title></head><body>";
      $formstr = "<form class='form' action='/guestbookPHP/index.php/guestbook/insert/' method='post'>
                    <table class='table'>
                    <tr><td>
                          <label for='name'>Name:</label>
                          <input type='text' name='name' value='' required>
                    </td></tr>
                    <tr><td>
                          <label for='email'>Email:</label>
                          <input type='text' name='email' value='' required>
                    </td></tr>
                    <tr><td>
                          <label for='comments'>Comments:</label>
                          <textarea name='comments' rows='8' cols='40' required></textarea>
                    </td></tr>
                    <tr><td>
                          <input class='btn btn-primary' type='submit' value='Add'>
                    </td></tr>
                    </table>
                  </form>";
      $this->content = $formstr;


      $this->footer = "</body></html>";
    }

    public function render () {

      if ( $this->entries != "" ){
        $tableResults = "<table class='table'>";
        while ($row = $this->entries->fetch_assoc()) {
                $tableResults .= "<tr><td>".$row["name"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td>".$row["comments"]."</td>
                                  <td><a class='btn alert-danger' href='/guestbookPHP/index.php/guestbook/delete/".$row["id"]."'>DEL</a></td></tr>";
            }
        $tableResults .= "</table>";
      } else {
        $tableResults = "<div class='alert alert-warning'>No results loaded</div>";
      }
      $this->content .= $tableResults;

      echo $this->header;
      echo $this->content;
      echo $this->footer;
    }

    public function entries ($data) {
      $this->entries = $data;
    }
}
