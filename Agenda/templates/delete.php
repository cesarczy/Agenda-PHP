<?php
include_once("../config/url.php");
include_once("../config/conexao.php");


if(isset($_GET['id'])){
    try {
    $id = $_GET['id'];
    $query = "DELETE FROM `agenda`.`contatos` WHERE (`id` = '$id')";

$stmt= $conn->prepare($query);
$stmt->execute();
} catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
header("Location:".$BASE_URL."/../templates/index.php");
}

?>