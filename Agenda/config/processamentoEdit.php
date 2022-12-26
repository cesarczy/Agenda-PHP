<?php
include_once("conexao.php");
include_once("url.php");

if(isset($_GET['id']) && isset ($_POST['editForm'])) {
    try{
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $observacao = $_POST['observacao'];
    $query = "UPDATE `agenda`.`contatos` SET 
    `nome` = '$nome', 
    `telefone` = '$telefone', 
    `observacao` = '$observacao' 
    WHERE (`id` = '$id')";
    $stmt= $conn->prepare($query);
    $stmt->execute();
} catch(PDOException $e){
    $erro= $e->getMessage();
    echo $erro;
    }
    header("Location:".$BASE_URL."/../templates/index.php");
    }
?> 