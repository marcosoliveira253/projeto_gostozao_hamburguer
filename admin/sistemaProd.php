<?php
include_once('config.php');

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sistema Edição de Dados</title>

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

        .links {
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .linkDePaginaUsuarios {
            text-decoration: none;
            text-transform: uppercase;
            color: #ffffff;
            background-color: #2abc09;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
        }

        .table {
            vertical-align: unset;
            margin: 2rem 0;
            overflow-y: scroll;
        }

        .table .btn-link {
            display: flex;
            flex-direction: column;
        }

        .table .btn-edit {
            text-decoration: none;
            color: #ffffff;
            padding: 5px 0;
            background-color: #ffca2c;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .table .btn-delete {
            text-decoration: none;
            color: #ffffff;
            background-color: crimson;
            padding: 5px 0;
            border-radius: 8px;
        }

        .btn-edit:hover, .btn-edit:active, 
        .btn-delete:hover, .btn-delete:active {
            background-color: black;
        }

        tbody, td, tfoot, th, thead, tr {
            border-style: none;
        }

        tr {
            border: 1px solid #ffffff;
        }

        th {
            text-align: center;
            padding: 1rem;
            font-size: 1.5rem;
        }

        td {
            text-align: center;
            justify-content: center;
            padding: 1rem;
            font-size: 1.3rem;
            vertical-align: middle;
        }

        .adicionar {
            display: inline-flex;
            margin-left: 30px;
            color: #ffffff;
            font-weight: bold;
            font-size: 15px;
            text-decoration: none;
            background-color: orange;
            padding: 10px;
            border-radius: 8px;
            text-transform: uppercase;
        }

    </style>
</head>

<body>
    <container>
        <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
            <h1>Edição de Produtos</h1>
        </nav>
        <br>
        <br>
        <section class="links">
            <a class="adicionar" href="index.php">Adicionar Produto</a>
            <a class="linkDePaginaUsuarios" href="sistemaUser.php">Edição de Usuários</a>
            <a class="sair" href="../index.php">Sair</a>
        </section>
        <br>
        <br>
        <div>
            <table class="table bg-primary text-white" style="width: 800px; margin: 0 auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ação</th>

                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) 
                    { 
                         // Adicione o produto atual à variável de sessão
                        $_SESSION['produtos'][] = $user_data;


                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";    
                        echo "<td>".$user_data['nome']."</td>"; 
                        echo "<td>".$user_data['tipo_prod']."</td>"; 
                        echo "<td>".$user_data['valor']."</td>"; 
                        echo "<td><img src='img/" . $user_data['imagem'] . "' height='100' alt=''></td>";


                        echo "<td class='btn-link'>
                        <a class='btn-edit' href='edit.php?id=" . $user_data['id'] . "'><i class='fa fa-pencil-square fa-1x'> Edite</i></a>
                        
                        <a class='btn-delete' href='delete.php?id=" . $user_data['id'] . "'><i class='fa fa-trash'> Delete</i></a>
                        </td>";

                    echo "</tr>";
                    } ?>
                    
                </tbody>
            </table>
        </div>
    </container>

</body>

</html>