<?php
// router.php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . "/public" . $path;

if ($path !== '/' && file_exists($file)) {
    return false; // Serve the file (CSS, JS, images, etc.)
}

require_once __DIR__ . "/public/index.php"; // Route everything else