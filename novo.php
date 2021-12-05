
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de User</title>
    <script>
        function validaPagina(){
    		var objNome = document.getElementById("User");
    		if (objNome.value == ""){
    			alert("Informe o User");
    			objNome.focus();
    			return false;
    		}
    		return true;
    	} 
    </script>
</head>
<body>
</br></br>
<a href="index.php">Consulta</a>
</br></br>
    <form method="post" action="acao.php">
        Descrição <input name="descricao" id="descricao" type="text">
        <button name="acao" value="salvar" id="acao" type="submit" onclick="return validaPagina();">
        Salvar
        </button>
    </form>
</body>
</html>