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
<fieldset>  
<a href="logadoadmin.php">Clique aqui para voltar ao perfil</a><br><br>

<?php

// Require para a execução do app em caso de erro, include apenas mostra o warning.
include "conexoes/dbconnection.php";

    $id = $_POST['id'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $acctipo = $_POST['acctipo'];

    if(empty ($id)){

        $sql = "INSERT INTO users (usuario, email, senha, acctipo)VALUES ('$user','$email','$senha','$acctipo')";
        $res = mysqli_query($conn, $sql);

    if($res){
        echo "Cadastrado com Sucesso!<br><br>";
        echo "Confira suas credenciais, depois clique acima para voltar para a página inicial.<br><br>";
        echo "Suas credencias cadastradas: <br>";
        echo "Nome do usuário: " . $_POST["user"] . "<br>";
        echo "E-mail do cadastro: " . $_POST["email"] . "<br>";
        //exibida para fins acadêmicos. (em situações normais, jamais seria mostrada.)
        echo "Sua senha: " . $_POST["senha"] . "<br>";
        echo "Tipo da sua conta: " . $_POST["acctipo"] . "<br>"; 
    }else{
        echo "ERRO AO CADASTRAR NOVO USUARIO";
    }
    } else {
        $sql = "UPDATE users SET usuario='$user', email='$email', senha='$senha', acctipo='$acctipo'WHERE id=$id";
        $res = mysqli_query($conn, $sql);

    if($res){
        echo "Recadastrado com Sucesso!<br><br>";
        echo "As credenciais foram alteradas para: <br>";
        echo "Nome do usuário: " . $_POST["user"] . "<br>";
        echo "E-mail do cadastro: " . $_POST["email"] . "<br>";
        echo "Sua senha: " . $_POST["senha"] . "<br>";
        echo "Tipo da sua conta: " . $_POST["acctipo"] . "<br>"; 
    }else{
        echo "ERRO AO ATUALIZAR O USUARIO";
    }
    }
?>
</fieldset>
</body>
</html>