<?php





if (isset($_POST['salvar_home'])) {
    $titulo = $_POST['titulo_pgp'];
    $subtitulo = $_POST['html_subpg'];
    $botao = $_POST['botao_pgp'];
    $insta = $_POST['link_insta'];
    $linkedin = $_POST['link_linkedin'];
    $texto_perfil = $_POST['texto_perfil'];

    $arrAtualiza = [
        Helpers::setSettings("titulo_pgp", $titulo),
        Helpers::setSettings("html_subpg", $subtitulo),
        Helpers::setSettings("botao_pgp", $botao),
        Helpers::setSettings("link_insta", $insta),
        Helpers::setSettings("link_linkedin", $linkedin),
        Helpers::setSettings("texto_perfil", $texto_perfil)
    ];

    foreach ($arrAtualiza as $r) {
        if ($r['codErro'] != 0) {
            Helpers::alertaErro($r['msg']);
        }
    }

    Helpers::alertaSucesso("Página Home salva com sucesso!");
}

if (isset($_POST['imagens_Home'])) {
    include "../assets/vendor/class_upload/src/class.upload.php";

    $caminho = '../assets/img/dinamicas/';

    // Processamento da imagem do perfil
    if (!empty($_FILES['img_perfil']['name'])) {

        //buscar nome da imagem no banco de dados
        $img_antiga = Helpers::getSettings("img_perfil");

        if (file_exists($caminho . $img_antiga)) {
            unlink($caminho . $img_antiga);
        }

        $imgPerfil = new \Verot\Upload\Upload($_FILES['img_perfil']);
        if ($imgPerfil->uploaded) {
            $imgPerfil->file_new_name_body = 'img_perfil';
            $imgPerfil->image_resize = true;
            $imgPerfil->image_convert = 'webp';
            $imgPerfil->image_x = 200;
            $imgPerfil->image_ratio_y = true;
            $imgPerfil->process($caminho);

            if ($imgPerfil->processed) {
                $imgPerfil->clean();
                $rImgPerfil = $sql->update("settings", ['setting_value' => $imgPerfil->file_dst_name], "id=17");
                if ($rImgPerfil['codErro'] != 0) {
                    Helpers::alertaErro("Erro ao salvar a imagem do perfil no banco de dados.");
                }

            } else {
                Helpers::alertaErro('Erro ao processar a imagem do perfil: ' . $imgPerfil->error);
            }
        }
    }

    // Processamento da imagem de fundo
    if (!empty($_FILES['img_fundopg']['name'])) {

        //buscar nome da imagem no banco de dados
        $img_antiga = Helpers::getSettings("img_fundopg");

        if (file_exists($caminho . $img_antiga)) {
            unlink($caminho . $img_antiga);
        }

        $imgFundo = new \Verot\Upload\Upload($_FILES['img_fundopg']);

        if ($imgFundo->uploaded) {
            $imgFundo->file_new_name_body = 'img_fundopg';
            $imgFundo->image_resize = true;
            $imgFundo->image_convert = 'webp';
            $imgFundo->image_x = 1920; // tamanho maior para a imagem de fundo
            $imgFundo->image_ratio_y = true;
            $imgFundo->process($caminho);
            if ($imgFundo->processed) {
                $imgFundo->clean();
                $rImgFundo = $sql->update("settings", ['setting_value' => $imgFundo->file_dst_name], "id=17");
                if ($rImgFundo['codErro'] != 0) {
                    Helpers::alertaErro("Erro ao salvar a imagem de fundo no banco de dados.");
                }
            } else {
                Helpers::alertaErro('Erro ao processar a imagem de fundo: ' . $imgFundo->error);
            }
        }
    }

    Helpers::alertaSucesso("Imagens alteradas com sucesso!");
}

