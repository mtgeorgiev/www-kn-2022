<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {

        if (isset($_SESSION['username'])) {
            $response = OwnerRequestHandler::get($_GET);
        } else {
            http_response_code(401);
            $response = null;
        }
        // read data
        break;
    }
    case 'POST': {
        //$postData = json_decode(file_get_contents("php://input"));

        $postData = $_POST;

        $response = OwnerRequestHandler::post($postData);
        // insert
        break;
    }
    case 'PUT': {
        $response = OwnerRequestHandler::update();
        // update
        break;
    }
    case 'DELETE': {
        $response = OwnerRequestHandler::delete();
        // delete
        break;
    }
    default: {
        // request method not supported
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
