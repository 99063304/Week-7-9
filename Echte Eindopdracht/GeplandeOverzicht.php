<?php
require 'includes/overzicht.php';
require 'includes/functions.php';
$rows = geplandeSpellen();
$rows2 = selectAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
    <?php include 'includes/header.php'; ?>
    <a href="index.php">| Bewerken</a>
    <?php foreach ($rows as $key){ ?>
    <div class="game">
      <h1><?php echo $key['']; ?></h1>
      <p>Tijd:<?php echo $key['tijd']; ?></p>
      <p>Duur:<?php echo $totaal = $key['play_minutes'] + $key['explain_minutes']; ?> Minutes</p>
      <p>Uitlegger: <?php echo $key['uitlegger']; ?></p>
      <a href="index.php?confirm=false&2id=<?php echo $key['id']; ?>"><i class="fas fa-minus-circle"></i>Planning verwijderen</a>
    </div>
    <?php } ?>
    </div>

  </body>
</html>
