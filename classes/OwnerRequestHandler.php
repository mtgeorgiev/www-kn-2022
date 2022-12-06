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

        if (isset($params['id'])) {
            return new Owner(1, "sonic", "0000", "Обичам таралежи");
        }

        return [
            new Owner(1, "sonic", "0000", "Обичам         таралежи ❤"),
            new Owner(2, "spiderman", "0000", "Спайдърмен е моят герой ❤"),
            new Owner(3, "ел чупакабра", "0000", ""),
        ];
    }

    /**
     * Creates an owner object
     */
    public static function post(array $data): array {
        return $data;
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