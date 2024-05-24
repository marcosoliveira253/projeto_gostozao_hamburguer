<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['nivel_acesso'])) {
    die("Você não pode acessar esta página porque não fez o login. <p><a href='index.php'>Entrar</a></p>");
}
?>