<?php

if (!empty($_GET['id'])) {
    include_once('config.php');

    $id = $_GET['id'];

    if (!is_numeric($id)) {
        // Se $id não for um número, redirecione o usuário para sistemaProd.php e termine a execução do script.
        header('Location: sistemaProd.php');
        exit;
    }


    $sqlSelect = "SELECT * FROM produtos WHERE id=$id";

    $result = $conexao->query($sqlSelect);
    
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) 
        {
            $nome = $user_data['nome'];
            $tipo = $user_data['tipo_prod'];
            $valor = $user_data['valor'];
            $imagem = $user_data['imagem'];
        }
    } else {
        header('Location: sistemaProd.php');
    }
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
        container {
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
            width: 450px;
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
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
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
            <h1>Adição de Produtos</h1>
        </nav>
        <br>
        <br>
        <section>
            <a href="sistemaProd.php">Listar produtos</a>
        </section>
        <div>
            <form action="SaveEdit.php" method="post">
                <input type="text" name="nome" placeholder="nome do produto" value="<?php echo $nome ?>"><br><br>
                <input type="text" name="tipo_prod" placeholder="tipo do produto" value="<?php echo $tipo ?>"><br><br>
                <input type="number" name="valor" step="any" placeholder="valor do produto" value="<?php echo $valor ?>"><br><br>
                <input type="file" accept="img/png, img/jpeg, img/jpg" name="imagem" value="<?php echo $imagem ?>"><br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
            </form>
        </div>
    </container>
</body>

</html>