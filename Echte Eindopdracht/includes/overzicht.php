<?php
function eencharacter($sql, array $fields = null){
        if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            $dbh = new PDO("mysql:host=localhost;dbname=databank_php", 'root', 'mysql');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!is_null($fields)) {
              foreach ($fields as $key => $value) {
                $sql = str_replace($key,$value,$sql);
              }
            }
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return $stmt->fetchAll();
            }
          }
          catch (PDOexception $e) {
            echo "Error is: " . $e->getmessage();
            die();
          }
        }
    }



?>
