<?php

namespace CoolLib;

require_once __DIR__ . '/vendor/autoload.php';

use CoolLib\ExchangedAmount;
$a = new ExchangedAmount('USD', 'JPY', 100);
$a -> toDecimal();
