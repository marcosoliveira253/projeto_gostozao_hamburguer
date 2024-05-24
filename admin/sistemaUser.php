<?php
include_once('config.php');

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sistema Edição de Dados de Usuários</title>

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
        .links {
            width: 50%;
            float: right;
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

        a.btn  {
            color: #ffffff;
            border-radius: 8px;
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

        th {
            text-align: center;
            font-size: 1.5rem;
        }
        td {
            text-align: center;
            font-size: 1.3rem;
        }
        </style>
</head>
<body>
    <container>
        <nav class="bg-primary;" style="text-align: center;background-color: #e3f2fd;">
            <h1>Edição de Usuários</h1>
        </nav>
        <br>
        <br>
        <section class="links">
            <a class="linkDePaginaUsuarios" href="sistemaProd.php">Edição de Produtos</a>
            <a class="sair" href="../index.php">Sair</a>
        </section>
        <br>
        <br>
        <div>
            <table class="table bg-primary text-white" style="width: 800px; margin: 0 auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nivel de Acesso</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['id']."</td>";
                                echo "<td>".$user_data['nivel_acesso']."</td>";     
                                echo "<td>".$user_data['nome']."</td>"; 
                                echo "<td>".$user_data['email']."</td>"; 
                                echo "<td>
                                    <a class='btn  btn-warning btn-sm' href='edit_usuario.php?id={$user_data['id']}'>
                                    <i class='fa fa-pencil-square fa-2x'></i>
                                    </a>
                                </td>";
                                echo "<td><a class='btn btn-sm btn-danger' href='delete_usuario.php?id={$user_data['id']}'>
                                <i class='fa fa-trash fa-2x'></i>
                                </a></td>";    
                                echo "</tr>";
                            }
                        ?>
                </tbody>
                </table>
        </div>
    </container>
</body>
</html>