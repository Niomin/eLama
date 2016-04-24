<?php

use Reader\ReaderFactory;

require_once 'config.php';

$file = new SplFileObject(PROJECT_DIR . '/test_data.csv');
$reader = (new ReaderFactory())->createReader($file);
print_r($reader->fetch());