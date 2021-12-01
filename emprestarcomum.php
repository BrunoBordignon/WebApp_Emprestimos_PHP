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
        <form method="POST" action="emprestarcomumaction.php">
            <label>ID do empréstimo</label><br>
            <input type="text" value="<?php echo $id; ?>" readonly name="id"><br><br>
            <label>Nome do Item</label><br>
            <input type="text" value="<?php echo $nome; ?>" name="nome"><br><br>
            <label>Novo Status do empréstimo assim que confirmado</label><br>
            <select name="status" >
                <option value="Emprestado" >Emprestado</option>
           </select><br><br>
            <label>Insira a data do empréstimo</label><br>
            <input type="date" name="dataemprestimo"><br><br>
            <label>Insira a data para a devolução do empréstimo</label><br>
            <input type="date" name="datadevolucao"><br><br>
            <label>Seu ID</label><br>
            <input value="<?php echo $_SESSION['id'] ?>" type="text" readonly name="iduser"><br><br>
            <input type="submit" value="Confirmar Emprestimo" class="submitbutton">

        </form>
    </fieldset>

</body>
</html>