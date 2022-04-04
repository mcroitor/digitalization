<?php

include_once __DIR__ . "/../config.php";

use \core\mc\logger;

$logger = logger::stdout();

$data = file_get_contents("php://input");

$logger->info("Received data: " . $data);

$request = json_decode($data);

if (empty($request->stage)) {
    $request->stage = "login";
}

if($request->stage !== config::current_stage()){
    $logger->info("Stage mismatch: " . $request->stage . " != " . config::current_stage());
    http_response_code(400);
    exit;
}

// prepare response here
// if redirect necessary, send back the next stage

$response = [
    "stage" => config::next_stage(),
    "message" => "ok",
];

header("Content-Type: application/json");
echo json_encode($response);