<?php
$nomePerfil = $sql->select("SELECT * FROM settings where id=6");
$linkTwitter = $sql->select("SELECT * FROM settings where id=1");
$linkFacebook = $sql->select("SELECT * FROM settings where id=2");
$linkInstagram = $sql->select("SELECT * FROM settings where id=3");
$linkSkype = $sql->select("SELECT * FROM settings where id=4");
$linkLinkedin = $sql->select("SELECT * FROM settings where id=5"); 
?>
<h1>Home</h1>

<form action="./" method="post" class="form-group">
    <label class="label" for="nome_perfil">Nome Perfil</label>
    <input class="form-control" type="text" name="nome_perfil" id="nome_perfil" value="<?=$nomePerfil['setting_value']?>">
    <label class="label" for="link_twitter">Link Twitter</label>
    <input class="form-control" type="text" name="link_twitter" id="link_twitter" value="<?=$linkTwitter['setting_value']?>">
    <label class="label" for="link_facebook">Link Facebook</label>
    <input class="form-control" type="text" name="link_facebook" id="link_facebook" value="<?=$linkFacebook['setting_value']?>">
    <label class="label" for="link_instagram">Link Instagram</label>
    <input class="form-control" type="text" name="link_instagram" id="link_instagram" value="<?=$linkInstagram['setting_value']?>">
    <label class="label" for="link_skype">Link Skype</label>
    <input class="form-control" type="text" name="link_skype" id="link_skype" value="<?=$linkSkype['setting_value']?>">
    <label class="label" for="link_linkedin">Link LinkedIn</label>
    <input class="form-control" type="text" name="link_linkedin" id="link_linkedin" value="<?=$linkLinkedin['setting_value']?>">
</form>