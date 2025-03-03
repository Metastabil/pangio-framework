<?php
require_once __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config/config.php';

define('BASE_URL', $config['base_url']);
define('ENVIRONMENT', $config['environment']);