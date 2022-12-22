<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

session_start();

$response = [];

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {

        if (isset($_SESSION['username'])) {
            $response = [
                'logged' => true,
                'username' => $_SESSION['username']
            ];
        } else {
            $response = [
                'logged' => false
            ];
        }
        // read data
        break;
    }
    case 'POST': {
        $sessionData = json_decode(file_get_contents("php://input"), true);

        $username = $sessionData['username'];
        $password = $sessionData['password'];

        // magic trick here
        $logged = true;

        if ($logged) {

            $_SESSION['username'] = $username;

            $response = [
                'logged' => true,
                'username' => $username
            ];
        } else {
            $response = [
                'logged' => false
            ];
        }


        // insert
        break;
    }
    case 'DELETE': {
        session_destroy();
        break;
    }
    default: {
        // request method not supported
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
