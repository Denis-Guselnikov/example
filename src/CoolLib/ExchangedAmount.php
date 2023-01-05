<?php

namespace CoolLib;

class ExchangedAmount
{
    private $from;
    private  $to;
    private $amount;

    public function __construct($from, $to, $amount)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }

    public function GetCurrency(): void
    {
        // Добавил в массив ключ(CharCode) -> значение(Value)

        $file = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
        $xml = $file->xpath("//Valute");
        $arr = array();
        for ($i=0; $i<=34; $i++) {
            $value = strval($xml[$i]->Value);
            $code = strval($xml[$i]->CharCode);
            $arr[$code] = $value;
        }
        print_r($arr);

        // Проверить в $arr входные данные $from $to
        // Добавить проверенные данные в отдельный массив (ключ(CharCode) -> значение(Value)) и return

        foreach ($arr as $k=>$v) {
            if ($k == $this->from and $k == $this->to) {
                echo $k and $v;
            }
        }

    }

    public function toDecimal(): void
    {
        // Получить значения по ключу

        $exchange = $this->GetCurrency();


    }
}
