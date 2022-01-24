<?php
$link = mysqli_connect("localhost", "root", "", "projeto-titan");

mysqli_set_charset($link, "utf-8");

$idprod = $_POST['idprod'];
$preco = $_POST['preco'];
$nome = $_POST['nome'];

$query = "UPDATE tb_precos  SET  preco = ('$preco') WHERE IDPRECO = ('$idprod')";
mysqli_query($link, $query) or die("Erro na alteração ");


$query = "UPDATE tb_produtos  SET  nome = ('$nome') WHERE IDPROD = ('$idprod')";
mysqli_query($link, $query) or die("Erro na alteração ");

header('Location: index.php');
