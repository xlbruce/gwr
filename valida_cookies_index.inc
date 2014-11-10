<?php

if (isset($_COOKIE["login"]) AND isset($_COOKIE["senha"])) {
    $login = $_COOKIE["login"];
    $senha = $_COOKIE["senha"];
}
/*Verificar se $login coincide com $senha_usuário!
 * caso negativo, zerar os cookies
 */
if($login !== "" AND $senha !== "") {
    //se o usuário ja tiver feito login, ele é redirecionado para a "index2.php"
    header("Location: index2.php");
}