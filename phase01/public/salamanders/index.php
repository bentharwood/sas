<!-- require initialize.php -->
<?php require_once('../../private/initialize.php'); ?>


<!-- 
  Write a salamanders array with the following
id=1, salamanderName = Red-Legged Salamander
id=2, salamanderName = Pigeon Mountain Salamander
id=3', salamanderName = ZigZag Salamander
id=4,  salamanderName= Slimy Salamander 
-->

<?php
  $salamanders = [
    ['id' => '1',  'salamanderName' => 'Red-Legged Salamander'],
    ['id' => '2',  'salamanderName' => 'Pigeon Mountain Salamander'],
    ['id' => '3',  'salamanderName' => 'ZigZag Salamander'],
    ['id' => '4',  'salamanderName' => 'Slimy Salamander'],
  ];
  
?>

<?php 

// Add the pageTitle
$pageTitle = 'salamanders';
// Include a shared path to the salamander header
include(SHARED_PATH . '/salamander-header.php');
?>

<h1>Salamanders</h1>

  <a href="#">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php foreach($salamanders as $salamander) { ?>
        <tr>
          <td><?= h($salamander['id']); ?></td>
    	    <td><?= h($salamander['salamanderName']); ?></td>
          <!-- Use url_for with show.php AND h(u) with the salamander['id'] -->
          <td><a href="<?= urlFor('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a href="<?= urlFor('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a href="#">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php include(SHARED_PATH . '/salamander-footer.php'); ?>
