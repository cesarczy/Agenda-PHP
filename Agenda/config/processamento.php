<?php
include_once("conexao.php");
include_once("url.php");
$data=$_POST;
if(!empty($data)){
print_r($data);
}
else
{ 
$query= "SELECT * FROM contatos";
$stmt= $conn->prepare($query);
$stmt->execute();
$AllContatos=[];
$AllContatos= $stmt->fetchAll();// retorna todas as linhas para a variavel
}
if($data["type"]==="create")
{
try{
echo "criar dado";
$nome= $data["nome"];
$telefone= $data["fone"];
$obs= $data["observacao"];
$query= "INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome,
:telefone, :obs)";
$stmt= $conn->prepare($query);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":obs", $obs);
$stmt->execute();
} catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
header("Location:".$BASE_URL."/../templates/index.php");
}
?>
