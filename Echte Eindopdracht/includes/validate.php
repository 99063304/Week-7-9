<?php
// echo 'this is the validate file';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
    if (is_int($_GET['id'])) {
      if (isset($_GET['delete'])) {
        if ($_GET['delete' == 'true']) {
        // var_dump($_GET['2id']);
        echo "<script>if(confirm('do you want to delete')){window.location.href = 'delete.php?id=". $_GET['id']."&delete=false'}else {document.write('JA hoot');}</script>";
      } elseif ($_GET['delete'] == 'false') {
        deleteSpelers($_GET['id']);
      }
    }
      if (isset($_GET['delete'])) {
          echo "<script>alert('Je item is verwijdert');</script>";
      }
  }
}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$controllen = array('uitlegger' => false,'tijd' => true,'datum' => false,'spelers' => false);
if (isset($_POST['spelers'])) {
  if (empty($_POST["spelers"])) {
    $nameErr = "Name is required";
  } else {
      $namen = explode(", ",$_POST['spelers']);
      if (count($namen) >= $rows[0]['min_players'] && count($namen)<= $rows[0]['max_players']) {
        foreach ($namen as $key => $value) {
        $name = test_input($value);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }else {
          $controllen['spelers'] = true;
        }
      }
    }elseif (count($namen) < $rows[0]['min_players']){
      $nameErr = 'Je moet minimaal '. $rows[0]['min_players']. 'spelers hebben';
    }else {
      $nameErr = 'Je moet hebt bent over de maximaal aantal spelers van'. $rows[0]['max_players']. 'heen verminder het Alstublieft';
    }
  }
}
if (isset($_POST['uitlegger'])) {
  if (empty($_POST["uitlegger"])) {
    $nameErr1 = "Name is required";
  } else {
    $name1 = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name1)) {
      $nameErr1 = "Only letters and white space allowed";
    }else {
      $controllen['uitlegger']= true;
    }
  }
}
if (isset($_POST['datum'])) {
  if (empty($_POST["datum"])) {
    $nameErr2 = "Date is required";
  } else {
    $name2 = test_input($_POST["datum"]);
      $controllen['datum'] = true;
    }
  }
  if (isset($_POST['tijd'])) {
    if (empty($_POST["tijd"])) {
      $nameErr4 = "Time is required";
    } else {
      $name4 = test_input($_POST["tijd"]);
      if (!preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/",$name4)) {
          if ($_POST['tijd'] == $rows3['tijd']) {
            $controllen['tijd']= true;
          }else {
            $nameErr4 = "Geen geldige tijd";
          }
      }else {
        if(count($selectTijd) != 0){
        echo "JJJJJe bene t ebnewbewbjf jd f";
         echo "nbd dhjv dhjv dhj vdh j h";
        $controllen['tijd'] = checkTIme($selectTijd,$_POST['tijd']);
        var_dump($controllen['tijd']);
        if (is_null($controllen['tijd'])) {
          $controllen['tijd'] = true;
        }else {
          $nameErr4 = 'Op deze tijd is al iemand in gepland';
        }
      }else {

        echo "nononononoon";
      }
    }
  }


  if ($controllen['tijd'] && $controllen['datum'] && $controllen['uitlegger'] && $controllen['spelers'] === true) {
    if (isset($_GET['delete'])) {
      if($_GET['delete'] == 'true'){
        toevoeg($_GET['id']);
          header('Location: GeplandeOverzicht.php?alert=update');
      }
    }
    else {
        create($_GET['id']);
        header('Location: GeplandeOverzicht.php?alert=toevoeg');
      }
   }else {
    // var_dump($controllen);
   }
}
}
 ?>
