<?php

/**
 * Pet owner entity class
 */
class Owner {

    private $id;

    private $username;

    private $password;

    private $registeredOn;

    private $lastLoginOn;

    private $introText;

    public function __construct($id, $username, $password, $introText) {

        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->introText = $introText;
    }

    public function getIntroText() {
        return $this->introText;
    }

}