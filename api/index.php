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
$response = [
    "stage" => config::current_stage(),
    "message" => "",
];
// if redirect necessary, send back the next stage
if (file_exists(config::ROOT_DIR . "/stages/" . config::current_stage() . ".php")) {
    $logger->info("stage exists");
    include_once config::ROOT_DIR . "/stages/" . config::current_stage() . ".php";
    $response = config::current_stage()::handle($request);
} else {
    $logger->info("stage does not exist");
}

header("Content-Type: application/json");
echo json_encode($response);