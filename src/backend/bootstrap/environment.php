<?php
use Dotenv\Dotenv;

if (!isset($app)) {
    // a dummy placeholder, if $app is missing

    $app = new stdClass();
}

$env = $app->detectEnvironment(function() {
    $environmentPath = __DIR__ . '/../.env';
    if (file_exists($environmentPath)) {
        $setEnv = file_get_contents($environmentPath);
        $setEnv = trim($setEnv);

        $platform = getenv('PLATFORM');
        if ($platform !== 'docker') {
            $setEnv = 'local';
        }

        putenv('APP_ENV=' . $setEnv);

        $env = getenv('APP_ENV');
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../environments/', $env . '.env');
        $dotenv->load(); // this is important
    }
});
