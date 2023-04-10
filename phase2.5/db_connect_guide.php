<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//test if connection sucedded 
if(mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$query = "SELECT * FROM subjects";
$resultSet = mysqli_query($connection, $query);

//test 
if (!$resultSet) {
  exit("database query failed");
}


// 3. Use returned data (if any)

// 4. Release returned data
mysqli_free_result($resultSet);

// 5. Close database connection
mysqli_close($connection);

?>
