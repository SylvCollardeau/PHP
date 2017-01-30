<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$app = require __DIR__ . '/../app/app.php';
$app->run();
