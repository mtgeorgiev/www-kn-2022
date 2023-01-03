<?php

declare(strict_types=1);

/**
 * Handles requests for the owner endpoint
 */
class OwnerRequestHandler {

    /**
     * Gets owners data
     * 
     * @param params query parameters, showing if a particular owner or a list of owners should be returned
     * @return single or list of owner objects
     */
    public static function get(array $params) {

        $connection = (new Db())->getConnection();

        if (isset($params['id'])) {

            $statement = $connection->prepare("SELECT * FROM `owners` WHERE id = :id");
            $statement->execute(['id' => $params['id']]);
            $dbRow = $statement->fetch();

            if ($dbRow) {
                return new Owner((int)$dbRow['id'], $dbRow['username'], $dbRow['password'], $dbRow['intro_text']);
            }

            return null;
        }

        $statement = $connection->prepare("SELECT * FROM `owners`");
        $statement->execute([]);

        $owners = $statement->fetchAll();

        for ($i = 0; $i < count($owners); $i ++) {
            $owner = $owners[$i];
            $result[] = new Owner((int)$owner['id'], $owner['username'], $owner['password'], $owner['intro_text']);
        }

        return $result;
    }

    /**
     * Creates an owner object
     */
    public static function post(array $data): array {

        // validation -> validate $data

        // insert
        $connection = (new Db())->getConnection();
        $statement = $connection->prepare("INSERT INTO `owners` (`username`, `password`, `intro_text`) VALUES (:username, :password, :intro_text)");
        
        if ($statement->execute([
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'intro_text' => $data['intro_text']
        ])) {
            return $data;
        }

        throw new Exception("Internal server error");
    }

    /**
     * Updates an owner object
     */
    public static function update() {

    }

    /**
     * Deletes an owner object
     */
    public static function delete() {

    }

}