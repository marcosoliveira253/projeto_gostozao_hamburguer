<?php
    $usuario = 'root';
    $senha = '';
    $dbname = 'hamburgueria';
    $host = 'localhost';

    $conexao = new mysqli($host, $usuario, $senha, $dbname);

    // if($conexao->error) {
    //     die("Falha na conexao" . $conexao->error);
    // } else {
    //     die("Conexão realizada com sucesso");
    // }
?>