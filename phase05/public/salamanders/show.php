<?php require_once('../../private/initialize.php'); 

$id = $_GET['id'] ?? '1'; 

$sql = "SELECT * FROM salamander ";
$sql .= "WHERE id='" . $id."'";
$result = mysqli_query($db, $sql);
$salamanderAssoc = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$page_title = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php'); 

?>

<h2>Salamander Details</h2>
<p> ID: <?= h($salamanderAssoc['id']); ?></p>
<p>Name: <?= h($salamanderAssoc['name']); ?></p>
<p>Habitat: <?= h($salamanderAssoc['habitat']); ?></p>
<p>Description: <?= h($salamanderAssoc['description']); ?></p>
<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
