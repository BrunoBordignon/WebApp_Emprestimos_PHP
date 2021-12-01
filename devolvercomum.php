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
    <a href="logado.php"><<< Voltar para Perfil<br><br></a>

    <?php
    include "conexoes/dbconnection.php";

    $id = "";
    $nome = "";
    $status = "";
    $dataemprestimo = "";
    $datadevolucao = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM itens WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
    
        $id = $row['id'];
        $nome = $row['nome'];
        $status = $row['status'];
        $dataemprestimo = $row['dataemprestimo'];
        $datadevolucao = $row['datadevolucao'];
    }
    ?>

    <fieldset>
        <form method="POST" action="devolvercomumaction.php">
            <input type="hidden" value="<?php echo $id; ?>" readonly name="id"><br><br>
            <label>Nome do Item</label><br>
            <input type="text" value="<?php echo $nome; ?>" name="nome"><br><br>
            <label>Novo Status do empréstimo assim que confirmado</label><br>
            <select name="status" >
                <option value="Disponível" >Disponível</option>
           </select><br><br>
            <input type="hidden" name="dataemprestimo" value="0000-00-00"><br><br>
            <input type="hidden" name="datadevolucao" value="0000-00-00"><br><br>

            <input value="0" type="hidden" readonly name="iduser"><br><br>

            <input type="submit" value="Confirmar Devolução" class="submitbutton">

        </form>
        
        <?php
        include "conexoes/dbconnection.php";
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM itens WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $nomeitem = $row['nome'];
        }
        
        date_default_timezone_set('America/Sao_Paulo');
        $diahoje = date('Y-m-d', time());
        $myname = $_SESSION['user'];
        
        echo "<br>Você ".$_SESSION['user']. " está devolvendo " .$nomeitem." em " .$diahoje. "";
        
        $sql = "INSERT INTO `devolucoes`(`datadevolucao`, `nomeitemdevolvido`, `nomeusuariodevolucao`) VALUES ('$diahoje','$nomeitem','$myname')";
        $res = mysqli_query($conn, $sql);
        
        ?>
    </fieldset> 

</body>
</html>