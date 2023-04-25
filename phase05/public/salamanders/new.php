<?php require_once('../../private/initialize.php');

if(is_post_request()) {
  $salamanders = [];
  $salamanders['name'] = $_POST['name'] ?? '';
  $salamanders['habitat'] = $_POST['habitat'] ?? '';
  $salamanders['description'] = $_POST['description'] ?? '';

  $result = insertSalamanders($salamanders);
  if($result === true) {
    $newId = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $newId));  
    }
   else {
    $errors = $result;
   }   
  
}
else {

}


$page_title = 'Salamander';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a></p>
<h2>Create Salamander</h2>

<div id="form-container">
<?php echo displayErrors($errors); ?>
  <form action="<?= url_for('/salamanders/new.php'); ?>" method="post">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"  minlength="1" maxlength="255"><br>

      <label for="habitat">habitat</label><br>
      <textarea name="habitat" id="habitat" cols="50" rows="4"  minlength="1"></textarea><br>

      <label for="description">description</label><br>
      <textarea name="description" id="description" cols="50" rows="4"  minlength="1"></textarea><br>
      <input type="submit" value="Create Salamander">
  </form>
</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
