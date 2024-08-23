<?php

session_start();


$login = $_POST['login'];
$senha = $_POST['senha'];

include_once "./connect.php";
include_once "./helpers.php";

$sql = new connect();

$query = "SELECT login, senha from usuario WHERE login = '{$login}' ";

$loginDb = $sql->select($query);
$senhaDb = $loginDb['senha'];

if(isset($loginDb)){
    if($senha == $senhaDb){
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('Location: ./home.php');
    } else{
        Helpers::alertaErro("Seu login ou senha estão incorretos", "./index.php");
    }
} 
      
var_dump($loginDb);














// $_SESSION['login_usuario'] = $login;

// $_SESSION['senha_usuario'] = $senha;

// $_SESSION['id_usuario'] = $consulta['id'];




// header('Location: ./home.php');
// echo 'ok';