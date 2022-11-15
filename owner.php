<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        $response = OwnerRequestHandler::get($_GET);
        // read data
        break;
    }
    case 'POST': {
        $response = OwnerRequestHandler::post();
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