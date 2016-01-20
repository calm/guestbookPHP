<?php
require_once ("lib/_core/Controller.php");
require ("lib/model/guestbookModel.php");
require ("lib/view/guestbookView.php");
class GuestbookController extends Controller {
    private $guestbookModel;
    function __construct()
    {
      # loading guestbook
      $this->guestbookModel = new GuestbookModel();

    }

    function show () {
            $entries = $this->guestbookModel->getEntries();

            $this->guestbookView = new GuestbookView();

            $this->guestbookView->entries( $entries );
            $this->guestbookView->render();
    }

    function insert() {
      if ( $this->validateBasic($_POST["name"]) and $this->validateBasic($_POST["email"]) and $this->validateBasic($_POST["comments"]) ) {
          $this->guestbookModel->insert($_POST);
        }
      else {
          echo "<div class='alert alert-danger'>all fields are required</div>";
      }


    }

    function delete($id) {
      if ( $this->validateBasic($id) ) {
          $this->guestbookModel->delete($id);
        }
      else {
          echo "<div class='alert alert-danger'>Nothing to delete</div>";
      }

    }


}
