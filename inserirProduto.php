<?php
$link = mysqli_connect("localhost", "root", "", "projeto-titan");

mysqli_set_charset($link, "utf-8");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$cor = $_POST['cor'];

$query = "INSERT INTO tb_produtos (nome, cor) VALUES ('$nome', '$cor')";
mysqli_query($link, $query);


$query = "SELECT * FROM tb_produtos WHERE NOME = ('$nome')";
$sql = mysqli_query($link, $query) or die("Erro na Consulta ");
while ($dados = mysqli_fetch_assoc($sql)) {
    $prod_id =  $dados['IDPROD'];
    echo $dados['IDPROD'];
}


$query = "INSERT INTO tb_precos (idpreco, preco) VALUES ('$prod_id', '$preco')";
mysqli_query($link, $query) or die("Erro na alteração ");


$query = "UPDATE tb_produtos  SET  idpreco = ('$prod_id') WHERE IDPROD = ('$prod_id')";
mysqli_query($link, $query) or die("Erro na alteração ");



header('Location: index.php');
