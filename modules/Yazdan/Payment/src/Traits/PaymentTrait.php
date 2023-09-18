<?php
namespace Yazdan\Payment\Traits;

use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\Repositories\DiscountRepository;

trait PaymentTrait
{
    public function getDiscount()
    {
        $model = get_class($this) ;
        $discountRepo = new DiscountRepository($model);
        $discount = $discountRepo->getBiggerDiscount($this->id);
        $globalDiscount = $discountRepo->getGlobalBiggerDiscount();
        if ($discount == null && $globalDiscount == null) return null;
        if ($discount == null && $globalDiscount != null) return $globalDiscount;
        if ($discount != null && $globalDiscount == null) return $discount;
        if ($globalDiscount->percent > $discount->percent) return $globalDiscount;
        return $discount;
    }

    public function getDiscountPercent()
    {
        $discount = $this->getDiscount();

        $percent = $discount ? $discount->percent : 0;

        return $percent;
    }


    public function getDiscountAmount($percent = null)
    {
        if ($percent == null) {
            $percent = $this->getDiscountPercent();
        }
        return DiscountService::calculateDiscountAmount($this->price, $percent);
    }



    public function finalPrice($quantity = 1,$code = null ,$withDiscounts = false)
    {
        // $discount = $this->getDiscount();
        $amount = $this->price;
        // $discounts = [];
        // if ($discount) {
        //     $discounts [] = $discount;
        //     $amount = $this->price - $this->getDiscountAmount($discount->percent);
        // }

        // if ($code) {
        //     $repo = new DiscountRepository();
        //     $discountFromCode = $repo->getValidDiscountByCode($code, $this->id);
        //     if ($discountFromCode) {
        //         $discounts [] = $discountFromCode;
        //         $amount = $amount - DiscountService::calculateDiscountAmount($amount, $discountFromCode->percent);
        //     }
        // }

        $amount = $amount * $quantity;

        // if ($withDiscounts)
        // return [$amount, $discounts];

        return $amount;
    }
}


