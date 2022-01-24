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
                <form action="inserirProduto.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o Nome:" required>
                    <label for="preco">Preço:</label>
                    <input type="text" id="preco" name="preco" placeholder="Digite o Preço:" required>
                    <label for="cor">Cor:</label>
                    <select required id="cor" name="cor">
                        <option value=""> Selecione: </option>
                        <option value="AZUL"> Azul </option>
                        <option value="AMARELO"> Amarelo </option>
                        <option value="VERMELHO"> Vermelho </option>
                    </select>
                    <input type="submit" class="button enviar" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>