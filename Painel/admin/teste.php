<?php

include "./connect.php";
include "./helpers.php";

$senha = "admin";

$senha_encript = Helpers::encripta($senha);

echo $senha_encript;

?>