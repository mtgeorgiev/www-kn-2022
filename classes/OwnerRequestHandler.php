<?php

class OwnerRequestHandler {

    public static function get($params) {

        if (isset($params['id'])) {
            return new Owner(1, "sonic", "0000", "Обичам таралежи");
        }

        return [
            new Owner(1, "sonic", "0000", "Обичам таралежи"),
            new Owner(2, "spiderman", "0000", "Спайдърмен е моят герой <3"),
        ];

    }

    public static function post() {

    }

    public static function update() {

    }

    public static function delete() {

    }

}