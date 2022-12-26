<?php
include_once("header.php");
include_once("../config/url.php");
include_once("../config/conexao.php");


    $id= $_GET["id"];
    $query= "SELECT * FROM contatos WHERE id= :id";
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $onlyContato= $stmt->fetch();
    
?>
<div class="container">
<?php include_once("backbtn.php"); ?>
<h1 id="main-title">Editar Contato</h1>
<form id="edit-form"
action="<?=$BASE_URL?>/../config/processamentoEdit.php?id=<?= $id ?>" method="POST">
<input type="hidden" name="type" value="edit">
<div class="form-group">
<label for="name">Nome do contato:</label>
<input type="text" class="form-control" id="nome" name="nome" value="<?= $onlyContato['nome']?>"
placeholder="digite o nome" required>
</div>
<div class="form-group">
<label for="fone">Telefone de contato:</label>
<input type="text" class="form-control" id="telefone" name="telefone" value="<?= $onlyContato['telefone']?>"
placeholder="digite o telefone" required>
</div>
<div class="form-group">
<label for="observacao">Observação:</label>
<textarea type="text" class="form-control" id="observacao" name="observacao"
placeholder="digite observação" rows="3"> <?=$onlyContato['observacao']?>
</textarea>
</div>
<br>
<button type="submit" name="editForm" class="btn btn-primary">Editar</button>
</form>
</div>
<?php
include_once("footer.php");
?>