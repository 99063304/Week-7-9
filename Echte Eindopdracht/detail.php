<?php
require 'includes/overzicht.php';
require 'includes/functions.php';

$rows = selectOne($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  create($_GET['id']);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Eindopdracht</title>
  </head>
  <body>
    <?php foreach ($rows as $key){ ?>
      <div class="Detail">
        <h2><?php echo $key['name']; ?></h2>
        <img class="col-12"src="afbeeldingen/<?php echo $key['image']; ?>" alt="afbeelding">
        <p>Tijd:?</p>
        <p>Beschrijving:<?php echo $key['description']; ?> Minutes</p>
        <p>Uitlegger:</p>
      </div>
    <?php } ?>
    <form class="container" action="detail.php?id=<?php echo $_GET['id']; ?>" method="post">
      <?php echo $_GET['id']; ?>
      <input type="text" name="collnaam" value="<?php echo $key['name']; ?>">
      <label for="starttijd">datum</label>
      <input type="date" name="datum" value="">

      <label for="tijd">tijd</label>
      <input type="time" name="tijd" value="">

      <label for="uitlegger">uitlegger</label>
      <input type="text" name="uitlegger" value="">

      <input type="submit" name="" value="">
    </form>
  </body>
</html>
