<?php

namespace Yazdan\Payment\Traits;

use Yazdan\Discount\App\Models\Discount;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\Repositories\DiscountRepository;

trait PaymentTrait
{
    public function getDiscount()
    {
        $discountRepo = new DiscountRepository();
        $discount = $discountRepo->getBiggerDiscount($this->id);
        $globalDiscount = $discountRepo->getGlobalBiggerDiscount();
        if ($discount == null && $globalDiscount == null) return null;
        if ($discount == null && $globalDiscount != null) return $globalDiscount;
        if ($discount != null && $globalDiscount == null) return $discount;
        if ($globalDiscount->percent > $discount->percent) return $globalDiscount;
        return $discount;
    }

    public function getDiscountWithCode()
    {
        if (session()->has('code') == null || !$this->discounts) return null;

        $discount = DiscountRepository::findByCode(session()->get('code'));

        if (!$discount) return null;

        // return discount type all
        if ($discount->type == 'all') return $discount;

        // return special discount of this product who has code
        foreach ($this->discounts as $item) {
            if ($item->id == $discount->id) {
                return $item;
            }
        }
    }

    public function getDiscountPercent()
    {
        $discount = $this->getDiscount() ? $this->getDiscount()->percent : null;
        $getDiscountWithCode = $this->getDiscountWithCode() ? $this->getDiscountWithCode()->percent : null;

        if ($discount == null && $getDiscountWithCode == null) return 0;
        if ($discount != null && $getDiscountWithCode == null) return $discount;
        if ($discount == null && $getDiscountWithCode != null) return $getDiscountWithCode;

        if ($discount != null && $getDiscountWithCode != null) return
            $discount + $getDiscountWithCode >= 100 ? 100 : $discount + $getDiscountWithCode;
    }

    public function hasDiscount()
    {
        $discount = $this->getDiscountPercent();
        return $discount == 0 ? false : true;
    }

    public function getDiscountAmount($percent = null)
    {
        if ($percent == null) {
            $percent = $this->getDiscountPercent();
        }
        return DiscountService::calculateDiscountAmount($this->price, $percent);
    }


    public function finalPrice($quantity = 1, $code = null, $withDiscounts = false)
    {
        $discounts = [];
        $discount = $this->getDiscount();
        $amount = $this->price;

        if ($discount) {
            $discounts[] = $discount;
            $amount = $this->price - $this->getDiscountAmount($this->getDiscountPercent());
        }

        if ($code) {
            $repo = new DiscountRepository();
            $discountFromCode = $repo->getValidDiscountByCode($code, $this->id);

            if ($discountFromCode) {
                $discounts[] = $discountFromCode;

                $amount = $amount - DiscountService::calculateDiscountAmount($amount, $discountFromCode->percent);
            }
        }

        $amount = $amount * $quantity;
        if ($withDiscounts)
            return [$amount, $discounts];
        return $amount;
    }
}
