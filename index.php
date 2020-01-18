<?php
    include('config.php'); 
    include('upload.php');  
?>
<?php
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $img = $_FILES['img'];

        if(imagemValida($img) == false){
            echo 'Imagem inválida';
        }else{
            $img = uploadFile($img);
            $sql = $pdo->prepare("INSERT INTO tb_clientes VALUES (null, ?, ?, ?)"); 
            $sql->execute([$nome, $sobrenome, $img]);
            echo 'Usuário inserido com sucesso!';
        }
    }   
?>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="sobrenome" placeholder="Sobrenome">
    <input type="file" name="img">
    <input type="submit" name="acao" value="Criar">
</form>