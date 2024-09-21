<?php

include "dbcon.php";

$newUserArray = [
    "user_login" => $_POST["username"],
    "user_password" => $_POST["password"]
];

$stringConnection = "host=localhost port=5432 dbname=registerdb user=postgres password=12345";
$newConnection = new DbManager($stringConnection);

if ($newConnection->connectTo()) {
    $newConnection->insertTo("userdata", $newUserArray);
}

$newConnection->closeConnection();

header("Location: /index.html");
exit;
