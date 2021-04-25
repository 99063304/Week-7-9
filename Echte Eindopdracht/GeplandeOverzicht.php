<?php
require 'includes/overzicht.php';
require 'includes/functions.php';
$rows = geplandeSpellen();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'update') {
      echo "<script>alert('Je hebt dit spel geupdate aan de planning');</script>";
    }
    elseif ($_GET['alert'] == 'toevoeg') {
      echo "<script>". "alert('Je hebt een spel toegevoegd aan de planning')"."</script>";
    }
  }
}

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

    <?php if(count($rows) != 10){ ?>
            <div id="plan"><a class="col-12 btn btn-primary" href="<?php echo 'index.php'; ?>">| inplannen</a></div>
    <?php } ?>
    <?php foreach ($rows as $key){ ?>
    <div class="card col-12">
    <?php $rows2 = selectOne($key['GameId']); ?>
      <h1><?php echo $rows2[0]['name']; ?></h1>
      <p>Tijd:<?php echo $key['tijd']; ?></p>
      <p>Duur:<?php echo $totaal = $rows2[0]['play_minutes'] + $rows2[0]['explain_minutes']; ?> Minutes</p>
      <p>Datum:<?php echo $key['datum']; ?></p>
      <p>Uitlegger: <?php echo $key['uitlegger']; ?></p>
      <a href="index.php?confirm=false&2id=<?php echo $key['GameId']; ?>"><i class="fas fa-minus-circle"></i>Planning verwijderen</a>
      <a href="detail.php?id=<?php echo $key['GameId']; ?>&update=true">| Bewerken</a>
    </div>
    <?php } ?>
    </div>

  </body>
</html>
