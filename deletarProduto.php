<?php
$link = mysqli_connect("localhost", "root", "", "projeto-titan");

mysqli_set_charset($link, "utf-8");

$idprod = $_POST['idprod'];
$deleta = "DELETE FROM tb_produtos WHERE idprod = '$idprod'";

mysqli_query($link, $deleta) or die("Erro");


$deleta = "DELETE FROM tb_precos WHERE idpreco = '$idprod'";

mysqli_query($link, $deleta) or die("Erro");

header('Location: index.php');
