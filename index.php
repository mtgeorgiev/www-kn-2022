<?php

require_once "./classes/AppBootstrap.php";

AppBootstrap::startApp();

$owner = new Owner(1, "sonic_999", "0000", "Обичам таралежи");

echo $owner->getIntroText();
