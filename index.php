<?php
use app\App;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$application = new App();
$application->run();
