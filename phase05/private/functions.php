<?php

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function error_404() {
  header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found' );
  exit();
}

function error_500() {
  header($_SERVER['SERVER_PROTOCOL'] . "500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  header("Location: " . $location);
  exit();
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function displayErrors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\" style=\"width:300px;border:#f00 2px solid;font-weight: bold;color:#f00;margin:0 auto;\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

?>
