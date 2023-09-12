<?php

namespace Yazdan\Discount\Services;

class DiscountService
{
    public static function calculateDiscountAmount($total, $percent)
    {
        return $total * ((float) ("0." . $percent));
    }
}
