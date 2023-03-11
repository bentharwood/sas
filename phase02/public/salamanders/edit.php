<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? '1'; 
$page_title = 'Salamanders';

if(is_post_request()) {
  $name = $_POST['name'] ?? '';

  echo "Salamander Name: " . $name . "<br>";
}

include(SHARED_PATH . '/salamander-header.php'); 


$id = $_GET['id'];
if(!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}


?>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a></p>
<h2>Edit Salamander</h2>

<form action="<?= url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Edit Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
