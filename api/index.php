<?php

// 1. Buat folder temporary yang dibutuhkan Laravel di Vercel
$dirs = [
    '/tmp/views',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Jika menggunakan SQLite, pastikan file database sementara tersedia di /tmp
$sqlitePath = '/tmp/database.sqlite';
if (!file_exists($sqlitePath)) {
    // Jika ada database bawaan di folder project, salin ke /tmp.
    // Jika tidak ada, buat file kosong.
    if (file_exists(__DIR__ . '/../database/database.sqlite')) {
        copy(__DIR__ . '/../database/database.sqlite', $sqlitePath);
    } else {
        touch($sqlitePath);
    }
}
putenv("DB_DATABASE={$sqlitePath}");

// 3. Tangani routing file statis untuk PHP Development Server di Vercel
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

// 4. Jalankan Laravel
require __DIR__ . '/../public/index.php';