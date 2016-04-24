<?php

namespace Converter;

use DateTime;

class ConverterRub implements IConverter
{
    public function convert($sum, DateTime $date)
    {
        return $sum;
    }
}