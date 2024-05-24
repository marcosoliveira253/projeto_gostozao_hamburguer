<?php

if (!empty($_GET['id'])) {
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) 
        {
            $nivel = $user_data['nivel_acesso'];
            $nome = $user_data['nome'];
            $email = $user_data['email'];
        }
    } else {
        header('Location: sistemaUser.php');
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulário de Edição de Usuários</title>

    <style>
        container{
            width: 1200px;
            display: block;
            margin: auto;
        }
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
    <container>
        <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
            <h1>Formulário de Edição de Usuários</h1>
        </nav>
        <br>
        <br>
        <section class="links">
        <a href="sistemaUser.php">Listar usuários</a>
        </section>
        <div>
            <form action="SaveEditUser.php" method="post">
                <label>Nível de Acesso</label>
                <input type="text" name="nivel_acesso" value="<?php echo $nivel ?>"><br><br>
                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo $nome ?>"><br><br>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email ?>"><br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input class="inputSubmit" type="submit" name="update" id="update">
            </form>
            
        </div>
    </container>
</body>

</html>