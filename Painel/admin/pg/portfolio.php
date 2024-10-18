<?php


if (isset($_POST['cadastrarCategoria'])) {

    $dados = ["nome" => $_POST['nomeCateg']];

    $r = $sql->insert("categorias", $dados);

    if ($r['codErro'] != 0) {
        Helpers::alertaErro($r['msg']);
    }

    Helpers::alertaSucesso("Categoria cadastrada com sucesso!");
}

?>

<h1>Portifólio</h1>

<h2>Categorias</h2>

<form class="form-group" method="post">
    <label for="nomeCateg">Nome da Categoria</label>
    <input class="form-control" type="text" name="nomeCateg" id="nomeCateg" required>
    <input type="submit" name="cadastrarCategoria" value="Cadastrar Categoria">
</form>