<?php

if (isset($_POST['salvar'])) {

    $r = Helpers::setSettings("html_rodape", $_POST['html_rodape']);

    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }

    Helpers::alertaSucesso("Página rodapé salva com sucesso!");
}
?>

<h1>Rodapé</h1>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/07l2hhqrlose4xzofroqaygf9vfjaoa10w8mu1yb30mbbqwq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        language: 'pt_BR',
        plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount', 'code', 'fullscreen'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic | link image media table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code fullscreen',
        document_base_url: url,
        content_css: `${url}/assets/css/style.css`,
        relative_urls: false, // Usa URLs absolutas para garantir o caminho correto
        remove_script_host: false,
    });
</script>

<form method="post">
    <textarea name="html_rodape">
 <?= Helpers::getSettings("html_rodape") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar" value="Salvar">
</form>