<?php
session_start();
include 'protect.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e900325a4e.js" crossorigin="anonymous"></script>
    <title>Painel</title>

    <style>
        nav {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 5;
        }

        nav h1 {
            width: 100%;
        }

        nav .cart {
            margin-right: 20px;
        }

        nav .cart i {
            font-size: 20px;
            cursor: pointer;
        }

        nav .logo {
            width: 100px;
        }

        nav .logo img {
            width: 100px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            width: 45%;
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            float: right;
            margin-top: 100px;
            text-align: center;
            z-index: 2;
        }

        #carrinho {
            border: 1px solid #00000080;
            border-radius: 8px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button.add, button.remove {
            width: 30px;
            font-size: 20px;
        }

        button.add {
            margin-right: 10px;
        }

        button.remove {
            background-color: red;
        }

        .total {
            font-weight: 700;
            font-size: 22px;
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

        .links {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 92px;
            margin-top: 100px;
        }

        main {
            position: relative;
            z-index: 1;
        }

        .container {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 50px;
        }

        .bloco-3 {
            display: flex;
            flex-direction: column;
        }

        .bloco-3-card {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin: 40px 0;
        }

        .bloco-4 {
            width: 250px;
            display: inline-flex;
            flex-direction: column;
            flex-wrap: wrap;
            border: 1px solid #cccccc;
            border-radius: 8px;
            padding: 10px;
        }

        p {
            font-size: 22px;
        }

        span {
            font-weight: 600;
            ;
        }

        button {
            border: none;
            padding: 5px;
            border-radius: 8px;
            background-color: #2abc09;
            color: #ffffff;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background-color: #000000;
        }

        @media (max-width:780px) {


            nav h1 {
                font-size: 1.7rem;
            }
            
            .bloco-3-card {
                justify-content: center;
            }
            .modal-content {
                width: 100%;
            }

            p {
                font-size: 18px;
                align-items: center;
                display: flex;

            }

            button.add, button.remove {
                font-size: 14px;
            }
        }

        @media screen and (max-width:440px) {

            nav h1 {
                font-size: 1rem !important;
            }

            p {
                font-size: 16px;
            }

            button.add, button.remove {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 330px) {
            .item {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
        <div class="logo">
            <img src="./img/logo-remove.png" alt="">
        </div>
        <h1>Bem vindo(a) ao Gostozão Hamburguer</h1>

        <div class="cart" onclick="abrirCarrinho()"><i class="fa-solid fa-cart-shopping"></i></div>
    </nav>

    <section class="links">
        <a class="sair" href="sair.php">Sair</a>
    </section>
    <main>
        <div class="container">
            <h2>Veja nosso cardápio</h2>
            <div class="cardapio">
                <?php
                $usuario = 'root';
                $senha = '';
                $database = 'hamburgueria';
                $host = 'localhost';

                $mysqli = new mysqli($host, $usuario, $senha, $database);

                $categorias = ['hamburguer', 'refrigerante', 'sucos'];

                foreach ($categorias as $categoria) {
                    echo "<div class='bloco-3'>";
                    echo "<h3>" . ucfirst($categoria) . "</h3>"; // Adiciona um título para cada bloco
                    echo "<div class='bloco-3-card'>";
                    $sql = "SELECT imagem, nome, valor FROM produtos WHERE tipo_prod = '$categoria'";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        // Saída de cada linha
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='bloco-4'>";
                            echo "<div class='imagem'>";
                            echo "<img src='img/" . $row['imagem'] . "' height='100' alt=''>";
                            echo "</div>";
                            echo "<div class='info-prato'>";
                            echo "<h3>" . $row['nome'] . "</h3>";
                            echo "<p>Valor: <span>R$ " . $row['valor'] . "</span></p>";
                            echo "<button class='comprar' data-nome=' " . $row['nome'] . "' data-valor='" . $row['valor'] . "'>Comprar</button>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nenhum produto encontrado na categoria $categoria.";
                    }
                    echo "</div>";
                    echo "</div>";
                }

                $mysqli->close();
                ?>
            </div>
        </div>

    </main>



    <div id="carrinhoModal" class="modal">
        <div class="modal-content">
            <div id="carrinho"></div>
        </div>
    </div>

    <script src="script.js"></script>
</body>


</html>