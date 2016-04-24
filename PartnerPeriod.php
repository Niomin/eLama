<?php

class PartnerPeriod
{
    public function getPeriod($partnerId)
    {
        switch ($partnerId % 3) {
            case 0: return new Period(Period::TYPE_ONCE);
            case 1: return new Period(Period::TYPE_TWICE);
            default: return new Period(Period::TYPE_FOURFOLD);
        }
    }
}