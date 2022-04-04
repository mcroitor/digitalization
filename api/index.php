<?php

include_once __DIR__ . "/../config.php";

use \core\mc\user;

user::init();

$data = file_get_contents("php://input");

$request = json_decode($data);

$stages = [
    2 => "about",
    1 => "description",
    4 => "final",
    0 => "login",
    3 => "registers",
];

if (empty($request->stage)) {
    $request->stage = 0;
}

$_SESSION["stage"] = array_search($stages, $request->stage);

$response = [
    "stage" => $stages[$_SESSION["stage"] + 1],
    "message" => "ok",
];
