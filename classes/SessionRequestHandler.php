<?php

declare(strict_types=1);

class SessionRequestHandler {

    /**
     * Login
     */
    public static function post(string $username, string $password): array {

        $connection = (new Db())->getConnection();

        $statement = $connection->prepare("SELECT * FROM `owners` WHERE username = ?");
        $statement->execute([$username]);

        $owner = $statement->fetch();

        if ($owner) {
            $logged = password_verify($password, $owner['password']);
        } else {
            $logged = false;
        }

        if ($logged) {

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $owner['id'];

            $response = [
                'logged' => true,
                'username' => $username
            ];
        } else {
            $response = [
                'logged' => false
            ];
        }

        return $response;

    }
}
