<?php

namespace Test;

use DateTime;
use Exception;
use Period;

class PeriodTest implements ITest
{
    public function runTests()
    {
        $this->testPeriods();
        $this->testIfWeekend();
    }

    private function testPeriods()
    {
        $period1 = new Period(Period::TYPE_ONCE);
        $period2 = new Period(Period::TYPE_TWICE);
        $period4 = new Period(Period::TYPE_FOURFOLD);

        $date = new DateTime('2016-04-02');
        if ($period4->getPaymentDate($date)->format('Y-m-d') != '2016-04-11') {
            throw new Exception('Неверно рассчитана дата для четырёхразовой оплаты');
        }

        if ($period2->getPaymentDate($date)->format('Y-m-d') != '2016-04-19') {
            throw new Exception('Неверно рассчитана дата для двухразовой оплаты');
        }

        if ($period1->getPaymentDate($date)->format('Y-m-d') != '2016-05-04') {
            throw new Exception('Неверно рассчитана дата для одноразовой оплаты');
        }

    }

    private function testIfWeekend()
    {
        $period = new Period(Period::TYPE_FOURFOLD);
        $date = new DateTime('2016-06-01');
        if ($period->getPaymentDate($date)->format('Y-m-d') != '2016-06-15') {
            throw new Exception('Некорретно работает смещение при выпадании даты выплаты на выходные');
        }
    }
}