<?php

if (isset($_POST['salvar_page_title'])) {
    $page_title_html = $_POST['page_title_html'];
    $r = Helpers::setSettings("page_title_trainers_pg", $page_title_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Título da página salvo com sucesso!");
}

if (isset($_POST['salvar_trainers'])) {
    $trainers_html = $_POST['trainers_html'];
    $r = Helpers::setSettings("trainers_trainers_pg", $trainers_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Treinadores' salva com sucesso!");
}
?>

<h1>Título da Página</h1>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/91yvdlvgrvd7ilvubca1v13xfxpwf0dcuf2xmg2gih7pc4nv/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea',
        language: 'pt_BR',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount', 'code', 'fullscreen'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic | link image media table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code fullscreen',
        document_base_url: url,
        content_css: `${url}/assets/css/style.css`,
        relative_urls: false,
        remove_script_host: false,
        extended_valid_elements: 'span[*],div[*],section[*],p[*]',
        valid_elements: '*[*]'
    });
</script>

<form method="post">
    <textarea name="page_title_html">
 <?= Helpers::getSettings("page_title_trainers_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_page_title" value="Salvar">
</form>

<hr>

<h1>Treinadores</h1>

<form method="post">
    <textarea name="trainers_html">
 <?= Helpers::getSettings("trainers_trainers_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_trainers" value="Salvar">
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>