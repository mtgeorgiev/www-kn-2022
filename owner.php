<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': { // get user(s)

        if (isset($_SESSION['username'])) {
            $response = OwnerRequestHandler::get($_GET);
        } else {
            http_response_code(401);
            $response = ['authorized' => false];
        }
        // read data
        break;
    }
    case 'POST': { // register
        $postData = json_decode(file_get_contents("php://input"), true);

        //$postData = $_POST;

        try {
            $response = OwnerRequestHandler::post($postData);
        } catch (Exception $exception) {
            http_response_code(500);
            $response = [
                'success' => false,
                'error' => $exception->getMessage()
            ];
        }
        // insert
        break;
    }
    case 'PUT': { // edit owner
        $response = OwnerRequestHandler::update();
        // update
        break;
    }
    case 'DELETE': { // delete owner profile
        $response = OwnerRequestHandler::delete();
        // delete
        break;
    }
    default: {
        // request method not supported
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
