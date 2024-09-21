<?php

include "dbcon.php";

$loginUser = [
    "user_login" => $_POST["username"],
    "user_password" => $_POST["password"]
];

$stringConnection = "host=localhost port=5432 dbname=registerdb user=postgres password=12345";
$newConnection = new DbManager($stringConnection);

if ($newConnection->connectTo()) {
    $query = "SELECT * FROM userdata WHERE user_login = '" . $loginUser["user_login"] . "' AND user_password = '" . $loginUser["user_password"] . "' ";
    
    $resultArray = $newConnection->makeQuery($query);

    if (!empty($resultArray)) {
        header("Location: /succsess.html");
        exit;
    } else {
        echo "Ошибка входа";
    }
}

$newConnection->closeConnection();