<?php

if (isset($_POST['cadastrarCategoria'])) {
    $dados = ["nome" => $_POST['nomeCateg']];
    $r = $sql->insert("categorias", $dados);

    if ($r['codErro'] != 0) {
        Helpers::alertaErro($r['msg']);
    } else {
        Helpers::alertaSucesso("Categoria cadastrada com sucesso!");
    }
}

if (isset($_POST['editarCategoria'])) {
    $dados = ["nome" => $_POST['nomeCateg']];
    $id = $_POST['id'];
    $r = $sql->update("categorias", $dados, "id = $id");

    if ($r['codErro'] != 0) {
        Helpers::alertaErro($r['msg']);
    } else {
        Helpers::alertaSucesso("Categoria editada com sucesso!");
        header("Location: home.php?pg=portfolio");
        exit();
    }
}

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $r = $sql->delete("categorias", "id = $id");

    if ($r['codErro'] != 0) {
        Helpers::alertaErro($r['msg']);
    } else {
        Helpers::alertaSucesso("Categoria excluída com sucesso!");
        header("Location: home.php?pg=portfolio");
        exit();
    }
}

?>

<h1>Portifólio</h1>

<h2>Categorias</h2>

<?php if (isset($_GET['acao']) && $_GET['acao'] == 'editar' && isset($_GET['id'])): ?>
    <?php
    $id = $_GET['id'];
    $categoria = $sql->selectFor("SELECT * FROM categorias WHERE id = $id")[0];
    ?>
    <form class="form-group" method="post">
        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
        <label for="nomeCateg">Nome da Categoria</label>
        <input class="form-control" type="text" name="nomeCateg" id="nomeCateg" value="<?php echo $categoria['nome']; ?>" required>
        <input type="submit" name="editarCategoria" value="Editar">
    </form>
<?php else: ?>
    <form class="form-group" method="post">
        <label for="nomeCateg">Nome da Categoria</label>
        <input class="form-control" type="text" name="nomeCateg" id="nomeCateg" required>
        <input type="submit" name="cadastrarCategoria" value="Cadastrar Categoria">
    </form>
<?php endif; ?>

<hr>

<table class="table table-stripped">
    <tr>
        <td>Nome da Categoria</td>
        <td>Editar</td>
        <td>Excluir</td>
    </tr>

    <?php
    $categ = $sql->selectFor("SELECT * FROM categorias ORDER BY nome ASC");

    foreach ($categ as $v) {
        echo "<tr>
                <td>{$v['nome']}</td>
                <td>
                <a href=\"home.php?pg=portfolio&acao=editar&id={$v['id']}\">Editar</a>
                </td>
                <td>
                <a href=\"home.php?pg=portfolio&acao=excluir&id={$v['id']}\" onclick=\"return confirm('Tem certeza que deseja excluir a categoria?');\">Excluir</a>
                </td>
            </tr>";
    }
    ?>
</table>