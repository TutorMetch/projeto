<?php

if (isset($_POST['salvar_page_title'])) {
    $page_title_html = $_POST['page_title_html'];
    $r = Helpers::setSettings("page_title_contact_pg", $page_title_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    } else {
        Helpers::alertaSucesso("Título da página salvo com sucesso!");
    }
}

if (isset($_POST['salvar_contact'])) {
    $contact_html = $_POST['contact_html'];
    $r = Helpers::setSettings("contact_contact_pg", $contact_html);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    } else {
        Helpers::alertaSucesso("Seção de contato salva com sucesso!");
    }
}
if (isset($_POST['salvar_contact_rodape'])) {
    $contact_rodape_pg = $_POST['contact_rodape_pg'];
    $r = Helpers::setSettings("contact_rodape_pg", $contact_rodape_pg);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Contato' salva com sucesso!");
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
    <textarea name="page_title_html" class="form-control">
        <?= htmlspecialchars(Helpers::getSettings("page_title_contact_pg")) ?>
    </textarea>
    <input class="btn btn-success" type="submit" name="salvar_page_title" value="Salvar">
</form>

<hr>

<h1>Contato</h1>

<form method="post">
    <textarea name="contact_html" class="form-control">
        <?= htmlspecialchars(Helpers::getSettings("contact_contact_pg")) ?>
    </textarea>
    <input class="btn btn-success" type="submit" name="salvar_contact" value="Salvar">
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