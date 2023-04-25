<?php 
  require_once('db_cred.php');

  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDbConnect();
    return $connection;
  }
  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }
  function confirmDbConnect() {
    if(mysqli_connect_errno()) {
      $msg =  "Database connection failed: ";
      $msg .=  mysqli_connect_error();
      $msg .=  " (" . mysqli_connect_error() . ") ";
    }
  }
  function confirmResultSet($resultSet) {
    if (!$resultSet) {
      exit ("Database query failed");
    }
  }
?>
