<?php

  require_once 'config.php';

  $dsn = "mysql:dbname=".BASE2.";host=".HOST2;
  try{
    $connexion = new PDO($dsn,USER2,PASS2);
  }
  catch(PDOException $e){
    printf("Echec de la connexion : %s\n", $e->getMessage());
    exit();
  }

?>