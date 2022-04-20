<?php 
    session_start();
    
    if(isset($_GET["id"])) {
        // Als session 'winkelwagen' niet bestaat, maak die dan.
        if(!isset($_SESSION["winkelwagen"])) {
            $_SESSION["winkelwagen"] = [];
        }
        
        $id = $_GET["id"];
        $idIsDuplicate = false;

        // Zoek of het item al in de winkelwagen zit, zo ja, dan wordt het aantal +1.
        foreach($_SESSION["winkelwagen"] as $key => $value) {
            if($id == $value["id"]) {
                $new_amount = $value["amount"] + 1;
                $_SESSION["winkelwagen"][$key] = ["id" => $value["id"], "amount" => $new_amount];
                $idIsDuplicate = true;
                break;
            }
        }
        
        // Als het een nieuw item is, dan komt het item in de session te staan
        if(!$idIsDuplicate) {
            $winkelwagen = [
                ...$_SESSION["winkelwagen"],
                ["id" => $id, "amount" => 1]
            ];

            $_SESSION["winkelwagen"] = $winkelwagen;
        }

        header('Location: ../index.php');
        exit();



        // Debug
        // foreach($_SESSION["winkelwagen"] as $item) {
        //     echo "<p>ID: {$item["id"]}</p>";
        //     echo "<p>Amount: {$item["amount"]}</p>";
        //     echo "<br/>";
        // }
        // var_dump($_SESSION["winkelwagen"]);
    } else {
        header('Location: ../index.php');
        exit();
    }
?>