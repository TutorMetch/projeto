<?php

define('HOST', 'localhost');

define('DB', 'site');

define('USER', 'root');

define('PASS', '');

class connect
{
  private $debug = true;
  
  function select($sql)
  {
    try {
      $cnx = new PDO('mysql:host=' . HOST . ';dbname=' . DB . '', USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $con = $cnx->prepare($sql);
      $con->execute();
      return $con->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Ops! desculpe, algo deu errado, por favor tente mais tarde:<br>";
      if ($this->debug == true) {
        echo $e->getMessage();
      }
      exit;
    }
    $cnx = null;
  }

  function selectFor($sql)
  {
    try {
      $cnx = new PDO('mysql:host=' . HOST . ';dbname=' . DB . '', USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $con = $cnx->prepare($sql);
      $con->execute();
      return $con->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Ops! desculpe,  algo deu errado, por favor tente mais tarde:<br>";
      if ($this->debug == true) {
        echo $e->getMessage();
      }
      exit;
    }
    $cnx = null;
  }

  // Resto do código...
}