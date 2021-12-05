<?php

include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$pdo = Conexao::getInstance();
$acao = isset($_GET['acao']) ? $_GET['acao'] : $_POST['acao'];

if ($acao == 'excluir'){
    $stmt = $pdo->prepare('DELETE FROM user WHERE user = :id');
    $stmt->bindParam(':id', $id);
    $id = $_GET['id'];
    $stmt->execute();
    header('location:user.php');
}

if ($acao == 'salvar'){
    $stmt = $pdo->prepare('INSERT INTO projeto (user) VALUES (:user)');
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $user = $_POST['user'];
    $stmt->execute();
    header("location:user.php");
}


?>