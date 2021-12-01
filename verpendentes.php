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
<a href="logadoadmin.php"><<< Voltar para Perfil<br><br></a>
<div>
        <h1 style="color: white;">LISTA GERAL DE EMPRÉSTIMOS PENDENTES E ATRASADOS [ADM CONSOLE]<br><br></h1>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>NOME DO PRODUTO</td>
                <td>STATUS DO PRODUTO</td>
                <td>DATA DO EMPRÉSTIMO</td>
                <td>DATA DA DEVOLUÇÃO</td>
                <td>ID DO LOCATÁRIO</td>
            </tr>
            <?php
            
            include "conexoes/dbconnection.php";

            $sql = "SELECT * FROM itens ";
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($res)){

                if($row['iduser'] != 0){
                    
                    $diahoje = date('Y-m-d', time());
                    $diadevolucao = $row['datadevolucao'];
                    
                        if($diahoje > $diadevolucao){
                            echo"   <tr>
                            <td style='background-color: red;'>" .$row['id'] . "</td>
                            <td style='background-color: red;'>" .$row['nome'] . "</td>
                            <td style='background-color: red;'>" .$row['status'] . "</td>
                            <td style='background-color: red;'>" .$row['dataemprestimo'] . "</td>
                            <td style='background-color: red;'>" .$row['datadevolucao'] . "</td>
                            <td style='background-color: red;'>" .$row['iduser'] . "</td>
                            <td style='background-color: red;'> EM ATRASO </td>
                            </tr>";
                        }else{
                            echo"   <tr>
                            <td style='background-color: gray;'>" .$row['id'] . "</td>
                            <td style='background-color: gray;'>" .$row['nome'] . "</td>
                            <td style='background-color: gray;'>" .$row['status'] . "</td>
                            <td style='background-color: gray;'>" .$row['dataemprestimo'] . "</td>
                            <td style='background-color: gray;'>" .$row['datadevolucao'] . "</td>
                            <td style='background-color: gray;'>" .$row['iduser'] . "</td>
                            <td></td>
                            </tr>";
                        }
                }
            }

            ?>
        </table>
    </div>
    </fieldset>


</body>
</html>
