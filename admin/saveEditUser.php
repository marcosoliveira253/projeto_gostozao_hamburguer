<?php

include_once('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nivel = $_POST['nivel_acesso'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sqlUpdate = "UPDATE usuarios SET nivel_acesso = '$nivel', nome='$nome', email= '$email' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: sistemaUser.php');
?>