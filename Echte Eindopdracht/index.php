<?php

require 'includes/functions.php';

  $rows = selectAll();
  if (isset($_GET['confirm'])) {
    if ($_GET['confirm'] == 'false'){
    var_dump($_GET['2id']);
    echo "<script>if(confirm('do you want to delete')){window.location.href = 'index.php?2id=". $_GET['2id']."&delete=true'}else {document.write('JA hoot');}</script>";
  }}
  if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 'true') {
      deletePlanning($_GET['2id']);
      echo "<script>alert('Je item is verwijdert');</script>";
      header('Location: GeplandeOverzicht.php');
    }
  }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include 'includes/header.php'; ?>
  <body>
    <div class="container">
      <a href="GeplandeOverzicht.php">terug</a>
      <h1>Game overzicht</h1>
      <!-- <a href="detail.php?">+ Spel in plannen</a> -->
      <?php
        foreach ($rows as $key) {
      ?>

      <a href="detail.php?id=<?php echo $key['id']; ?>">
      <div class="card game">
        <h2><?php echo $key['name']; ?></h2>
        <img class="col-12 image"src="afbeeldingen/<?php echo $key['image']; ?>" alt="afbeelding">
        <a href="#"></a>
        <!-- <a href="index.php?confirm=false&2id="><i class="fas fa-minus-circle"></i>Planning verwijderen</a> -->
      </div>
      </a>
    <?php } ?>
    </div>
  </body>
</html>
