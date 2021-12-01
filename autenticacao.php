<?php

        $login = $_POST["user"];
        $senha = $_POST["senha"];

        include "conexoes/dbconnection.php";

        $sql = "SELECT * FROM users WHERE usuario='$login' AND senha='$senha' ";
        $res = mysqli_query($conn, $sql);

        $autenticado = mysqli_num_rows($res);

        if($autenticado > 0){
            echo"LOGADO COM SUCESSO!<br><br>";
            session_start();
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['usuario'];
            

            $teste = $row['acctipo'];
            //echo $teste;

            if($teste === "adm"){
                header("Location: logadoadmin.php");
            }else {
                header("Location: logado.php");
            }

        }else {
            echo"Seu usuário ou senha está incorreto";
        }

        //Teste de passagem dos dados.
        //echo "Nome do usuário: " . $_POST["user"] . "<br>";
        //echo "Sua senha: " . $_POST["senha"] . "<br>";  
?>