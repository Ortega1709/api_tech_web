<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     require("../data/DatabaseConnect.php");
     require("../data/services/ClientService.php");

     $database = new DatabaseConnect();
     $clientService = new ClientService($database);

     $data = json_decode(file_get_contents("php://input"));
     echo json_encode(["data" => $clientService->get($data->numCompte)]);
} else {

     http_response_code(405);
     echo json_encode(["message" => "Method not allowed"]);
}
