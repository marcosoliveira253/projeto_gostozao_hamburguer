<?php

include_once('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo_prod'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];

    $sqlUpdate = "UPDATE produtos SET nome='$nome', tipo_prod='$tipo', valor= '$valor', imagem='$imagem' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: sistemaProd.php');
?>