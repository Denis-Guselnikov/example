# Библиотека для работы с курсами валют ЦБ

composer require guselnikov/example

Как использовать в своем коде:
```
use CoolLib\ExchangedAmount;
$exchange = new ExchangedAmount("USD", "UAH", 100);
$exchange -> toDecimal();
```
