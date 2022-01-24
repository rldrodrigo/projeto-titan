<!DOCTYPE html>
<html>

<head>
    <title> Teste Titan Software</title>
    <link href="css/index.css" rel="stylesheet">
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
                $link = mysqli_connect("localhost", "root", "", "projeto-titan");
                mysqli_set_charset($link, "utf-8");

                $sql = mysqli_query($link, 'SELECT * from tb_produtos') or die("Erro");
                while ($dados = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>" . $dados['NOME'] . "</td>";
                    $sql2 = mysqli_query($link, 'SELECT * FROM tb_precos WHERE idpreco = ' . $dados['IDPRECO']) or die("Erro");
                    while ($dados2 = mysqli_fetch_assoc($sql2)) {
                        $number = sprintf('%.2f', $dados2['PRECO']);
                        if ($dados['COR'] === 'VERMELHO' && $number > 50) {
                            echo "<td> <strike>R$ " . number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.05), 2, ",", ".") . "</td>";
                        } else if ($dados['COR'] === 'AMARELO') {
                            echo "<td> <strike>R$ " . number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.1), 2, ",", ".") . "</td>";
                        } else if ($dados['COR'] == 'AZUL' || $dados['COR'] === 'VERMELHO') {
                            echo "<td> <strike>R$ " .  number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.2), 2, ",", ".") . "</td>";
                        }
                    }
                    if ($dados['COR'] === 'VERMELHO' && $number > 50)
                        echo "<td class='" . $dados['COR'] . "'>5% OFF</td>";
                    else if ($dados['COR'] === 'AZUL')
                        echo "<td class='" . $dados['COR'] . "'>20% OFF</td>";
                    else if ($dados['COR'] === 'AMARELO')
                        echo "<td class='" . $dados['COR'] . "'>10% OFF</td>";
                    else if ($dados['COR'] === 'VERMELHO')
                        echo "<td class='" . $dados['COR'] . "'> 20% OFF</td>";
                    echo " <td class='actions'>
                            <form action='deletarProduto.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                <button type='submit' class='btn-action'><img src='./img/trash-alt-regular.svg' class='icone' /></button>
                            </form>
                            <form action='alterarProduto.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                <button type='submit' class='btn-action'><img src='./img/edit-solid.svg' class='icone' /></button>
                             </form>
                        </td>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>