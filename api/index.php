<?php
// Suppress deprecation warnings caused by newer PHP versions on Vercel
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1>CRITICAL FATAL ERROR:</h1>";
    echo "<pre>" . (string) $e . "</pre>";
}
