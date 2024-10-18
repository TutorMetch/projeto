<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
      
        
        
        */
        .alert {
            display: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Cadastro de Usuário</h2>
        <div class="alert alert-danger" id="errorMessage"></div>
        <form action="cadastro.php" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Nome do usuário:</label>
                <input type="text" id="login" name="login" class="form-control" required><br>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required><br>
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">Nível:</label>
                <select id="nivel" name="nivel" class="form-select">
                    <option value="1">Administrador</option>
                    <option value="2">Editor</option>
                </select><br>
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-primary w-100">
        </form>
    </div>
</body>

</html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $nivel = $_POST['nivel'] ?? '';

    if (!empty($login) && !empty($senha) && !empty($nivel)) {
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
    } else {
        echo json_encode(['success' => false, 'message' => 'Os campos de login, senha e nível são obrigatórios.']);
    }
}
?>