<?php


$hostname = "";
$user = "";
$pass = "";
$basedados = "";
$pdo = new PDO("mysql:host=localhost; dbname=sistensweb; charset=utf8;",'root','123@mudar');

$dados = $pdo->prepare("SELECT id_cliente FROM novo");
$dados->execute();
echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));


?>