if (isset($_POST['salvar_servicos'])) {
    $r = Helpers::setSettings("cursos_pg", $_POST['cursos_pg']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página serviços salva com sucesso!");
}

if (isset($_POST['salvar_experiencia'])) {
    $r = Helpers::setSettings("valorespg_pg", $_POST['valorespg_pg']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página experiência salva com sucesso!");
}

if (isset($_POST['salvar_treiners'])) {
    $r = Helpers::setSettings("treiners_pg", $_POST['treiners_pg']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página treiners salva com sucesso!");
}

if (isset($_POST['salvar_sobre'])) {
    $r = Helpers::setSettings("feature_pg", $_POST['feature_pg']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página sobre salva com sucesso!");
}

if (isset($_POST['salvar_contato'])) {
    $r = Helpers::setSettings("sobrepg_html", $_POST['sobrepg_html']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Página sobre salva com sucesso!");
}

if (isset($_POST['salvar_why_us'])) {
    $r = Helpers::setSettings("whyus_pg", $_POST['whyus_pg']);
    if ($r['codErro'] != 0) {
        Helpers::alertaErro("Erro: {$r['msg']}");
    }
    Helpers::alertaSucesso("Seção 'Por que nós' salva com sucesso!");
}
?>

<h1>Home</h1>

<form method="post" class="form-group">
    <label class="label" for="titulo_pgp">titulo</label>
    <input class="form-control" type="text" name="titulo_pgp" id="titulo_pgp" value="<?= Helpers::getSettings("titulo_pgp"); ?>">

    <label class="label" for="html_subpg">Sub titulo</label>
    <input class="form-control" type="text" name="html_subpg" id="html_subpg" value="<?= Helpers::getSettings("html_subpg") ?>">

    <label class="label" for="botao_pgp">Botao</label>
    <input class="form-control" type="text" name="botao_pgp" id="botao_pgp" value="<?= Helpers::getSettings("botao_pgp") ?>">

    <label class="label" for="link_insta">Link Instagram</label>
    <input class="form-control" type="text" name="link_insta" id="link_insta" value="<?= Helpers::getSettings("link_insta") ?>">

    <label class="label" for="link_linkedin">Link LinkedIn</label>
    <input class="form-control" type="text" name="link_linkedin" id="link_linkedin" value="<?= Helpers::getSettings("link_linkedin") ?>">
   
    <label class="label" for="link_linkedin">Texto Perfil</label>
    <input class="form-control" type="text" name="texto_perfil" id="texto_perfil" value="<?= Helpers::getSettings("texto_perfil") ?>">

    <br>
    <input class="form-control" type="submit" name="salvar_home" value="Salvar">
</form>

<hr>

<form method="post" class="form-group" enctype="multipart/form-data">
    <label>Imagem do perfil</label>
    <input type="file" name="img_perfil" class="form-control">

    <label>Imagem de fundo</label>
    <input type="file" name="img_fundopg" class="form-control"value="<?= Helpers::getSettings("img_fundopg") ?>">

    <input type="submit" class="form-control" name="imagens_Home" value="Salvar">
</form>

<hr>

<h1>Resumo</h1>

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
        toolbar: 'image | insertImageFromUrl | undo redo | blocks fontfamily fontsize | bold italic | link image media table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code fullscreen',
        document_base_url: url,
        content_css: `${url}/assets/css/style.css`,
        relative_urls: false,
        remove_script_host: false,
        automatic_uploads: true,
        file_picker_types: 'image',
        setup: function (editor) {
            editor.ui.registry.addButton('insertImageFromUrl', {
                text: 'Insert Image from URL',
                onAction: function () {
                    var imageUrl = prompt("Enter the image URL");
                    if (imageUrl) {
                        editor.insertContent('<img src="' + imageUrl + '" />');
                    }
                }
            });
        }
    });
</script>

<form method="post">
    <textarea name="sobrepg_html">
 <?= Helpers::getSettings("sobrepg_html") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_contato" value="Salvar">
</form>

<hr>

<h1>Por que nós</h1>

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
        images_upload_url: '../upload.php', // Certifique-se de que o caminho está correto
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../upload.php'); // Certifique-se de que o caminho está correto

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>

<form method="post">
    <textarea name="whyus_pg">
 <?= Helpers::getSettings("whyus_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_why_us" value="Salvar">
</form>

<hr>

<h1>Sobre</h1>

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
        images_upload_url: '../upload.php', // Certifique-se de que o caminho está correto
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', './admin/upload.'); // Certifique-se de que o caminho está correto

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>

<form method="post">
    <textarea name="feature_pg">
 <?= Helpers::getSettings("feature_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_sobre" value="Salvar">
</form>

<hr>

<h1>Serviços</h1>

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
        images_upload_url: '../upload.php', // Certifique-se de que o caminho está correto
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../upload.php'); // Certifique-se de que o caminho está correto

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>

<form method="post">
    <textarea name="cursos_pg">
 <?= Helpers::getSettings("cursos_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_servicos" value="Salvar">
</form>

<hr>

<h1>Experiência</h1>

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
        images_upload_url: '../upload.php', // Certifique-se de que o caminho está correto
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../upload.php'); // Certifique-se de que o caminho está correto

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>

<form method="post">
    <textarea name="valorespg_pg">
 <?= Helpers::getSettings("valorespg_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_experiencia" value="Salvar">
</form>

<hr>

<h1>Trainers</h1>

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
        images_upload_url: '../upload.php', // Certifique-se de que o caminho está correto
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../upload.php'); // Certifique-se de que o caminho está correto

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>

<form method="post">
    <textarea name="treiners_pg">
 <?= Helpers::getSettings("treiners_pg") ?>
</textarea>
    <input class="btn btn-success" type="submit" name="salvar_treiners" value="Salvar">
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