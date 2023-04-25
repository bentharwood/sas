<?php

  function findAllSalamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    return $result;
  }
  function findByid($id) {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id='" . $id."'";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
  }
  function insertSubject($name,$habitat,$description) {
    global $db;
    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" .$name. "', ";
    $sql .= "'" .$habitat. "', ";
    $sql .= "'" .$description. "')";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    }
    else {
      echo mysqli_error($db);
      db_disconnect($db);
      die;
    }
  }

  function updateSubject($subject) {
    global $db;

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" .$subject['name']. "', ";
    $sql .= "habitat='" .$subject['habitat']. "', ";
    $sql .= "description='" .$subject['description']. "' ";
    $sql .= "WHERE id='" .$subject['id']. "' ";
    $sql .= "LIMIT 1";
  
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    }
    else {
      echo mysqli_error($db);
      db_disconnect($db);
      die;
    }
  
  }

  function DeleteSubject($id) {
    global $db;
    $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id='" . $id. "'";
    $sql .= "LIMIT 1";
  
    $result = mysqli_query($db, $sql);
  
    if($result) {
      return true;
    }
    else {
      echo mysqli_error($db);
      db_disconnect($db);
      die;
    }
  }
  
?>

