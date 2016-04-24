<?php

namespace Converter;

use DateTime;

class ConverterEur implements IConverter
{
    public function convert($sum, DateTime $date)
    {
        return $sum * 75;
    }
}