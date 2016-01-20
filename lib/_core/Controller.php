<?php
/*
  With this implementation Controller will instanciate the controller
  the controller instanciated will be the one required in the URL
  format: site/index.php/controller/method
  the params must come in POST
 */
class Controller
{

  function __construct() {

      $url_elements = explode('/', $_SERVER['PATH_INFO']);
      //the first url_element after index.php is controller name
      $controller = $url_elements[1];
      if ( (trim($controller) === "") or ( $controller == null ) or !isset($controller) ) {
        $controller = "guestbook";
      }

            //the second url_element after index.php is function name
            $method = $url_elements[2];

            //the third url_element after index.php is id
            $id = $url_elements[3];

      //here we include and instanciate the required controller
      $controller = strtolower($controller);
      $controller = $controller."Controller";
      include "lib/controller/".$controller.".php";

      $controller_obj = new $controller;

      if (method_exists($controller_obj, $method)) {

        $controller_obj->$method($id);
          
      } else {
        $controller_obj->show();
      }

  }

  function validateBasic($value) {

    //this function checks if the value exist, is not empty, and is not null
    if ( isset($value) and ( trim($value) !== "" ) and ( $value !== null ) ) {
      return true;
    } else {
      return false;
    }
  }
}
