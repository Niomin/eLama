<?php

use Payment\PaymentManager;

require_once 'config.php';

$paymentManager = new PaymentManager();
$eventSaver = new EventSaver($paymentManager);
$loader = new Loader($eventSaver);

$loader->loadFiles();