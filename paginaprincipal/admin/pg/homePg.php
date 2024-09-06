<?php

$query = "SELECT * FROM home";

$r = $sql->select($query);
?>

<h1>Página HOME</h1>

<form class="form-group" method="post" action="./" enctype="multipart/form-data">

<label>Imagem de Perfil</label>
<input class="form-control" type="file" name="imagem_perfil">

<label>Texto Perfil</label>
<input class="form-control" type="text" name="texto_perfil" value="<?=$r['texto_perfil']?>">

<label>Imagem Principal</label>
<input type="file" class="form-control" name="imagem_principal">

<label>Link Face</label>
<input type="text" class="form-control" name="link_face">

<label>Link Instagram</label>
<input type="text" class="form-control" name="link_insta">

<label>Link Linkedin</label>
<input type="text" class="form-control" name="link_linkedin">

<input type="submit" name="salvar" value="Salvar">

</form>