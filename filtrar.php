<?php
if ($_POST['nome'] == NULL && $_POST['preco'] == NULL &&  $_POST['cor'] == NULL)
    header('Location: index.php');
?>

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

            <form action="filtrar.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o Nome:">
                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" placeholder="Digite o Preço:">
                <select name="preco_tipo">
                    <option value=""> Selecione: </option>
                    <option value=">"> Maior </option>
                    <option value="<"> Menor </option>
                    <option value="="> Igual </option>
                </select>
                <label for="cor">Cor:</label>
                <select id="cor" name="cor">
                    <option value=""> Selecione: </option>
                    <option value="AZUL"> Azul </option>
                    <option value="AMARELO"> Amarelo </option>
                    <option value="VERMELHO"> Vermelho </option>
                </select>
                <input type="submit" class="button enviar" value="Filtrar">
            </form>

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


                $cor = $_POST['cor'];
                $preco = $_POST['preco'];
                $nome = $_POST['nome'];
                $preco_tipo = $_POST['preco_tipo'];

                $query = "SELECT * from tb_produtos ";


                if ($cor != NULL) {
                    $query = $query .  " WHERE cor = ('$cor') ";
                }

                if ($nome != NULL) {
                    $query = $query . " WHERE nome LIKE '%$nome%' ";
                }

                $sql = mysqli_query($link, $query) or die("Erro no SELECT");
                while ($dados = mysqli_fetch_assoc($sql)) {
                    $sql2 = mysqli_query($link, 'SELECT * FROM tb_precos WHERE idpreco = ' . $dados['IDPRECO']) or die("Erro");
                    while ($dados2 = mysqli_fetch_assoc($sql2)) {
                        $number = sprintf('%.2f', $dados2['PRECO']);
                        if ($dados['COR'] === 'VERMELHO' && $number > 50) {
                            $precoRetorno = "<td> <strike>R$ " . number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.05), 2, ",", ".") . "</td>";
                        } else if ($dados['COR'] === 'AMARELO') {
                            $precoRetorno = "<td> <strike>R$ " . number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.1), 2, ",", ".") . "</td>";
                        } else if ($dados['COR'] == 'AZUL' || $dados['COR'] === 'VERMELHO') {
                            $precoRetorno = "<td> <strike>R$ " .  number_format($number, 2, ",", ".") . " </strike> <br>R$ " . number_format(($number - $number * 0.2), 2, ",", ".") . "</td>";
                        }
                    }
                    if ($preco == NULL) {
                        echo "<tr>";
                        echo "<td>" . $dados['NOME'] . "</td>";
                        echo $precoRetorno;
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
                                <form action='alterar.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                    <button type='submit' class='btn-action'><img src='./img/edit-solid.svg' class='icone' /></button>
                                 </form>
                            </td>";
                    } else {
                        if ($preco_tipo == '>') {
                            if ($number > $preco) {
                                echo "<tr>";
                                echo "<td>" . $dados['NOME'] . "</td>";
                                echo $precoRetorno;
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
                                        <form action='alterar.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                            <button type='submit' class='btn-action'><img src='./img/edit-solid.svg' class='icone' /></button>
                                         </form>
                                    </td>";
                            }
                        } else if ($preco_tipo == '<') {
                            if ($number < $preco) {
                                echo "<tr>";
                                echo "<td>" . $dados['NOME'] . "</td>";
                                echo $precoRetorno;
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
                                        <form action='alterar.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                            <button type='submit' class='btn-action'><img src='./img/edit-solid.svg' class='icone' /></button>
                                         </form>
                                    </td>";
                            }
                        } else if ($preco_tipo == '=') {
                            if ($number === $preco) {
                                echo "<tr>";
                                echo "<td>" . $dados['NOME'] . "</td>";
                                echo $precoRetorno;
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
                                        <form action='alterar.php' method='post'> <input type = 'hidden' name='idprod' value='" . $dados['IDPROD'] . "' /> 
                                            <button type='submit' class='btn-action'><img src='./img/edit-solid.svg' class='icone' /></button>
                                         </form>
                                    </td>";
                            }
                        }
                    }
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>