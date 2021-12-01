
<?php
    $conn = mysqli_connect("localhost", "root", "", "usersatp");

    if($conn == false){
        die ("ERRO DE CONEXÃO: NÃO FOI POSSÌVEL CONECTAR AO MYSQL." . mysqli_connect_error());
    }

    
?>