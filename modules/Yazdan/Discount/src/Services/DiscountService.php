<?php

namespace Yazdan\Discount\Services;

class DiscountService
{
    public static function calculateDiscountAmount($product, $discount,$quantity = 1)
    {
        $finalPrice = $product->finalPrice();
        $price = $product->price;
        $paybleAmount = (($finalPrice * (100 - $discount->percent)) / 100);
        $max_amount = $discount->max_amount;
        $quantity_limitation = $discount->quantity_limitation;
        $discountAmount = $finalPrice - $paybleAmount;

        if($max_amount){
            return ($discountAmount > $max_amount ? $max_amount :  $paybleAmount);
        }
        if($quantity_limitation){
            if($discount->percent == 100 && $quantity > 1){
                return round(((($quantity - $quantity_limitation) * $price + ($quantity_limitation * $paybleAmount))));
            }
            elseif($quantity - $quantity_limitation < 0){
                return round(( $quantity *  $paybleAmount));
            }
            else{
                return round((($quantity - $quantity_limitation) * $price + ($quantity_limitation * $paybleAmount)));
            }
        }
        return $paybleAmount;
    }
}

