<?php

include "dbcon.php";

$loginUser = [
    "user_login" => htmlspecialchars($_POST["username"]),
    "user_password" => htmlspecialchars($_POST["password"])
];

$stringConnection = "host=localhost port=5432 dbname=registerdb user=postgres password=12345";
$newConnection = new DbManager($stringConnection);

if ($newConnection->connectTo()) {
    $query = "SELECT * FROM userdata WHERE user_login = '" . $loginUser["user_login"] . "' ";
    
    $resultArray = $newConnection->makeQuery($query);

    if (!empty($resultArray)) {

        $hashPass = $resultArray["user_password"];
        if (password_verify($loginUser["user_password"], $hashPass)) {
            $newConnection->closeConnection();
            header("Location: /html/succsess.html");
            exit;
        }

    } 
}

echo "Ошибка входа";
$newConnection->closeConnection();