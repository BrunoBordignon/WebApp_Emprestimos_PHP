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

<a href="logadoadmin.php">Clique aqui para voltar para o perfil</a><br><br>

        <?php
            include "conexoes/dbconnection.php";

            $nome=$_POST['nome'];
            $status=$_POST['status'];
            $iduser=$_POST['iduser'];

            $sql = "INSERT INTO `itens`(`nome`, `status`, `iduser`) VALUES ('$nome','$status','$iduser')";
            $res = mysqli_query($conn, $sql);

            if($res){
                echo "Item Cadastrado com sucesso! <br><br>";
                echo "Nome do novo Item: " . $nome . "<br>";
            }else{
                echo "ERRO AO REALIZAR O EMPRÉSTIMO";
            }
        ?>

</fieldset>

</body>
</html>