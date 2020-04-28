<?php

require_once '../utils/utils.php';
require_once '../connect.php';
require_once '../error_codes.php';
require_once '../models/user.php';
require_once  '../controllers/user_controller.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

if($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $db = Connectivity::Connect();

    if($db != null) {

        $data = json_decode(file_get_contents("php://input"));

        $user = new User();

        $user->setId($data->id);
        $user->setEmail($data->email);

        $user_controller = new UserController($db);

        try {
            if($user->getId() != null) {
                $user_controller->delete($user);
                Utils::remove_dir($user->getEmail());
            }

            echo json_encode(ErrorCodes::no_error());

        } catch (Exception $ex) {
            echo json_encode(ErrorCodes::db_mysql_exception($ex->getMessage()));
        }
    } else {
        echo json_encode(ErrorCodes::db_connection_error());
    }
}