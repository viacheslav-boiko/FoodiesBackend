<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Allow-Headers: *");

include_once 'connect.php';
include_once 'models/user.php';

$db = Connectivity::Connect();

if($db != null) {
    $user = new User($db);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = json_decode(file_get_contents("php://input"));

        $user->name = $data->name;
        $user->picture = $data->picture;
        $user->locale = $data->locale;
        $user->email = $data->email;

        try {
            $user->create();
            echo json_encode(
                array(
                    'regcode' => '1',
                    'message' => 'User has successfully created!'));
        } catch (Exception $ex) {
            if($ex->getCode() == 23000){
                echo json_encode(array(
                    'regcode' => '-1',
                    'message' => 'The user with the same email is already exists!'));
            }
            else {
                echo json_encode(array(
                    'regcode' => '0',
                    'message' => $ex->getMessage()));
            }
        }
    }
}