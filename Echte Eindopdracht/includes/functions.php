<?php
require 'database.php';
function create($person_id){
    $conn = opendatabase();
    $query = 'INSERT INTO `gamesplanning` (`id`, `uitlegger`, `datum`, `tijd`, `GameId`, `spelers`) VALUES (NULL, :uitlegger, :datum, :tijd, :gameid,:spelers)';

    $result = $conn->prepare($query);
    $result->bindParam(':uitlegger',$_POST['uitlegger']);
    $result->bindParam(':datum',$_POST['datum']);
    $result->bindParam(':tijd',$_POST['tijd']);
    $result->bindParam(':gameid',$person_id);
    $result->bindParam(':spelers',$_POST['spelers']);
    // var_dump($result);
    $result->execute();
}
function toevoeg($person_id){
    $conn = opendatabase();
    $query = 'UPDATE `gamesplanning` SET `datum` = :datum, `uitlegger` = :uitlegger ,`tijd` = :tijd,`spelers` = :spelers  WHERE `GameId` =:id';
    $result = $conn->prepare($query);
    $result->bindParam(':uitlegger',$_POST['uitlegger']);
    $result->bindParam(':datum',$_POST['datum']);
    $result->bindParam(':tijd',$_POST['tijd']);
    $result->bindParam(':id',$person_id);
    $result->bindParam(':spelers',$_POST['spelers']);
    $result->execute();
}
function deletePlanning($person_id){
    $conn = opendatabase();
    $query = 'DELETE FROM `gamesplanning` WHERE `GameId`=:id';
    $result = $conn->prepare($query);
    $result->bindParam(':id',$person_id);
    $result->execute();
}
function geplandeSpellen(){
    $conn = opendatabase();
    $query = 'SELECT * FROM `gamesplanning` ORDER BY `datum`,`tijd`';
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchAll();
}
function geplandeSpel($person_id){
    $conn = opendatabase();
    $query = 'SELECT * FROM `gamesplanning` WHERE `gameid`=:id';
    $result = $conn->prepare($query);
    $result->bindParam(':id',$person_id);
    $result->execute();
    return $result->fetch();
}
function selectOne($person_id){
    $conn = opendatabase();
    $query = 'SELECT * FROM `games` WHERE id=:id';
    $result = $conn->prepare($query);
    $result->bindParam(':id', $person_id);
    $result->execute();
    return $result->fetchAll();
}
function selectAll(){
    $conn = opendatabase();
    $query = 'SELECT * FROM games WHERE NOT id IN (SELECT gameid FROM gamesplanning)';
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchAll();
}
function deleteSpelers($person_id){
    $conn = opendatabase();
    $query = 'UPDATE `gamesplanning` SET `spelers` = "" WHERE `gamesplanning`.`id` = :id;';
    $result = $conn->prepare($query);
    $result->bindParam(':id',$person_id);
    $result->execute();
}
function slectSpelers($person_id){
    $conn = opendatabase();
    $query = 'SELECT `spelers` FROM `gamesplanning` WHERE gameid=:id';
    $result = $conn->prepare($query);
    $result->bindParam(':id',$person_id);
    $result->execute();
    return $result->fetch();
}
function selectTime(){
    $conn = opendatabase();
    $query = 'SELECT `tijd` FROM `gamesplanning`';
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchAll();
}
function checkTIme($Time,$value){
  foreach ($Time as $key) {
    $newKet = str_replace(':00','',$key['tijd']);
    if ($newKet == $value) {
      return false;
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
