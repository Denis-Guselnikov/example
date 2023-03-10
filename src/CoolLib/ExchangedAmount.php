<?php

namespace CoolLib;

class ExchangedAmount
{
    // $from, $to название валюты из списка
    // $amount сумма которую собираются обменять

    private $from;
    private $to;
    private $amount;

    public function __construct($from, $to, $amount)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }

    private function getCurrency(): array
    {
        // Добавил в массив $valutes ключ(CharCode) -> значение(Value)

        $file = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
        $xml = $file->xpath("//Valute");
        $valutes = array();
        for ($i=0; $i<=33; $i++) {
            $nominal = intval($xml[$i]->Nominal);
            $value = floatval($xml[$i]->Value) / $nominal;
            $code = strval($xml[$i]->CharCode);
            $valutes[$code] = $value;
        }

        // Проверить в $valutes входные данные $from $to
        // Добавить значения $from $to в $result и return

        $result = [];
        foreach ($valutes as $k => $v) {
            if ($k == $this->from)
            {
                $result[0] = $v;
            }
            elseif ($k == $this->to)
            {
                $result[1] = $v;
            }
        }
        return $result;
    }

    public function toDecimal(): void
    {
        // Индексы: 0->$from 1->$to

        $actual = $this->getCurrency();
        echo round($actual[0] / $actual[1] * $this->amount, 2);
    }
}
