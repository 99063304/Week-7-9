<?php
require 'includes/overzicht.php';
require 'includes/functions.php';

$rows = selectOne($_GET['id']);
$rows3 = geplandeSpel($_GET['id']);
$rowsSpelers = slectSpelers($_GET['id']);
$newSpelers = explode(", ",$rowsSpelers['spelers']);
$selectTijd = selectTime();

$kaas = [];

var_dump($selectTijd);
foreach ($selectTijd as $key) {
    echo $key['tijd'].'  .';
}
include 'includes/validate.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eindopdracht</title>
  </head>
  <body>
      <?php
     include 'includes/header.php';
     // var_dump($rows['max_players']);
     foreach ($rows as $key){
       ?>
      <div class="detail container">
        <h2><?php echo $key['name']; ?></h2>
        <img class="afbeelding" src="afbeeldingen/<?php echo $key['image']; ?>" alt="afbeelding"><div class="card col-6"><?php echo $key['youtube']; ?></div>
        <p>Tijd:<?php echo $rows3['tijd']; ?></p>
        <p>Beschrijving:<?php echo $key['description']; ?> Minutes</p>
        <p>Uitlegger:<?php echo $rows3['uitlegger']; ?></p>
        <p>Minimale Spelers: <?php echo $key['min_players']; ?></p>
        <p>Maximale Spelers: <?php echo $key['max_players']; ?></p>
        <h3>Spelers Lijst:</h3>
        <ul>
        <?php foreach ($newSpelers as $key){ ?>
          <li><?php echo $key ?></li>
        <?php } ?>
        </ul>
      </div>
    <?php } ?>
    <?php if (isset($_GET['update'])){?>
      <?php if ($_GET['update'] === 'true'){ ?>
              <form class="container" action="detail.php?id=<?php echo $_GET['id']; ?>&update=true&delete=true" method="post">
              <div class="input">
                <label for="starttijd">Datum:</label>
                <input type="date" name="datum" value="<?php echo $rows3['datum']; ?>"><p>*<?php echo $nameErr2; ?></p>
              </div>
              <div class="input">
                <label for="tijd">Tijd:</label>
                <input type="time" name="tijd" value="<?php echo $rows3['tijd']; ?>"><p>*<?php echo $nameErr4 ?></p>
              </div>
              <div class="input">
                <label for="uitlegger">Uitlegger:</label>
                <input type="text" name="uitlegger" value="<?php echo $rows3['uitlegger']; ?>"><p>*<?php echo $nameErr1 ?></p>
              </div>
              <div class="input">
                <label for="spelers"></label>
                <input type="text" name="spelers" value="<?php echo $rows3['spelers']; ?>"placeholder="Vul hier uw spelers in"><p>*<?php echo $nameErr ?></p>
              </div>
                <a href="detail.php?id<?php echo $_GET['id']?>&update=true&delete=true"><i class="fas fa-minus-circle">Spelers Verwijderen</a>
                <button type="submit" name="" value="">Updaten</button>
              </form>

    <?php }}else{ ?>
      <?php echo 'else'; ?>
            <form class="container" action="detail.php?id=<?php echo $_GET['id']; ?>" method="post">
              <?php echo $_GET['id']; ?>
              <div class="input">
                <label for="starttijd">Datum:</label>
                <input type="date" name="datum" value="<?php echo $_POST['datum']; ?>"><p>*<?php echo $nameErr2; ?></p>
              </div>
              <div class="input">
                <label for="tijd">Tijd  :</label>
                <input type="time" name="tijd" value="<?php echo $_POST['tijd']; ?>"><p>*<?php echo $nameErr4 ?></p>
              </div>
              <div class="input">
                <label for="uitlegger">Uitlegger</label>
                <input type="text" name="uitlegger" value="<?php echo $_POST['uitlegger']; ?>"><p>*<?php echo $nameErr1 ?></p>
              </div>
              <div class="input">
                <label for="spelers"></label>
                <input type="text" name="spelers" value="<?php echo $_POST['spelers']; ?>"placeholder="Vul hier uw spelers in"><p>*<?php echo $nameErr ?></p>
              </div>

              <button type="submit" name="" value="">inplannen</button>

            </form>
  <?php } ?>
  </body>
</html>
