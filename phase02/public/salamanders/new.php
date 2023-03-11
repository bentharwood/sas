<?php require_once('../../private/initialize.php');

$page_title = 'Salamander';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a></p>
<h2>Create Salamander</h2>

<form action="<?= url_for('/salamanders/create.php'); ?>" method="post">
  <label for="create_name">
    <input type="text" id="create_name" name="create_name"><br>
    <input type="submit" value="Create Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
