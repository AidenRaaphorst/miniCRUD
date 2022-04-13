<?php
    session_start();
    include_once("connect.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO users (id, name, postalcode, streetnum, email, password)
                VALUES(:id, :name, :postalcode, :streetnum, :email, :userpassword)";
        $stmt = $connect -> prepare($sql);
        $stmt -> bindParam(":id", $_POST["id"]);
        $stmt -> bindParam(":name", $_POST["name"]);
        $stmt -> bindParam(":postalcode", $_POST["postalcode"]);
        $stmt -> bindParam(":streetnum", $_POST["streetnum"]);
        $stmt -> bindParam(":email", $_POST["email"]);
        $stmt -> bindParam(":userpassword", $_POST["password"]);

        $stmt -> execute();

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $connect -> prepare($sql);
        $stmt -> bindParam(":email", $_POST["email"]);
        $stmt -> execute();
        $result = $stmt -> fetchAll();

        foreach($result as $res) {
            $_SESSION["userinfo"] = $res;
            break;
        }
    }

    header("Location: ../index.php")
?>