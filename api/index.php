<?php
// Suppress deprecation warnings caused by newer PHP versions on Vercel
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');

// Vercel Serverless read-only filesystem fix for Laravel bootstrap cache
if (isset($_ENV['VERCEL']) || getenv('VERCEL') || true) { // Always override on Vercel entrypoint
    putenv('APP_SERVICES_CACHE=/tmp/services.php');
    putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
    putenv('APP_CONFIG_CACHE=/tmp/config.php');
    putenv('APP_ROUTES_CACHE=/tmp/routes.php');
    putenv('APP_EVENTS_CACHE=/tmp/events.php');

    $_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
    $_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
    $_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
    $_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
    $_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
}

require __DIR__ . '/../public/index.php';
