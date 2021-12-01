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
    <fieldset>
    <div id="userprofile">
        <svg id="profile" width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" 
            d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11
            12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" 
            fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 
            23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 
            15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 
            6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z"
            fill="currentColor"/>
        </svg>

        <p><br><br></p>
        <?php echo "Olá,  " .$_SESSION['user'] . "<br><br><br>"; ?>
        <a href="listadeusuarios.php" class="menu">Ver Lista de usuários [ADM]</a>
        <a href="cadastraritens.php" class="menu">Cadastrar novos itens</a>
        <a href="verpendentes.php" class="menu">Ver todos os pendentes</a>
        <a href="historicoemprestimos.php" class="menu">Ver meu histórico</a>
        <a href="logout.php">Logout</a>
        <p><br><br></p>
    </div>
    

    <div>
        <h1 style="color: white;">LISTA GERAL DOS EMPRÉSTIMOS<br><br></h1>
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
                    
                    date_default_timezone_set('America/Sao_Paulo');
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
                            <td style='background-color: red;'> <a href='excluiritemaction.php?id=" .$row['id']."'>EXCLUIR</a> </td>
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
                            <td style='background-color: gray;'> <a href='excluiritemaction.php?id=" .$row['id']."'>EXCLUIR</a> </td>
                            </tr>";
                        }
                }else{
                    echo"   <tr>
                    <td style='background-color: green;'>" .$row['id'] . "</td>
                    <td style='background-color: green;'>" .$row['nome'] . "</td>
                    <td style='background-color: green;'>" .$row['status'] . "</td>
                    <td style='background-color: green;'>" ."</td>
                    <td style='background-color: green;'>" ."</td>
                    <td style='background-color: green;'></td>
                    <td style='background-color: green;'> <a href='emprestar.php?id=" .$row['id']."'>Emprestar</a> </td>
                    <td style='background-color: green;'> <a href='excluiritemaction.php?id=" .$row['id']."'>EXCLUIR</a> </td>
                    </tr>";
                }

            }




           /* 
           IMPLEMENTAÇÃO DE FUNCIONALIDADE ATRASO>>> ACIMA
            while($row = mysqli_fetch_assoc($res)){

                if($row['iduser'] != 0){                    
                    echo"   <tr>
                    <td>" .$row['id'] . "</td>
                    <td>" .$row['nome'] . "</td>
                    <td>" .$row['status'] . "</td>
                    <td>" .$row['dataemprestimo'] . "</td>
                    <td>" .$row['datadevolucao'] . "</td>
                    <td>" .$row['iduser'] . "</td>
                    </tr>";
                }else{
                    echo"   <tr>
                    <td>" .$row['id'] . "</td>
                    <td>" .$row['nome'] . "</td>
                    <td>" .$row['status'] . "</td>
                    <td>" .$row['dataemprestimo'] . "</td>
                    <td>" .$row['datadevolucao'] . "</td>
                    <td>" .$row['iduser'] . "</td>
                    <td> <a href='emprestar.php?id=" .$row['id']."'>Emprestar</a> </td>
                </tr>";
                }

               
            }*/

            ?>
        </table>
    </div>
    </fieldset>

</body>
</html>