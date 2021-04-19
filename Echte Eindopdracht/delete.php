<?php
require 'includes/functions.php';
if (isset($_GET['confirm'])) {
  echo "string";
  var_dump($_GET['2id']);
  deletePlanning($_GET['2id']);
  header("location: detail.php?delete=0;");
}
 ?>
