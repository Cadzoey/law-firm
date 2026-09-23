<?php

// 1. Prepare temporary write directories required by Laravel on Vercel
$dirs = [
    '/tmp/views',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Configure environment overrides for Vercel Serverless
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('VIEW_COMPILED_PATH=/tmp/views');

// 3. Setup SQLite database file in /tmp
$sqlitePath = '/tmp/database.sqlite';
if (!file_exists($sqlitePath)) {
    if (file_exists(__DIR__ . '/../database/database.sqlite')) {
        @copy(__DIR__ . '/../database/database.sqlite', $sqlitePath);
    } else {
        @touch($sqlitePath);
    }
}
putenv("DB_DATABASE={$sqlitePath}");

// 4. Prevent router infinite loops for static asset requests
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

// 5. Forward request to Laravel's standard entry point
require __DIR__ . '/../public/index.php';