<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Lista de Endereços";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "2";
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
</head>
<body>
<a href="novo.php">Novo</a> <br><br>
        <form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Email<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Rua<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
<br>

<br><br>

 <?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM endereco WHERE id = $procurar ORDER BY email";
    }else{    
        $sql = "SELECT * FROM endereco WHERE user LIKE  '$procurar' ORDER BY rua";
    }

$pdo = Conexao::getInstance();
$consulta = $pdo->query($sql);
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$linha['email']} <br>  User: {$linha['rua']} <br> >";
    echo "<a href=javascript:excluirRegistro('acao.php?acao=excluir&id={$linha['id']}')>Excluir</a><br>";


?>          
        <?php } ?>
    </form>
</body> 
</html>