<?php
require 'database.php';
function create($person_id){
    $conn = opendatabase();
    $query = 'INSERT INTO `gamesplanning` (`id`, `uitlegger`, `datum`, `tijd`, `GameId`) VALUES (NULL, :naam, :datum, :tijd, :gameid)';
    $result = $conn->prepare($query);
    $result->execute([':datum'=>$_POST['datum'],':naam'=>$_POST['uitlegger'],':tijd'=>$_POST['tijd'],':gameid'=>$person_id]);
}
function toevoeg($person_id){
    $conn = opendatabase();
    $query = 'UPDATE `gamesplanning` SET `datum` = :datum, `uitlegger` = :naam ,`tijd` = :tijd  WHERE `id` =(SELECT `id` FROM `games` WHERE `name`=:collnaam)';
    $result = $conn->prepare($query);
    $result->execute([':datum'=>$_POST['datum'],':naam'=>$_POST['uitlegger'],':tijd'=>$_POST['tijd'],':collnaam'=>$_POST['collnaam']]);
}
function deletePlanning($person_id){
    $conn = opendatabase();
    $query = 'DELETE FROM `gamesplanning` WHERE id=:id';
    $result = $conn->prepare($query);
    bindParam(':id',$person_id);
    $result->execute();
}
function geplandeSpellen(){
    $conn = opendatabase();
    $query = 'SELECT * FROM `gamesplanning`';
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchAll();
}
function selectOne($person_id){
    $conn = opendatabase();
    $query = 'SELECT * FROM `games` WHERE id= :id';
    $result = $conn->prepare($query);
    $result->bindParam(':id', $person_id);
    $result->execute();
    return $result->fetchAll();
}
function selectAll(){
    $conn = opendatabase();
    $query = 'SELECT * FROM `games`';
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchAll();
}






 ?>
