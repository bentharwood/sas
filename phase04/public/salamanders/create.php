<?php require_once('../../private/initialize.php');

  if(is_post_request()) {
    $name = $_POST['name'];
    $habitat = $_POST['habitat'];
    $description = $_POST['description'];

    $result = insertSubject($name,$habitat,$description);
      $newId = mysqli_insert_id($db);
      redirect_to(url_for('salamanders/show.php?id=' . $newId));
    
  }
  else {
    redirect_to(url_for('/salamanders/new.php'));
  }

?> 
