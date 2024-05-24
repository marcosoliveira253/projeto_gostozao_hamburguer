<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inserir Dados</title>

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
            font-size: 18px;

        }

        .inputSubmit:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        a {
            display: inline-flex;
            margin-top: 50px;
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
        <div>
            <form action="cria_produto.php" method="post" enctype="multipart/form-data">
                <label>Nome do Produto</label>
                <input type="text" name="nome"><br><br>
                <label>Tipo do Produto</label>
                <input type="text" name="tipo_prod"><br><br>
                <label>Valor do Produto</label>
                <input type="number" name="valor" step="any" placeholder="5.00"><br><br>
                <input type="file" accept="img/png, img/jpeg, img/jpg" name="imagem"><br><br>
                <input class="inputSubmit" type="submit" value="Adicionar Produto">
            </form>
        </div>
        <a href="sistemaProd.php">Listar produtos</a>
    </container>
</body>
</html>