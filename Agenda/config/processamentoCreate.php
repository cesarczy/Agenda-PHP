<?php
include_once("conexao.php");
include_once("url.php");
$data=$_POST;
if(!empty($data)){
if($data["type"]==="create")
{
try{
echo "criar dado";
$nome= $data["nome"];
$telefone= $data["fone"];
$observacao= $data["observacao"];
$query= "INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome, :telefone,
:observacao)";
$stmt= $conn->prepare($query);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":observacao", $observacao);
$stmt->execute();
} catch(PDOException $e){
    $erro= $e->getMessage();
    echo $erro;
    }
    header("Location:".$BASE_URL."/../templates/index.php");
    }
    }//end post
    else
    {
    $id;
    if(!empty($_GET)){
    $id= $_GET["id"];
    }
    if(!empty($id))
    {
    $query= "SELECT * FROM contatos WHERE id= :id";
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $onlyContato= $stmt->fetch();// retorna apena a linha referente ao id
    }
    else
    {
    $query= "SELECT * FROM contatos";
    $stmt= $conn->prepare($query);
    $stmt->execute();
    $AllContatos=[];
    $AllContatos= $stmt->fetchAll();// retorna todas as linhas para a variavel
    }
    }
    ?>