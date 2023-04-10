<?php 
require_once('../../private/initialize.php');
$id = $_GET['id'];
$page_title = 'Delete ' . $subject['name'];
include(SHARED_PATH . '/salamander-header.php');
if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}


if (is_post_request()) {
  DeleteSubject($id);
  redirect_to(url_for('/salamanders/index.php'));
}
else {
  $subject = findByid($id);
}

?>

  <a href="<?php echo url_for('/salamanders/index.php') ?>" class="backlink">&laquo; back to list</a>
  <h1>Delete salamander</h1>
  <p>are you sure you want to delete this salamander?</p>
  <p><?php echo h($subject['name']); ?></p>

  <form action="<?php echo url_for('/salamanders/delete.php?id=' .h(u($subject['id']))); ?>" method="post">
  <input type="submit" name="commit" value="Delete subject"></form>
<?php include(SHARED_PATH . '/salamander-footer.php') ?>



