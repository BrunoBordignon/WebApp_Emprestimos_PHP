<?php 
    require "conexoes/autentica.php";
?>

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
    <p> * As senhas são apenas exibidas para fins acadêmicos de comprovação de funcionalidade. Em aplicativos reais, senhas jamais poderiam ser expostas. <br><br></p>
    <a href="logadoadmin.php"><<< Voltar para Perfil<br><br></a>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>NOME DE USUÁRIO</td>
            <td>EMAIL</td>
            <td>SENHA</td>
            <td>TIPO DE CONTA</td>
        </tr>
        <?php
        
        include "conexoes/dbconnection.php";

        $sql = "SELECT id, usuario, email, senha, acctipo FROM users";
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($res)){
            echo"   <tr>
                        <td>" .$row['id'] . "</td>
                        <td>" .$row['usuario'] . "</td>
                        <td>" .$row['email'] . "</td>
                        <td>" .$row['senha'] . "</td>
                        <td>" .$row['acctipo'] . "</td>
                        <td> <a href='cadastro.php?id=" .$row['id'] . "' >EDITAR</a> </td>
                        <td> <a href='excluirusuario.php?id=".$row['id']."' >EXCLUIR</a> </td>
                    </tr>";
        }

        ?>
    </table>

</body>
</html>