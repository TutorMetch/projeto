<?php
if (isset($_POST['salvar_pgc'])) {
    $r = Helpers::setSettings("cursos_pgc", $_POST['cursos_pgc']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página cursos PGC salva com sucesso!");
}

if (isset($_POST['salvar_resto'])) {
    $r = Helpers::setSettings("cursos_resto", $_POST['cursos_resto']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página cursos resto salva com sucesso!");
}
?>

<h1>Cursos</h1>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/91yvdlvgrvd7ilvubca1v13xfxpwf0dcuf2xmg2gih7pc4nv/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
    <textarea name="cursos_pgc">
 <?= Helpers::getSettings("cursos_pgc") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_pgc" value="Salvar">
</form>

<br>

<h1>Cursos resto</h1>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/91yvdlvgrvd7ilvubca1v13xfxpwf0dcuf2xmg2gih7pc4nv/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
    <textarea name="cursos_resto">
 <?= Helpers::getSettings("cursos_resto") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_resto" value="Salvar">
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