<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

$response = [];

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        // read data
        break;
    }
    case 'POST': {
        //$postData = json_decode(file_get_contents("php://input"));

        $postData = $_POST;
        // insert
        break;
    }
    case 'DELETE': {
        // delete
        break;
    }
    default: {
        // request method not supported
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
