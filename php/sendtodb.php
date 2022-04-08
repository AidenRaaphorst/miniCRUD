<?php
    include_once("connect.php");

    if(isset($_POST["create"])) {
        $sql = "INSERT INTO menu (id, name, price, category, amount, imagelink)
                VALUES(:id, :name, :price, :category, :amount, :imagelink)";
        $stmt = $connect -> prepare($sql);
        $stmt -> bindParam(":id", $_POST["id"]);
        $stmt -> bindParam(":name", $_POST["name"]);
        $stmt -> bindParam(":price", $_POST["price"]);
        $stmt -> bindParam(":category", $_POST["category"]);
        $stmt -> bindParam(":amount", $_POST["amount"]);
        $stmt -> bindParam(":imagelink", $_POST["imagelink"]);

        $stmt -> execute();
    }

    if(isset($_POST["update"])) {
        $sql = "UPDATE menu 
                SET name = :name, price = :price, category = :category, amount = :amount, imagelink = :imagelink
                WHERE id = :id";
        $stmt = $connect -> prepare($sql);
        $stmt -> bindParam(":id", $_POST["id"]);
        $stmt -> bindParam(":name", $_POST["name"]);
        $stmt -> bindParam(":price", $_POST["price"]);
        $stmt -> bindParam(":category", $_POST["category"]);
        $stmt -> bindParam(":amount", $_POST["amount"]);
        $stmt -> bindParam(":imagelink", $_POST["imagelink"]);

        $stmt -> execute();
    }

    header("Location: ../admin.php");
    // echo $_POST["imagelink"];
?>