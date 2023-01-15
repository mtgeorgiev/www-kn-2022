<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

$fileInfo = $_FILES['my-file'];

if ($fileInfo['error']) {
    // error
} else {

    $connection = (new Db())->getConnection();

    $loggedUserId = $_SESSION['user_id'];

    $statement = $connection->prepare("INSERT INTO `pet-pics` (owner_id) VALUES (?)");
    $statement->execute([$loggedUserId]);

    $fileId = $connection->lastInsertId();
    $filename = $fileId . "." . $filePathInfo = pathinfo($fileInfo['name'])['extension'];

    move_uploaded_file($fileInfo['tmp_name'], './files/' . $filename);

    // $fileContent = file_get_contents($fileInfo['tmp_name']);

    $update = $connection->prepare('UPDATE `pet-pics` SET filename = :filename WHERE id = :id');
    $update->execute([
        'filename' => $filename,
        'id' => $fileId,
    ]);
    $success = true;
}

header('Location: upload-result.html?success=' . $success);
