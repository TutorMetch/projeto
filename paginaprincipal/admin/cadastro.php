<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <form action="cadastro.php" method="post">
        <label for="login">Nome do usuário:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br>
        <label for="nivel">Nível:</label><br>
        <select id="nivel" name="nivel">
            <option value="1">Administrador</option>
            <option value="2">Editor</option>
        </select><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
<?php
session_start();

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';
$nivel = $_POST['nivel'] ?? '';

include_once "./connect.php";
include_once "./helpers.php";

$senha = Helpers::encripta($senha);

$sql = new connect();

$query = "INSERT INTO usuarios (login, senha, nivel) VALUES ('{$login}', '{$senha}', {$nivel})";

$result = $sql->query($query);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar usuário.']);
}
?>