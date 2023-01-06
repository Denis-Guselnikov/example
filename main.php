<?php


require_once __DIR__ . '/vendor/autoload.php';

use CoolLib\ExchangedAmount;
$exchange = new ExchangedAmount("USD", "UAH", 100);
$exchange -> toDecimal();
