<?php

  require_once 'config.php';

  $dsn = "mysql:dbname=".BASE.";host=".HOST;
  try{
    $connexion = new PDO($dsn,USER,PASS);
  }
  catch(PDOException $e){
    printf("Echec de la connexion : %s\n", $e->getMessage());
    exit();
  }

?>