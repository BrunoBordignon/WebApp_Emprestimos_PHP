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

            $id = $_POST['id'];
            $nome=$_POST['nome'];
            $status=$_POST['status'];
            $dataemprestimo=$_POST['dataemprestimo'];
            $datadevolucao=$_POST['datadevolucao'];
            $iduser=$_POST['iduser'];

            $sql = "UPDATE `itens` SET `status`='$status',`dataemprestimo`='$dataemprestimo',`datadevolucao`='$datadevolucao',`iduser`='$iduser' WHERE `id`='$id' ";
            $res = mysqli_query($conn, $sql);

            if($res){
                echo "Empréstimo realizado com Sucesso!<br><br>";
                echo "Você pode confirmar as informações sobre seus emprestimos no atalho 'Ver histórico' no menu principal.";
                echo "Não se esqueça de realizar a entrega do item na data prevista! ";

                echo "Item que está emprestando: " . $nome . "<br>";
                echo "Data em que deve retirá-lo: " . $dataemprestimo . "<br>";
                echo "DATA PARA DEVOLUÇÃO: " . $datadevolucao . "<br>";
            }else{
                echo "ERRO AO REALIZAR O EMPRÉSTIMO";
            }

        ?>
</fieldset>

</body>
</html>