<?php

include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criptografar a senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)";

    $sql = $mysqli->prepare($query);
    $sql->bind_param("sss", $nome, $email, $senha_criptografada);
    $sql->execute();

    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inserir Dados</title>

    <style>
        nav {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        div {
            width: 400px;
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 50px;
            border-radius: 15px;
            color: #fff;
        }
        .links {
            display: flex;
            align-items: center;
            height: 92px;
        }
        .sair {
            text-decoration: none;
            background-color: red;
            color: #ffffff;
            text-transform: uppercase;
            padding: 10px;
            margin-right: 30px;
            border-radius: 8px;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            border-radius: 8px;
        }
        .inputSubmit {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;

        }

        .inputSubmit:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        a {
            display: inline-flex;
            margin-left: 30px;
            color: #000000;
            font-size: 15px;
            text-decoration: none;
            background-color: orange;
            padding: 10px;
            border-radius: 8px;
            text-transform: uppercase;
        }
        label {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
        <h1>Adicionar Usuário</h1>
    </nav>
    <br>
    <br>
    <section class="links">
        <a class="sair" href="./index.php">Sair</a>
    </section>
    <br>
    <div>
        <form action="registrar.php" method="post">
            <label>Nome do Usuário</label>
            <input type="text" name="nome"><br><br>
            <label>Email</label>
            <input type="email" name="email" placeholder="alguem@email.com"><br><br>
            <label>Senha</label>
            <input type="password" name="senha"><br><br>
            <input class="inputSubmit" type="submit" value="Enviar">
        </form>
    </div>
    
</body>
</html>