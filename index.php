<?php

use Payment\PaymentManager;
use Template\TemplateCsv;

require_once 'config.php';

$paymentManager = new PaymentManager();
$eventSaver = new EventSaver($paymentManager);
$loader = new Loader($eventSaver);

$loader->loadFiles();

$template = new TemplateCsv();
$template->render($paymentManager->getAll());