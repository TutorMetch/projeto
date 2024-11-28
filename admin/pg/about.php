<?php

if (isset($_POST['salvar_page_title'])) {
    $page_title_html = $_POST['page_title_html'];
    $r = Helpers::setSettings("page_title_about_pg", $page_title_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Título da página salvo com sucesso!");
}

if (isset($_POST['salvar_about_us'])) {
    $about_us_html = $_POST['about_us_html'];
    $r = Helpers::setSettings("about_us_about_pg", $about_us_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Sobre nós' salva com sucesso!");
}

if (isset($_POST['salvar_counts'])) {
    $counts_html = $_POST['counts_html'];
    $r = Helpers::setSettings("counts_about_pg", $counts_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Contagem' salva com sucesso!");
}

if (isset($_POST['salvar_testimonials'])) {
    $testimonials_html = $_POST['testimonials_html'];
    $r = Helpers::setSettings("testimonials_about_pg", $testimonials_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Depoimentos' salva com sucesso!");
}
?>

<h1>Título da Página</h1>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/07l2hhqrlose4xzofroqaygf9vfjaoa10w8mu1yb30mbbqwq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
 <?= Helpers::getSettings("page_title_about_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_page_title" value="Salvar">
</form>

<hr>

<h1>Sobre nós</h1>

<form method="post">
    <textarea name="about_us_html">
 <?= Helpers::getSettings("about_us_about_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_about_us" value="Salvar">
</form>

<hr>

<h1>Contagem</h1>

<form method="post">
    <textarea name="counts_html">
 <?= Helpers::getSettings("counts_about_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_counts" value="Salvar">
</form>

<hr>

<h1>Depoimentos</h1>

<form method="post">
    <textarea name="testimonials_html">
 <?= Helpers::getSettings("testimonials_about_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_testimonials" value="Salvar">
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