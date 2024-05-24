<?php

require('config.php');

if (isset($_POST)) {

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo_prod'];
    $valor = $_POST['valor'];
    $imagem = $_FILES['imagem']['name'];
    $image_tmo_name = $_FILES['imagem']['tmp_name'];
    $image_folder = 'img/'.$imagem;

    
    
    $query = "INSERT INTO produtos(nome, tipo_prod, valor, imagem) VALUES ('$nome', '$tipo', '$valor', '$imagem')";

    $sql = $conexao->prepare($query);
    $sql->execute();

    header("Location: index.php");
}


//mostra se tá enviando as informaçãoes
    // if(isset($_POST)){
    //     echo "<pre>";
    //         print_r($_POST);
    //     echo "</pre>";
    // }

?>