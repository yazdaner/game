<?php

namespace Yazdan\Discount\Services;

class DiscountService
{
    public static function calculateDiscountAmount($total, $percent)
    {
        return ($total - (($total * (100 - $percent)) / 100));
    }
}
