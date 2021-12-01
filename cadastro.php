<?php

    include "conexoes/dbconnection.php";

    $id = "";
    $usuario = "";
    $email = "";
    $senha = "";
    $acctipo = "";


    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
    
        $usuario = $row['usuario'];
        $email = $row['email'];
        $senha = $row['senha'];
        $acctipo = $row['acctipo'];

    }
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
       <form method="POST" action="useraction.php">
           <p>
                <a id="deactivatedState" href="index.php">LOGIN</a> | 
                <a id="activetedState" href="cadastro.php">CADASTRO</a><br><br>
            </p>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="user" value="<?php echo $usuario;  ?>" placeholder="Digite um nome de usuário"><br><br>
            <input type="text" name="email" value="<?php echo $email;  ?>" placeholder="Digite seu e-mail"><br><br>
           <input type="text" name="senha" value="<?php echo $senha;  ?>" placeholder="Digite uma senha"><br><br>
           <p>
           <select name="acctipo">
               <option value="user" <?php if($acctipo == 'user') {echo "selected";} ?>>Usuário</option>
               <option value="adm" <?php if($acctipo == 'adm') {echo "selected";} ?>>Administrador</option>
           </select><br><br>
                <input class="submitbutton" value="Cadastrar" type="submit">
            </p>
       </form>
   </fieldset>
</body>
<?php?>

</html>