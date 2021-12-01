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
        <form method="POST" action="cadastraritensaction.php">
            <label>Nome do Item</label><br>
            <input type="text" value="<?php echo $nome; ?>" name="nome"><br><br>
            <label>Status do empréstimo</label><br>
            <select name="status" >
                <option value="Disponível" >Disponível</option>
           </select><br><br>
            <input value="0" type="hidden" readonly name="iduser"><br><br>
            <input type="submit" value="Confirmar item" class="submitbutton">

        </form>
    </fieldset>

</body>
</html>