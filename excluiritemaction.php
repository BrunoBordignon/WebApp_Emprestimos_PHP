<?php

    include "conexoes/dbconnection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id=$id";
        $res = mysqli_query($conn, $sql);
    }

    $sql = "DELETE FROM itens WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    header("Location: logadoadmin.php")
?>