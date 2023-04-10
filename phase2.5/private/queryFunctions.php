<?php
  function QueryAll($query, $sort) {
    global $db;
    $sql = "SELECT * FROM ".$query." ";
    $sql .= "ORDER BY ".$sort."";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    return $result;
  }
?>
