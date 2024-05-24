<?php
include_once "conexao.php";

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(strlen($_POST['email']) === 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(password_verify($senha, $usuario['senha'])) {

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['nome'] = $usuario['nome'];

                $_SESSION['nivel_acesso'] = $usuario['nivel_acesso'];

                if($_SESSION['nivel_acesso'] == 1) {

                    header('Location: admin/sistemaProd.php');

                } else if($_SESSION['nivel_acesso'] == 0) {

                    header("Location: painel.php");
                }

            } else {
                echo "Falha ao logar! Email ou senha incorretos!";
            }

        } else {
            echo "Falha ao logar! Email ou senha incorretos!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tela de Login</title>

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
        .btn-submit {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;

        }

        .btn-submit:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        label {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
        <h1>Acesse sua Conta</h1>
    </nav>
    <div>
        <form action="" method="post">
            <p>
                <label for="">Email</label>
                <input type="text" name="email">
            </p>
            <p>
                <label for="">Senha</label>
                <input type="password" name="senha">
            </p>
            <p>
                <input class="btn-submit" type="submit">
            </p>
            <br>
            <p>
                Não tem cadastro? <a href="registrar.php">Clique aqui</a>
            </p>
        </form>
    </div>
</body>
</html>