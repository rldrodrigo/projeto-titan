<!DOCTYPE html>
<html>

<head>
    <title> Teste Titan Software</title>
    <link href="css/inserir.css" rel="stylesheet">
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
                <a href="index.php"><button class="button">Voltar</button></a>
            </div>
            <div class="form">
                <form action="alterarProduto.php" method="post">
                    <?php

                    $link = mysqli_connect("localhost", "root", "", "projeto-titan");
                    mysqli_set_charset($link, "utf-8");

                    $idprod = $_POST['idprod'];

                    $query = "SELECT * from tb_produtos WHERE idprod = ('$idprod')";
                    $sql = mysqli_query($link, $query) or die("Erro");
                    while ($dados = mysqli_fetch_assoc($sql)) {
                        echo " <label for='nome'>Nome:</label>";
                        echo " <input type='text' id='nome' name='nome' value='" . $dados['NOME'] . "' >";
                        echo "<label for='preco'>Preço:</label>";
                        $sql2 = mysqli_query($link, 'SELECT * FROM tb_precos WHERE idpreco = ' . $dados['IDPRECO']) or die("Erro");
                        while ($dados2 = mysqli_fetch_assoc($sql2)) {
                            echo "<input type='text' id='preco' name='preco' value='" . $dados2['PRECO'] . "' required>";
                        }
                        echo " <label for='cor'>Cor:</label>";
                        echo "<input type='text' id='cor' name='cor' value='" . $dados['COR'] . "' readonly >";
                        echo "<input type='hidden' id='idprod' name='idprod' value='" . $dados['IDPROD'] . "' >";
                    }
                    ?>
                    <input type="submit" class="button enviar" value="Alterar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>