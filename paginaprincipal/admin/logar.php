<?php
    session_start();


    $login = $_POST['login'];
    $senha = $_POST['senha'];

include_once "./connect.php";
include_once "./helpers.php";

$sql = new connect();

$query = "SELECT login, senha from usuarios Where login = '{$login}";

$loginDb = $sql -> select($query);
$senhaDb = $loginDb['senha'];

if (isset($loginDb)){
    if ($senha == $senhaDb) {
        $_SESSION['login'] = $login;
        header("Location:./home.php");
        
    } else {
        Helpers::alertaErro("seu login ou semha estão incorretos", './index.php');
    }
}

var_dump($loginDb)

 ?>
