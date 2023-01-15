<?php

$fileInfo = $_FILES['my-file'];

if ($fileInfo['error']) {
    // error
    $success = false;
} else {
    move_uploaded_file($fileInfo['tmp_name'], generateFileNameKeepOriginal($fileInfo));
    $success = true;
}
header('Location: upload-result.html?success=' . $success);

function generateRandomFileName(array $fileInfo): string {
    $filePathInfo = pathinfo($fileInfo['name']);
    return './files/' . rand() . time() . '.' . $filePathInfo['extension'];
}

function generateFileNameKeepOriginal(array $fileInfo): string {
    return './files/' . rand() . time() . '-' . $fileInfo['name'];
}

function showAllImagesInFolder(string $dir): void {

    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false) {
                echo "<img src='./$dir/$file' />";
            }
          closedir($dh);
        }
    }
}
