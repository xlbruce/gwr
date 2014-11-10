<?php
/*
if (IsSet($_COOKIE["login"]))
    $login = $_COOKIE["login"];
if (IsSet($_COOKIE["senha"]))
    $senha = $_COOKIE["senha"];*/
/*Verificar se $nome_usuario coincide com $senha_usuário!
 * caso negativo, zerar os cookies
 */
if (empty($_COOKIE['login'])) {
    //TEMPORÁRIO!
    setcookie("usuario");
    setcookie("login");
    setcookie("senha");
    header("Location: index.php");
}