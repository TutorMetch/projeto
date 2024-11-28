<?php
// Diretório onde as imagens serão salvas
$target_dir = "./assets/img/dinamicas/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se o arquivo é uma imagem real ou uma imagem falsa
$check = getimagesize($_FILES["file"]["tmp_name"]);
if ($check !== false) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Retorna a URL da imagem salva
        echo json_encode(['location' => $target_file]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao fazer upload da imagem.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Arquivo não é uma imagem.']);
}
?>

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
        images_upload_url: 'admin/upload.php', // URL para o script de upload
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'admin/upload.php');

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