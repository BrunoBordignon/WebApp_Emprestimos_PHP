<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon/fav.ico">
    <title>Coisas Emprestadas</title>
    <link rel="stylesheet" href="./stylesheet/styles.css">
</head>
<body>

    <?php
        if(isset($_GET['autentica'])){
            echo "Você não tem permissão de acesso.";
        }
    ?>

   <fieldset>
       <form method="POST" action="autenticacao.php">
           <p>
                <a id="activetedState" href="index.php">LOGIN</a> | 
                <a id="deactivatedState" href="cadastro.php">CADASTRO</a><br><br>
            </p>
           <input type="text" name="user" placeholder="Digite seu usuário"><br><br>
           <input type="text" name="senha" placeholder="Digite sua senha"><br><br>
           <p>
                <input value="Entrar" class="submitbutton" type="submit">
            </p>
       </form>
   </fieldset>
   
</body>
</html>