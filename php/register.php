<?php

include "dbcon.php";

$newUserArray = [
    "user_login" => htmlspecialchars($_POST["username"]),
    "user_password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
];

$stringConnection = "host=localhost port=5432 dbname=registerdb user=postgres password=12345";
$newConnection = new DbManager($stringConnection);

if ($newConnection->connectTo()) {
    $query = "SELECT * FROM userdata WHERE user_login = '" . $newUserArray["user_login"] . "' ";
    $resultArray = $newConnection->makeQuery($query);

    if (empty($resultArray)) {
        $newConnection->insertTo("userdata", $newUserArray);
    } else {
        $newConnection->closeConnection();
        header('Location: /html/register.php?loginExists=true');
        exit;
    }

}

$newConnection->closeConnection();

header("Location: /index.php");
exit;
