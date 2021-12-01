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
    <?php
          echo "Data de hoje: ";
          $diahoje = date('Y-m-d', time());
          echo $diahoje."<br><br>";
    ?>
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

                $myid = $_SESSION['id'];

                $sql = "SELECT * FROM itens WHERE iduser=$myid ";
                $res = mysqli_query($conn, $sql);
    
                while($row = mysqli_fetch_assoc($res)){

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
                            <td style='background-color: red;'> <a href='devolver.php?id=" .$row['id']."'>Devolver</a> </td>
                            </tr>";
                        }else{
                            echo"   <tr>
                            <td style='background-color: gray;'>" .$row['id'] . "</td>
                            <td style='background-color: gray;'>" .$row['nome'] . "</td>
                            <td style='background-color: gray;'>" .$row['status'] . "</td>
                            <td style='background-color: gray;'>" .$row['dataemprestimo'] . "</td>
                            <td style='background-color: gray;'>" .$row['datadevolucao'] . "</td>
                            <td style='background-color: gray;'>" .$row['iduser'] . "</td>
                            <td style='background-color: gray;'></td>
                            <td style='background-color: gray;'> <a href='devolver.php?id=" .$row['id']."'>Devolver</a> </td>
                            </tr>";
                        }
                }

            ?>
    </table>

    <br><br><br>
    <label>Seu histórico de devoluções</label>
    <table border="1">
        <tr>
            <td>Nome do usuário que devolveu</td>
            <td>Nome do produto devolvido</td>
            <td>Data da devolução</td>
        </tr>

        <?php
            include "conexoes/dbconnection.php";
            $myname = $_SESSION['user'];
            $sql = "SELECT * FROM devolucoes WHERE nomeusuariodevolucao='$myname'";
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($res)){
                        echo "
                        <tr>
                            <td>" .$row['nomeusuariodevolucao'] . "</td>
                            <td>" .$row['nomeitemdevolvido'] . "</td>
                            <td>" .$row['datadevolucao'] . "</td>
                        </tr>
                        ";                   
            }   
        ?>
    </table>

</body>
</html>