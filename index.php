<!DOCTYPE html>
<html>

<head>
    <title> Teste Titan Software</title>
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <div class="topo">
        <nav>
            <ul>
                <li><a class="active" href="index.php">Inicio</a></li>
                <li><a href="inserir.php">Inserir</a></li>

            </ul>

        </nav>
    </div>
    <div class="main">

        <div class="conteudo">
            <div>
                <a href="inserir.php"><button class="button">Inserir</button></a>
            </div>
            <table>
                <tr>
                    <th>Produtos</th>
                    <th>Preço</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>

                <?php
                $link = mysqli_connect("localhost", "root", "", "loja-titan");
                mysqli_set_charset($link, "utf-8");
                $sql = mysqli_query($link, 'SELECT * from produtos') or die("Erro");
                while ($dados = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $dados['nome'] . "</td>";
                    echo "<td>" . $dados['preco'] . "</td>";
                    echo "<td>" . $dados['cor'] . "</td>";
                }

                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn-action"><img src="./img/edit-solid.svg" class="icone" /></button>
                        <button class="btn-action"><img src="./img/trash-alt-regular.svg" class="icone" /></button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>