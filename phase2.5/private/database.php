<?php 
  require_once('db_credentials.php'); 

  function DB_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDbConnect();
    return $connection;
  }

  function DB_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirmDbConnect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }    
  }

  function confirmResultSet($resultSet) {
    if (!$resultSet) {
      exit ("database query failed");
    }
  }
?>
