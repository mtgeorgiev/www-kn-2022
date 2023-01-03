<?php

/**
 * Starts and sets up everything needed for the normal work of the application
 */
class AppBootstrap {

    /**
     * Starts the application
     */
    public static function startApp() {

        self::startSession();

        self::registerAutoLoader();
    }

    private static function startSession() {
        session_start();
    }

    private static function registerAutoLoader() {        
        spl_autoload_register(function($className) {

            $classLocations = [
                "./classes/"
            ];

            foreach ($classLocations as $location) {
                $possibleClassLocation = $location . $className . '.php';
                if (file_exists($possibleClassLocation)) {
                    require_once $possibleClassLocation;
                }
            }
        });
    }
}
