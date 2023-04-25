<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? '1'; 
$page_title = 'Salamanders';

if(is_post_request()) {
  $salamanders = [];
  $salamanders['id'] = $id;
  $salamanders['name'] = $_POST['name'] ?? '';
  $salamanders['habitat'] = $_POST['habitat'] ?? '';
  $salamanders['description'] = $_POST['description'] ?? '';

  $result = updateSalamanders($salamanders);
  if($result === true) {
   redirect_to(url_for('/salamanders/show.php?id=' . $salamanders['id']));
  }
  else {
    $errors =$result;
  }
}
else {
  $salamanders = findByid($id);
}

include(SHARED_PATH . '/salamander-header.php'); 


if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}


?>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a></p>
<h2>Edit Salamander</h2>

<div id="form-container">
  <?php echo displayErrors($errors); ?>
  <form action="<?php echo url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"  minlength="1" maxlength="255" value="<?php echo h($salamanders['name']) ?>"><br>

      <label for="habitat">habitat</label><br>
      <textarea name="habitat" id="habitat" cols="50" rows="4"  minlength="1"><?php echo h($salamanders['habitat']) ?></textarea><br>

      <label for="description">description</label><br>
      <textarea name="description" id="description" cols="50" rows="4"  minlength="1"><?php echo h($salamanders['description']) ?></textarea><br>
      <input type="submit" value="Edit Salamander">
  </form>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
