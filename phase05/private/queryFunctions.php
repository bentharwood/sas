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
  function insertSalamanders($salamanders) {
    global $db;

    $errors = validateSalamanders($salamanders);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" .$salamanders['name']. "', ";
    $sql .= "'" .$salamanders['habitat']. "', ";
    $sql .= "'" .$salamanders['description']. "')";
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

  function updateSalamanders($salamanders) {
    global $db;

    $errors = validateSalamanders($salamanders);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" .$salamanders['name']. "', ";
    $sql .= "habitat='" .$salamanders['habitat']. "', ";
    $sql .= "description='" .$salamanders['description']. "' ";
    $sql .= "WHERE id='" .$salamanders['id']. "' ";
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

  function DeleteSalamander($id) {
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

  function validateSalamanders($salamanders) {
    $errors = [];

    if(isBlank($salamanders['name'])) {
      $errors[] = "Name Cannot Be Blank.";
    }
    if(isBlank($salamanders['habitat'])) {
      $errors[] = "habitat Cannot Be Blank.";
    }
    if(isBlank($salamanders['description'])) {
      $errors[] = "description Cannot Be Blank.";
    }
    return $errors;
  }


  
?>

